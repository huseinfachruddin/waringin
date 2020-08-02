<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {
	public function __construct()
    {
        parent::__construct();

		$this->load->model('_order');
		$this->load->model('_user');
        $this->load->library('form_validation');
        if(!$this->session->userdata('email')){
			$this->session->set_flashdata('message','<div class="alert alert-danger">Login Terlebih dahulu untuk lanjut!</div>');
			redirect('Auth');
		}
    }

	public function index()
	{
		$data['title']="Waringin | Online Store";

		$data['user'] = $this->_user->show($this->session->userdata('id'));
		$this->db->select('SUM(harga_product*amount) as total');
		$data['order'] = $this->db->get_where('cart', array('order_id' =>'0' ,'user_id' => $this->session->userdata('id')))->row_array();
		
		$data['cart'] = $this->_order->show_cart_kosong('0',$this->session->userdata('id'));
		$data['pesanan_berhasil'] = $this->_order->get_order_all($this->session->userdata('id'));

		$this->load->view('templates/header',$data);
		$this->load->view('parts/navigasi',$data);
		$this->load->view('user/order/cart',$data);
		$this->load->view('templates/footer');
	}

	public function pembayaran($id=null)
	{
		$data['title']="Pembayaran";

		$data['user'] = $this->_user->show($this->session->userdata('id'));
		$data['order'] = $this->_order->show_order($id);
		$data['cart'] = $this->_order->show_cart($id);

		$this->load->view('templates/header',$data);
		$this->load->view('parts/navigasi',$data);
		$this->load->view('user/order/show',$data);
		$this->load->view('templates/footer');
	}

	public function create($product_id=null)
	{
		$data['product'] =$this->db->get_where('product', array('id' => $product_id))->row_array();
		$set=[
			'id'=>'Ca-'.uniqid(),
			'user_id'=>$this->session->userdata('id'),
			'product_id'=>$product_id,
			'harga_product'=>$data['product']['harga'],
			'amount'=>1,
			'order_id'=>'0',
		];
		$this->db->insert('cart',$set);
		var_dump($this->session->set_flashdata('message','<div class="alert alert-success">Product telah telah di tambahkan ke cart!</div>'));
		redirect('pemesanan');
	}

	public function store()
	{
	$data['user'] =$this->db->get_where('user', array('id' =>  $this->session->userdata('id')))->row_array();
	if ($this->db->get_where('cart', array('user_id' => $data['user']['id'],'order_id'=>'0'))==null	) {
			$this->session->set_flashdata('message','<div class="alert alert-danger">Cart kosong!</div>');

			var_dump($this->db->get_where('cart', array('user_id' => $data['user']['id'],'order_id'=>'0')));

			redirect('pemesanan');
		}
	if ($data['user']['address']=='' && $data['user']['address']==null) {
		$this->session->set_flashdata('message','<div class="alert alert-danger">Lengkapi Alamat Anda!</div>');
		redirect('profile');
	}else{
	if ($data['user']['phone']=='' && $data['user']['phone']==null && $data['user']['phone']==0) {
		$this->session->set_flashdata('message','<div class="alert alert-danger">Lengkapi Nomer Telepon Anda!</div>');
		redirect('profile');
	}else{

		$order_id='O-'.uniqid();
		$set=[
            'order_id'=>$order_id
        ];
		$this->db->update('cart', $set, array('user_id' => $this->session->userdata('id'),'order_id'=>'0'));

		if ($this->_order->crate_order($order_id,'Pesan')==true) {

			$this->session->set_flashdata('message','<div class="alert alert-success">Pemesanan Berhasil!</div>');
			redirect('pemesanan/pembayaran/'.$order_id);
		}else{
		$hasil=$this->_order->crate_order($id);
		
		$this->session->set_flashdata('message','<div class="alert alert-danger">Order gagal di upload!</div>');
		redirect('pemesanan');
		}}}
	}
	public function update($cart_id=null)
	{
		$set=[
            'amount'=>$this->input->post('amount', true)
        ];

		$this->db->where('id', $cart_id);
        $this->db->update('cart',$set);
        $this->session->set_flashdata('message','<div class="alert alert-success">Data berhasil ubah!</div>');
        redirect('pemesanan');
	}

	public function drop($cart_id=null,$order_id=null)
	{
		$this->db->where('id', $cart_id);
        $this->db->delete('cart',array('id' => $cart_id,'user_id' => $this->session->userdata('id')));
        $this->session->set_flashdata('message','<div class="alert alert-success">Data berhasil dihapus!</div>');
        redirect('pemesanan');
	}
}