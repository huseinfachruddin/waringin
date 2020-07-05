<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data['title']="Waringin | Online Store";
		$this->load->view('templates/header',$data);
		$this->load->view('user/index',$data);
		$this->load->view('templates/footer');
	}
}
