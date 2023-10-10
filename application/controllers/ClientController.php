<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClientController extends CI_Controller {

     public function __construct() {
          
          parent::__construct();
          // Loading models manually
          $this->load->model('ClientModel');
          $this->load->model('SlotModel');
          $this->load->model('ParkingModel');
		  $this->load->model('MainModel');
     }


	// Admin Home
	public function clientHome() {

		$userc = $this->session->userdata('clogged_in');
		extract($userc);
		$result['avSlotData']= $this->SlotModel->getAvailableParkingSlots();
		$result['vehicleData']=$this->ParkingModel->getClientVehicles($client_id);
		$result['clientData'] =$this->ClientModel->fetchOneClient($client_id);
		$result['historyCount'] = $this->ParkingModel->countBookingHistory($client_id);
		$result['parkingsCount'] = $this->MainModel->countParkings();
		$result['parkingsData'] = $this->ParkingModel->getAllParkings();

		// Loading template
		$this->load->view('templates/header');
		$this->load->view('templates/menus_client', @$result);
		$this->load->view('client/home', @$result);
		$this->load->view('templates/footer');
		$this->load->view('templates/downow');
		$this->load->view('templates/modals');
	}

	public function dologin(){
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$result['slotData']= $this->SlotModel->fetchParkingSlots();

		if ($this->form_validation->run() == FALSE) {
			// Load View again
			
			$this->load->view('templates/header');
			$this->load->view('client/login',@$result);
			$this->load->view('templates/downow');

		} else {

			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$userc= $this->db->get_where('client', ['email' => $email])->row();
			
			if(!$userc){
				$this->session->set_flashdata('login_error', 'Please check your email or password and try again.', 300);
				redirect(uri_string());

			} if($password!=$userc->password) {
				$this->session->set_flashdata('login_error', 'Please check your email or password and try again.', 300);
				redirect(uri_string());
			}

			$data = array(
				'client_id' => $userc->client_id,
				'firstname' => $userc->firstname,
				'lastname'  => $userc->lastname,
				'username'  => $userc->username,
				'phone_no'  => $userc->phone_no,
				'email'	  => $userc->email,
				'address'   => $userc->address,
			);

			$this->session->set_userdata('clogged_in', $data);
			// redirect to home
			redirect('client'); 
			exit;
		}		
	}

	public function logout(){
        $this->session->sess_destroy();
        redirect('client/login');
   	}


	// <<=========================================================>>



	public function displayClients() {
		$result['clientData']= $this->ClientModel->fetchClients();

		// Loading template
		$this->load->view('templates/header');
		$this->load->view('templates/menus');
		$this->load->view('client/clients', @$result);
		$this->load->view('templates/footer');
		$this->load->view('templates/downow');

		// Registration action
		if($this->input->post('saveclient')) {
			$fname= $this->input->post('firstname');
			$lname= $this->input->post('lastname');
			$uname= $this->input->post('username');
			$phone= $this->input->post('phone_no');
			$mail = $this->input->post('email');
			$pass = rand(10000, 99999);
			$addr = $this->input->post('address');
			$card = $this->input->post('card_no');

			$check= $this->db->query("SELECT * FROM client WHERE username='$uname' OR email='$mail' OR card_number='$card'");

			if($check->num_rows()){
				$this->session->set_flashdata('message', "This client already exists or card number already assigned");
			}elseif(!preg_match('/^(07|2507|\+2507)(9|8|3|2)[0-9]{7}$/', $phone)){
				echo '<script>alert("Invalid phone number")</script>';
			}else {
				$sql = "INSERT INTO `client`(`firstname`, `lastname`, `username`, `phone_no`, `email`, `password`, `address`, `card_number`,`role`) VALUES ('$fname', '$lname', '$uname','$phone','$mail','$pass','$addr', '$card','Driver')";
				$this->db->query($sql);

				$last_id = $this->db->insert_id("client");
				if($last_id) {
					$loadbal = "INSERT INTO `account`(`client_id`) VALUES ('$last_id')";
					$this->db->query($loadbal);
					$data = array(
						"sender" => '+250780674459',
						"recipients" => $phone,
						"message" => "Welcome to Smart car parking system.\n Your passcode: " . $pass,
					  );
			  
					  $url = "https://www.intouchsms.co.rw/api/sendsms/.json";
					  $data = http_build_query($data);
					  $username = "julesntare";
					  $password = "ju.jo.123.its";
			  
					  $ch = curl_init();
					  curl_setopt($ch, CURLOPT_URL, $url);
					  curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
					  curl_setopt($ch, CURLOPT_POST, true);
					  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
					  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
					  $result = curl_exec($ch);
					  $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
					  curl_close($ch);
					  if ($httpcode == 200) {
						$message = '<label>SMS Sent</label>';
					  } else {
						$message = '<label>SMS not sent. try again</label>';
			  		}
				}

				$this->session->set_flashdata('message', "Client's registered!");
			}			
		}
	}

	public function displayClientsDisx() {
		$result['clientData']= $this->ClientModel->fetchClientsDisx();

		// Loading template
		$this->load->view('templates/header');
		$this->load->view('templates/menus');
		$this->load->view('client/clients_disabled', @$result);
		$this->load->view('templates/footer');
		$this->load->view('templates/downow');
	}

	public function bookingHistory() {

		$userc = $this->session->userdata('clogged_in');
		extract($userc);
		$result['historyData']= $this->ParkingModel->getBookingHistory($client_id);
		$result['historyCount']= $this->ParkingModel->countBookingHistory($client_id);

		// Loading template
		$this->load->view('templates/header');
		$this->load->view('templates/menus_client', @$result);
		$this->load->view('client/pkhistory', @$result);
		$this->load->view('templates/footer');
		$this->load->view('templates/downow');
	}

	public function clientAccount() {
		$userc = $this->session->userdata('clogged_in');
		extract($userc);
		$result['accountData']= $this->ClientModel->fetchOneClient($client_id);
		$result['historyCount']= $this->ParkingModel->countBookingHistory($client_id);

		// Loading template
		$this->load->view('templates/header');
		$this->load->view('templates/menus_client', @$result);
		$this->load->view('client/account', @$result);
		$this->load->view('templates/footer');
		$this->load->view('templates/downow');
	}


	public function clientFullData() {
		$client_id=$this->uri->segment(3);
		$result['avSlotData']= $this->SlotModel->getAvailableParkingSlots();
		$result['clientFullData']= $this->ClientModel->fetchOneClient($client_id);
		$result['vehicleData']=$this->ParkingModel->getClientVehicles($client_id);
		$result['historyCount']= $this->ParkingModel->countBookingHistory($client_id);

		// Loading template
		$this->load->view('templates/header');
		if($userc = $this->session->userdata('clogged_in')) {
			$this->load->view('templates/menus_client', @$result);
		} else {
			$this->load->view('templates/menus', @$result);
		}
		$this->load->view('client/clientdetails', @$result);
		$this->load->view('templates/footer');
		$this->load->view('templates/downow');

		if($this->input->post('saveVehicle')) {
			$veh_name= $this->input->post('veh_name');
			$veh_model= $this->input->post('veh_model');
			$plate_no= $this->input->post('plate_no');
			$vehicle_size= $this->input->post('vehicle_size');

			$sql = "SELECT * FROM `vehicles` WHERE veh_plateno='$plate_no' ";
			$check= $this->db->query($sql);

			if($check->num_rows()) {
				echo '<script>alert("Car plate number already exists!")</script>';
				redirect(base_url("client/assign/$client_id"));
			} else {
				$query= "INSERT INTO `vehicles`(`veh_name`, `veh_model`, `veh_size`, `veh_plateno`, `veh_owner`) VALUES ('$veh_name', '$veh_model', '$vehicle_size', '$plate_no', '$client_id')";
				$this->db->query($query);
				echo '<script>alert("New vehicle registered!")</script>';
				redirect(base_url("client/assign/$client_id"));
			}
		}
	}


	public function disableClient() {
		$client_id=$this->uri->segment(3);
		$result['historyCount']= $this->ParkingModel->countBookingHistory($client_id);

		$sql = "UPDATE `client` SET `status`='0' WHERE client_id='$client_id' ";
		$this->db->query($sql);
		$this->session->set_flashdata('message', "Client's disabled!");
		redirect(base_url("clients"));
	}

	public function enableClient() {
		$result['historyCount']= $this->ParkingModel->countBookingHistory($client_id);
		$client_id=$this->uri->segment(3);

		$sql = "UPDATE `client` SET `status`='1' WHERE client_id='$client_id' ";
		$this->db->query($sql);
		$this->session->set_flashdata('message', "Client's enabled!");
		redirect(base_url("clients/inactive"));
	}

	// Slots
	public function displaySlots() {
		$result['clientData']= $this->ClientModel->fetchParkingSlots();

		// Loading template
		$this->load->view('templates/header');
		$this->load->view('templates/menus', @$result);
		$this->load->view('admin/slots', @$result);
		$this->load->view('templates/footer');
		$this->load->view('templates/downow');

	}



}
?>