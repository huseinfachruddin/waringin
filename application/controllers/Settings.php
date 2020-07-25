<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('_product');
        $this->load->model('_setting');
        $this->load->library('form_validation');
        if($this->session->userdata('role_id')!=1){
			redirect('auth');
		}
    }

    public function index()
    {
        
        $data['title']="Waringin | Setting";

        $data['key']=$key=$this->input->post('key');
        
        $data['hot'] = $this->_setting->get('1');
        $data['slide'] = $this->_setting->get('2');

        $this->load->view('templates/header',$data);
		$this->load->view('parts/nav',$data);
		$this->load->view('admin/setting/index',$data);
		$this->load->view('templates/footer');
		
    }

    public function create()
    {
        
        $data['title']="Waringin | Setting";

        $data['key']=$key=$this->input->post('key');
        $this->db->limit(6);
        $data['product'] = $this->_product->get($key);

        $data['table'] = $this->_product->get();

        
        
        $this->load->view('templates/header',$data);
		$this->load->view('parts/nav',$data);
		$this->load->view('admin/setting/create',$data);
		$this->load->view('templates/footer');
		
    }

    public function store($product_id,$content_id)
    {
        
        $set = [
            'id'=> 'Co-'.uniqid(),
            'product_id'=> $product_id,
            'content_id'=> $content_id
        ];
        $this->db->insert('sub_content',$set);
        $this->session->set_flashdata('message','<div class="alert alert-success">Data berhasil di Tambahkan!</div>');
        redirect('settings');

    }
    public function store_slide($content_id=null)
    {
        $image=$_FILES['img'];
        $back='settings';
        $img_name = $this->image($image,$back); 
        
        $set = [
            'id'=> 'Co-'.uniqid(),
            'product_id'=> $img_name,
            'content_id'=> $content_id
        ];
        $this->db->insert('sub_content',$set);
        $this->session->set_flashdata('message','<div class="alert alert-success">Data berhasil di Tambahkan!</div>');
        redirect('settings');

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

    public function drop($id=null)
    {

        $this->db->where('id', $id);
        $this->db->delete('sub_content');
        $this->session->set_flashdata('message','<div class="alert alert-success">Data berhasil di Hapus!</div>');
        redirect('settings');

    }

   
}