<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('_order');
        $this->load->library('form_validation');
        if($this->session->userdata('role_id')!=1){
			redirect('auth');
		}
    }
    public function index($key=null)
    {
        $data['user'] = $this->db->get_where('user',['id'=> $this->session->userdata('id')])->row_array();
        $data['title']="Admin | Waringin";
        $key=$key=$this->input->post('key');

        $data['order'] = $this->_order->get($key);

        $this->load->view('templates/header', $data);
        $this->load->view('parts/nav', $data);
        $this->load->view('admin/admin', $data);
        $this->load->view('templates/footer');
    }

    function category($back=null){
        $this->form_validation->set_rules('name','Name Category','required|trim');
        if ($this->form_validation->run() == true) {
            $set = [
                'name'=> $this->input->post('name', true)
            ];
            $this->db->insert('category',$set);
            
            $this->session->set_flashdata('message','<div class="alert alert-success">Data berhasil di upload!</div>');
            redirect('product/'.$back); 
        }else{
        $eror = validation_errors('<div class="alert alert-danger alert-dismissible fade show col-12" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        $this->session->set_flashdata('message',$eror);
        redirect('product/'.$back);
        }
    }
}