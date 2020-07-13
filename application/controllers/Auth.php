<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
     
        $this->load->library('form_validation');

    }
    
    public function index()
    {
        $this->form_validation->set_rules('email','Email','required|trim|valid_email');
        $this->form_validation->set_rules('password','Password','required|trim');
        
        if ($this->form_validation->run() == false) {
        $data['title']="Login";
        $this->load->view('templates/header',$data);
        $this->load->view('auth/login',$data);
        $this->load->view('parts/copyright', $data);
        $this->load->view('templates/footer');  
        }else{

            $this->_login();
        }
       
    }

    private function _login()
    {
        $email =$this->input->post('email');
        $password =$this->input->post('password');
        $user = $this->db->get_where('user',['email'=>$email])->row_array();
        
        
        if ($user) {
                if (password_verify($password,$user['password'])) {
                    $data = [
                        'email' =>$user['email'],
                        'id'=>$user['id'],
                        'role_id'=>$user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id']==1) {
                        redirect('admin');
                    }else{
                        redirect('home');
                    }
                }else{
                    $this->session->set_flashdata('message','<div class="alert alert-danger">Password salah!</div>');
                redirect('auth');
                }
            
        } else{
            $this->session->set_flashdata('message','<div class="alert alert-danger">account not found!</div>');
            redirect('auth');
        }

    }

    public function register()
    {
        $this->form_validation->set_rules('name','Name','required|trim');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]',[
            'is_unique'=>'email sudah terpakai!'
        ]);
        $this->form_validation->set_rules('password','Password','required|trim|min_length[3]|matches[password2]',[
            'matches' => 'Password dont match',
            'min_length' => 'password too short'
        ]);
        $this->form_validation->set_rules('password2','Re Password ','required|trim|matches[password]');

       if($this->form_validation->run() === false)
        {
        $data['title']='register';
        $this->load->view('templates/header', $data);
       $this->load->view('auth/register');
       $this->load->view('templates/footer');
       } else
       {
           $time=time();
           $data = [
               'id' => 'U-'.uniqid(),
               'name'=> htmlspecialchars($this->input->post('name', true)),
               'email'=> htmlspecialchars($this->input->post('email', true)),
               'password'=> password_hash($this->input->post('password'),PASSWORD_DEFAULT),
			   'img'=> 'default.png',
			   'role_id' => 2,
               'date'=>date('Y-m-d H:i:s',$time)
           ];
           
           $this->db->insert('user',$data);
           $this->session->set_flashdata('message','<div class="alert alert-success">Data berhasil di tambahakan!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message','<div class="alert alert-success">You has been logout</div>');
            redirect('auth');
    }
}