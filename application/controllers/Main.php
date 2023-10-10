<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library(['form_validation','session']);
		$this->load->database();
		$this->load->model('MainModel');
		$this->load->model('ClientModel');
		$this->load->model('SlotModel');
		$this->load->model('ParkingModel');
	}

	// Main
	public function index() {
		// $this->load->view('templates/header');
		// $this->load->view('appages/login',@$result);
		// $this->load->view('templates/downow');

		// $result['slotData']= $this->SlotModel->fetchParkingSlots();
		// Views
		$this->load->view('templates/header');
		$this->load->view('appages/homepage');
		$this->load->view('templates/downow');
	}


	public function adminAccount() {
		$admin = $this->session->userdata('logged_in');
		extract($admin);
		$result['adminData']= $this->MainModel->fetchOneAdmin($admin_id);

		$this->load->view('templates/header');
		$this->load->view('templates/menus', @$result);
		$this->load->view('admin/account', @$result);
		$this->load->view('templates/footer');
		$this->load->view('templates/downow');
	}

	// Main home
	public function adminHome() {

		// Registration action
		if($this->input->post('saveclient')) {
			$fname= $this->input->post('firstname');
			$lname= $this->input->post('lastname');
			$uname= $this->input->post('username');
			$phone= $this->input->post('phone_no');
			$mail = $this->input->post('email');
			$pass = $this->input->post('password');
			$addr = $this->input->post('address');
			$card = $this->input->post('card_no');

			$check= $this->db->query("SELECT * FROM client WHERE username='$uname' OR email='$mail' ");

			if($check->num_rows()){
				$data['message']="This client already exists</h3>";
			} else {
				$sql = "INSERT INTO `client`(`firstname`, `lastname`, `username`, `phone_no`, `email`, `password`, `address`, `card_number`) VALUES ('$fname', '$lname', '$uname', '$phone', '$mail', '$pass', '$addr', '$card')";
				$this->db->query($sql);

				$last_id = $this->db->insert_id("client");
				if($last_id) {
					$loadbal = "INSERT INTO `account`(`client_id`) VALUES ('$last_id')";
					$this->db->query($loadbal); // By default balance will be inserted as O through SQl
				}

				$data['message']="Customer is registered!</h3>";
			}			
		}

		// Registration action
		if($this->input->post('saveslot')) {
			$code = "PK-".rand(10000, 99999);
			$size = $this->input->post('space_size');
			$level= $this->input->post('space_level');

			$sql = "SELECT * FROM parking_spaces WHERE space_code='$code' ";
			$check= $this->db->query($sql);

			if($check->num_rows()) {
				$code = "PK-".rand(10000, 99999);
			} else {
				$sql = "INSERT INTO `parking_spaces`(`space_code`, `space_size`, `space_level`) VALUES ('$code', '$size', '$level')";
				$this->db->query($sql);
				$data['message']="New parking slot is created!</h3>";
			}			
		}

		// Ctx
		$data['reqCount'] = $this->MainModel->countParkingReqs();
		$data['avSlotCount'] = $this->MainModel->countAvailableSlots();
		$data['bkSlotCount'] = $this->MainModel->countBookedSlots();
		$data['clientCount'] = $this->MainModel->countClients();
		$data['parkingsCount'] = $this->MainModel->countParkings();
		$data['parkingsData'] = $this->ParkingModel->getAllParkingLimited();

		// Loading template
		$this->load->view('templates/header');
		$this->load->view('templates/menus');
		$this->load->view('admin/home', @$data);
		$this->load->view('templates/footer');
		$this->load->view('templates/downow');
		$this->load->view('templates/modals');
	}



	// register
	public function adminRegister() {

		$result['adminData']= $this->MainModel->fetchAdmins();

		// Registration action
		if($this->input->post('saveAdmin')) {
			$fname= $this->input->post('firstname');
			$lname= $this->input->post('lastname');
			$uname= $this->input->post('username');
			$phone= $this->input->post('phone_no');
			$mail = $this->input->post('email');
			$pass = $this->input->post('password');

			$hashedpass = password_hash($pass, PASSWORD_BCRYPT, ['cost' => 12]);
			$role = $this->input->post('admin_role');

			$check= $this->db->query("SELECT * FROM admin WHERE username='$uname' OR email='$mail' ");
			if($check->num_rows()){
				$this->session->set_flashdata('warning', "Admin already exists");
				redirect(base_url("admin/manage"));
			} else {
				$sql = "INSERT INTO `admin`(`firstname`, `lastname`, `username`, `phone_no`, `email`, `password`, `admin_role`) VALUES ('$fname', '$lname', '$uname', '$phone', '$mail', '$hashedpass', '$role')";
				$this->db->query($sql);
				$this->session->set_flashdata('message', "Admin is saved!");
				redirect(base_url("admin/manage"));
			}			
		}

		// Loading template
		$this->load->view('templates/header');
		$this->load->view('templates/menus');
		$this->load->view('admin/register', @$result);
		$this->load->view('templates/footer');
		$this->load->view('templates/downow');
		$this->load->view('templates/modals');
	}




	// Main index
	public function dologin(){
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			// Load View again
			
			$this->load->view('templates/header');
			$this->load->view('appages/login');
			$this->load->view('templates/downow');
		} else {

			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$user= $this->db->get_where('admin', ['email' => $email])->row();
			
			if(!$user){
				$this->session->set_flashdata('login_error', 'Please check your email or password and try again.', 300);
				redirect(uri_string());

			} if(!password_verify($password, $user->password)) {
				$this->session->set_flashdata('login_error', 'Please check your email or password and try again.', 300);
				redirect(uri_string());
			}

			$data = array(
				'admin_id'  => $user->admin_id,
				'firstname' => $user->firstname,
				'lastname'  => $user->lastname,
				'email'		=> $user->email,
				'phone'		=> $user->phone,
				'admin_role'=> $user->admin_role,
			);

			$this->session->set_userdata('logged_in', $data);
			// redirect to home
			redirect('admin'); 
			exit;
		}		
	}


	public function updateBalance() {

		// update balance
		if($this->input->post('client_id') && $this->input->post('balance')) {
			$client = $this->input->post('client_id');
			$balance= $this->input->post('balance');

			//$input_data = json_decode(trim(file_get_contents('php://input')), true);

			//$post = json_decode($this->security->xss_clean($this->input->raw_input_stream));
			//echo $this->input->post('firstname');

			//UPDATE TABLE
			$clsql="UPDATE `account` SET client_id='$client', balance='$balance' WHERE client_id='$client'";
			$this->db->query($clsql);

			$response = json_encode(trim(file_get_contents('php://input')), true);
			header('Content-Type: application/json');
			echo $response;
			
		}
	}



	public function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }



}
?>