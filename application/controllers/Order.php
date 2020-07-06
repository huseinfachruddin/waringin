<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
	public function __construct()
    {
        parent::__construct();

        $this->load->model('_order');
        $this->load->library('form_validation');
        if($this->session->userdata('role_id')!=1){
			redirect('auth');
		}
    }

	public function index()
	{
		$data['title']="Waringin | Online Store";

		$key=$key=$this->input->post('key');
		$data['order'] = $this->_order->get($key);


		$this->load->view('templates/header',$data);
		$this->load->view('admin/order/index',$data);
		$this->load->view('templates/footer');
	}
	public function show($id=null)
	{
		$data['title']="Waringin | Online Store";

		$data['order'] = $this->_order->show_order($id);
		$data['cart'] = $this->_order->show_cart($id);

		$this->load->view('templates/header',$data);
		if ($id==null or $data['order']['id']==null) {
            $this->load->view('error');
        }else{
			$this->load->view('admin/order/show',$data);
        }
		$this->load->view('templates/footer');
	}

	public function store()
	{
		$set = ['date'=> date()
            ];

		$hasil=$this->_order->crate_order($set);
		
		$this->session->set_flashdata('message','<div class="alert alert-success">Data berhasil di upload!</div>');
		redirect('product');
	}
	public function delete($id=null)
	{
		$this->db->where('id', $id);
        $this->db->delete('order');
        $this->session->set_flashdata('message','<div class="alert alert-success">Data berhasil dihapus!</div>');
        redirect('order');
	}

	public function drop($id=null)
	{
		$this->db->where('id', $id);
        $this->db->delete('cart');
        $this->session->set_flashdata('message','<div class="alert alert-success">Data berhasil dihapus!</div>');
        redirect('order/show');
	}
}