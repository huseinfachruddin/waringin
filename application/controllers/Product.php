<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->library('form_validation');
        $this->load->model('_product');
        if($this->session->userdata('role_id')!=1){
			redirect('auth');
		}
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user',['id'=> $this->session->userdata('id')])->row_array();
        $data['key']=$key=$this->input->post('key');


        $data['product'] = $this->_product->get($data['key']);


        $data['title']="product | Waringin";
        
        $this->load->view('templates/header', $data);
        $this->load->view('parts/nav', $data);
        $this->load->view('admin/product/index', $data);
        $this->load->view('templates/footer');
    }
    public function show($id=null){

        $data['product'] = $this->_product->show($id);
        $data['category'] = $this->db->get('category')->result();

        $data['title']="Show product | Waringin";

        $this->load->view('templates/header', $data);
        $this->load->view('parts/nav', $data);
        if ($id==null or $data['product']['id']==null) {
            $this->load->view('error');
        }else{
        $this->load->view('admin/product/show', $data);
        }
        $this->load->view('templates/footer');
        
    }

    public function create()
    {
        $data['user'] = $this->db->get_where('user',['id'=> $this->session->userdata('id')])->row_array();
        $data['category'] = $this->db->get('category')->result();
        // validation
        $validation = $this->form_validation;
        $validation->set_rules($this->_product->rules());

        $data['title']="upload product | Waringin";
        
        if ($validation->run()==false) {
        $this->load->view('templates/header', $data);
        $this->load->view('parts/nav', $data);
        $this->load->view('admin/product/create', $data);
        $this->load->view('templates/footer');
        }else{
            $this->store();
        }
    }

    function store()
    {
            $image=$_FILES['img'];
            $back='product/create';
            $img_name = $this->image($image,$back); 
                $set = [
                    'id'=> 'P-'.uniqid(),
                    'img'=> $img_name, 
                    'name'=> $this->input->post('name', true),
                    'detail'=> $this->input->post('detail', true),
                    'harga'=> $this->input->post('harga', true),
                    'satuan'=> $this->input->post('satuan', true),
                    'date'=>date('Y-m-d H:i:s',time())
                ];
                $this->db->insert('product',$set);
                
                $this->session->set_flashdata('message','<div class="alert alert-success">Data berhasil di upload!</div>');
                redirect('product/show/'.$set['id']);
    }

    public function update($id=null)
    {
        $image=$_FILES['img'];
        $this->db->where('id', $id);
        $data['product'] = $this->db->get('product')->row_array();

            if ($image['error']==4) {
                
                $img_name = $data['product']['img'];
            }else{
            $back='product/show/'.$data['product']['id'];
            $img_name = $this->image($image,$back);
            }
            
            $set = [
                'img'=> $img_name,
                'name'=> $this->input->post('name', true),
                'detail'=> $this->input->post('detail', true),
                'category_id'=> $this->input->post('category', true),
                'harga'=> $this->input->post('harga', true),
                'satuan'=> $this->input->post('satuan', true),
                'date'=>date('Y-m-d H:i:s',time())
            ];
            $this->db->where('id', $id);
            $this->db->update('product',$set);
            
            $this->session->set_flashdata('message','<div class="alert alert-success">data berhasil di ubah!</div>');
            redirect('product/show/'.$id);
    }

    function image($image,$back=null)
    {
        $exname= explode('.',$image['name']);
        $exname= strtolower(end($exname));
        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['file_name']=time().'-'.substr(md5(rand()),0,10).".".$exname;
        $config['max_size']  = '5048';
    
  
    $this->load->library('upload', $config);
     // Load konfigurasi uploadnya

    if ($image['error']==4) {
        $this->session->set_flashdata('message','<div class="alert alert-danger">input foto kosong!</div>');
        redirect($back);
    }else{
        if($this->upload->do_upload('img')){ // Lakukan upload dan Cek jika proses upload berhasil
            // Jika berhasil :
            $this->upload->data();
            $this->_create_thumbs($config['file_name']);
            $hasil=$config['file_name'];
            
            return $hasil;
            
        }else{
            $error=$this->upload->display_errors();
            // Jika gagal :
            $this->session->set_flashdata('message',$error);
            redirect($back);
            }
        }
    }

    function _create_thumbs($file_name,$back=null)
    {
        // Image resizing config
        $config = array(
                'image_library' => 'GD2',
                'source_image'  => './assets/images/'.$file_name,
                'maintain_ratio'=> false,
                'width'         => 500,
                'new_image'     => './assets/images/tumb/'.$file_name
        );
 
        $this->load->library('image_lib', $config);
            if(!$this->image_lib->resize()){
                return false;
            }
            $this->image_lib->clear();
        
    }

    

    function delete($id=null){
        $this->db->where('id', $id);
        $this->db->delete('product');
        $this->session->set_flashdata('message','<div class="alert alert-success">Data berhasil dihapus!</div>');
        redirect('product'); 
    }


    // CATEGORY LOGIC
    function category($id=null){
        $set = [
            'category_id'=> $this->input->post('category', true)
        ];
        $this->db->where('id', $id);
        $this->db->update('product',$set);

        
        $this->session->set_flashdata('message','<div class="alert alert-success">Data berhasil di upload!</div>');
        redirect('product/show/'.$id); 
    }

    function create_category($id=null){
        $set = [
            'name'=> $this->input->post('name', true)
        ];
        $this->db->insert('category',$set);
        
        $this->session->set_flashdata('message','<div class="alert alert-success">Data berhasil di upload!</div>');
        redirect('product/show/'.$id); 
    }
}