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

		$data['key']=$key=$this->input->post('key');
		$data['order'] = $this->_order->get($data['key']);
		$data['baru'] = $this->_order->get('Pesan');
        $data['proses'] = $this->_order->get('Proses');


		$this->load->view('templates/header',$data);
		$this->load->view('parts/nav',$data);
		$this->load->view('admin/order/index',$data);
		$this->load->view('templates/footer');
	}
	public function show($id=null)
	{
		$data['title']="Waringin | Online Store";

		$data['order'] = $this->_order->show_order($id);
		$data['cart'] = $this->_order->show_cart($id);
		$this->load->view('templates/header',$data);
		$this->load->view('parts/nav',$data);
		if ($id==null or $data['order']==null) {
            $this->load->view('error');
        }else{
			$this->load->view('admin/order/show',$data);
        }
		$this->load->view('templates/footer');
	}

	public function store($id)
	{
		$order_id='O-'.uniqid();
		$set=[
            'order_id'=>$order_id
        ];
		$this->db->update('cart', $set, array('user_id' => $id,'order_id'=>0));

		if ($this->_order->crate_order($order_id,'Pesan')==true) {

			$this->session->set_flashdata('message','<div class="alert alert-success">Order Berhasil!</div>');
			redirect('admin');
		}else{
		$hasil=$this->_order->crate_order($id);
		
		$this->session->set_flashdata('message','<div class="alert alert-danger">Order gagal di upload!</div>');
		redirect('admin');
		}
	}
	public function delete($id=null)
	{
		$this->db->where('id', $id);
        $this->db->delete('order');
        $this->session->set_flashdata('message','<div class="alert alert-success">Data berhasil dihapus!</div>');
        redirect('order');
	}

	public function drop($cart_id=null,$order_id=null)
	{
		$this->db->where('id', $cart_id);
        $this->db->delete('cart');
        $this->session->set_flashdata('message','<div class="alert alert-success">Data berhasil dihapus!</div>');
        redirect('order/show/'.$order_id);
	}
}