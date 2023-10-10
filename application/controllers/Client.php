<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	// Main index
	public function index() {
		// Views
		$this->load->view('templates/header');
		$this->load->view('templates/menus');
		$this->load->view('client/home');
		$this->load->view('templates/footer');
		$this->load->view('templates/downow');
	}

	// Main index
	public function login() {

		$data['title'] = 'Login';

		// Views
		$this->load->view('templates/header');
		$this->load->view('client/login');
		$this->load->view('templates/downow');
	}

	// Main index
	public function forgotpass() {
		// Views
		$this->load->view('templates/header');
		$this->load->view('client/forgotpass');
		$this->load->view('templates/downow');
	}


}
?>