<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	function __construct() {
		
		parent::__construct();
	    $this->load->database();
	    $this->load->library('session');
		$this->load->model('AccountModel');
	}
	
	public function index(){		;

		if($this->session->userdata('user')){
			redirect(base_url('admin'));
		} else {
			$this->load->view('login');			
		}
	}

	public function logincheck(){

		//load session library
		$this->load->library('session');
		$username= $this->input->post('username');
		$password= $this->input->post('password');
		$data = $this->Login_model->login($username);

		if(password_verify($password, $data["password"])) {
			$this->session->set_userdata('user', $data);
			redirect(base_url('home'));
		} else {			
			$msg="<div class='alert alert-danger alert-dismissible'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					Login failed. Please check your credentials!
				</div>";
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('login'));
		}
	}



}