<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('_user');
        $this->load->library('form_validation');
        if($this->session->userdata('role_id')!=1){
			redirect('auth');
		}
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user',['id'=> $this->session->userdata('id')])->row_array();
        $data['key']=$this->input->post('key');
        $data['user'] = $this->_user->get($data['key']);

        $data['title']="User | Waringin";
       
        $this->load->view('templates/header', $data);
        $this->load->view('parts/nav', $data);
        $this->load->view('admin/user/index', $data);
        $this->load->view('templates/footer');
    }
    function show($id=null){
        $data['user'] = $this->_user->show($id);
        $data['role'] = $this->db->get('role')->result();

        $data['title']="Show user | Waringin";

        $this->load->view('templates/header', $data);
        $this->load->view('parts/nav', $data);
        if ($id==null or $data['user']==null) {
            $this->load->view('error');
        }else{
            $this->load->view('admin/user/show', $data);
        }

        $this->load->view('templates/footer');
    }

    public function update($id=null)
    {
        $image=$_FILES['img'];
        $this->db->where('id', $id);
        $data['user'] = $this->db->get('user')->row_array();

            if ($image['error']==4) {
                
                $img_name = $data['user']['img'];
            }else{
            $back='user/show/'.$id;
            $img_name = $this->image($image,$back);
            }
            
            $set = [
                'img'=> $img_name,
                'name'=> $this->input->post('name', true),
                'email'=> $this->input->post('email', true),
                'role_id'=> $this->input->post('role', true),
                'address'=> $this->input->post('address', true),
                'phone'=> $this->input->post('phone', true)
            ];
            $this->db->where('id', $id);
            $this->db->update('user',$set);
            
            $this->session->set_flashdata('message','<div class="alert alert-success">data berhasil di ubah!</div>');
            redirect('user/show/'.$id);
    }

    function image($image,$back=null)
    {
        $exname= explode('.',$image['name']);
        $exname= strtolower(end($exname));
        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['file_name']=time().'-'.substr(md5(rand()),0,10).".".$exname;
        $config['max_size']  = '2048';
    
  
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
                'height'        => 300,
                'new_image'     => './assets/images/tumb/'.$file_name
        );
 
        $this->load->library('image_lib', $config);
            if(!$this->image_lib->resize()){
                return false;
            }
            $this->image_lib->clear();
        
    }
    function password($id=null){
        $user = $this->_user->show($id);
        $data['role'] = $this->db->get('role')->result();

        $this->form_validation->set_rules('password','password','required|trim');

        if ($this->form_validation->run() == true) {
            
            $password=$this->input->post('password');
            if (password_verify($password,$user['password'])) {
                $set = [
                    'password'=> password_hash($this->input->post('password2'),PASSWORD_DEFAULT),
                ];
                $this->db->where('id', $id);
                $this->db->update('user',$set);
                
                $this->session->set_flashdata('message','<div class="alert alert-success">password berhasil di ubah!</div>');
                redirect('user/show/'.$id);
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger">password gagal di ubah!</div>');
                redirect('user/show/'.$id);
            }
        }else{
        $eror = validation_errors('<div class="alert alert-danger alert-dismissible fade show col-12" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        $this->session->set_flashdata('message',$eror);
        redirect('user/show/'.$id);
        }
        
    }

    function delete($id=null){
        $this->db->where('id', $id);
        $this->db->delete('user');
        $this->session->set_flashdata('message','<div class="alert alert-success">Data berhasil dihapus!</div>');
        redirect('user'); 
    }
}