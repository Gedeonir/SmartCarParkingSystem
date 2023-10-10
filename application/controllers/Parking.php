<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parking extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library(['form_validation','session']);
		$this->load->model('ClientModel');
		$this->load->model('ParkingModel');
		$this->load->model('SlotModel');
		$this->load->model('MainModel');

	}

	public function index() {
		$result['bookingData']= $this->ClientModel->fetchClientsFromLast();

		$this->load->view('templates/header');
		$this->load->view('templates/menus', @$result);
		$this->load->view('admin/booking', @$result);
		$this->load->view('templates/footer');
		$this->load->view('templates/downow');
	}


	public function bookParking() {

		$client_id=$this->uri->segment(3);
		$result['avSlotData']= $this->SlotModel->getAvailableParkingSlots();
		$result['vehicleData']=$this->ParkingModel->getClientVehicles($client_id);
		$result['clientData']= $this->ClientModel->fetchOneClient($client_id);
		$result['historyCount']= $this->ParkingModel->countBookingHistory($client_id);

		// Loading template
		$this->load->view('templates/header');
		$this->load->view('templates/menus', @$result);
		$this->load->view('appages/availableslots', @$result);
		$this->load->view('templates/footer');
		$this->load->view('templates/downow');

		if($this->input->post('saveBooking')) {
			$slot_id = $this->input->post('booked_slot');
			$veh_id  = $this->input->post('veh_id');

			$sql = "SELECT * FROM booking WHERE space_id='$slot_id' AND owner_id='$client_id' ";
			$check= $this->db->query($sql);

			if($check->num_rows()) {
				$this->session->set_flashdata('warning', "You're already booked this!");
				redirect(base_url("parking/arrange/$client_id"));

			} else {
			$query= "INSERT INTO `booking`(`owner_id`, `veh_id`, `space_id`, `bk_status`) VALUES ('$client_id', '$veh_id', '$slot_id', 'Arrival')";
			$this->db->query($query);

			// Update Slots
			$upd_query= "UPDATE `parking_spaces` SET `availability` = '0' WHERE space_id= '$slot_id' ";
			$this->db->query($upd_query);

			$this->session->set_flashdata('message', "Booking is successful!");
	$this->session->unset_userdata('message');
			redirect(base_url("parking/arrange/$client_id"));
			}
		}
	}



	public function checkParking() {

		$bookingId=$this->uri->segment(3);
		$result['parkingInfo']=$this->ParkingModel->getParkingInfo($bookingId);

		// Loading template
		$this->load->view('templates/header');
		$this->load->view('templates/menus', @$result);
		$this->load->view('admin/checkbooking', @$result);
		$this->load->view('templates/footer');
		$this->load->view('templates/downow');

		if($this->input->post('saveBooking')) {
			$slot_id = $this->input->post('booked_slot');
			$veh_id  = $this->input->post('veh_id');

			$sql = "SELECT * FROM booking WHERE space_id='$slot_id' AND owner_id='$client_id' ";
			$check= $this->db->query($sql);

			if($check->num_rows()) {
				$this->session->set_flashdata('warning', "You're already booked this!");
				redirect(base_url("parking/arrange/$client_id"));

			} else {
			$query= "INSERT INTO `booking`(`owner_id`, `veh_id`, `space_id`, `bk_status`) VALUES ('$client_id', '$veh_id', '$slot_id', 'Arrival')";
			$this->db->query($query);

			// Update Slots
			$upd_query= "UPDATE `parking_spaces` SET `availability` = '0' WHERE space_id= '$slot_id' ";
			$this->db->query($upd_query);

			$this->session->set_flashdata('message', "Booking is successful!");
			redirect(base_url("parking/arrange/$client_id"));
			
			}
		}
	}


	public function finishParkingDeed() {

		$bookingId=$this->uri->segment(3);
		$userc = $this->session->userdata('clogged_in');

		if(!empty($bookingId)) {
			// Update parking booking
			$upd_query= "UPDATE `booking` SET `bk_status` = 'Paid' WHERE bk_id= '$bookingId' ";
			$this->db->query($upd_query);
		}

		//API inputs by using POST method
		$paid_amount  = $this->input->post('paid_amount');
		$duration = $this->input->post('duration');
		$client_id = $this->input->post('client_id');
		$vehicle_id = $this->input->post('vehicle_id');
		
		if(!empty($paid_amount) && !empty($duration) && !empty($client_id) && !empty($vehicle_id)) {
			$query= "INSERT INTO `payment`(`py_amount`, `duration`, `client_id`, `veh_id`) VALUES ('$paid_amount', '$duration', '$client_id', '$vehicle_id')";
			$this->db->query($query);

			// Update money of client immediately
			//$final_balance= $paid_amount - $current_bal;
			//$upd_query= "UPDATE `account` SET `balance`='$final_balance' WHERE client_id= '$client_id' ";
			//$this->db->query($upd_query);


			$this->session->set_flashdata('message', "Booking action is complete!");
			redirect(base_url("parking/check/$bookingId"));
		} else {
			$this->session->set_flashdata('message', "Booking action failed!");
		}
	}



	public function bookParkingClient() {

		$userc = $this->session->userdata('clogged_in');
		extract($userc);
		$result['avSlotData']= $this->SlotModel->getAvailableParkingSlots();
		$result['vehicleData']=$this->ParkingModel->getClientVehicles($client_id);
		$result['clientData'] =$this->ClientModel->fetchOneClient($client_id);
		$result['historyCount']= $this->ParkingModel->countBookingHistory($client_id);
		$result['slotData']= $this->SlotModel->fetchParkingSlots();
		$result['parkingData'] = $this->ParkingModel->getOneParkingDetails();

		// Loading template
		$this->load->view('templates/header');
		$this->load->view('templates/menus_client', @$result);
		$this->load->view('client/bookparking', @$result);
		$this->load->view('templates/footer');
		$this->load->view('templates/downow');


		if($this->input->post('saveBooking')) {
			$slot_id = $this->input->post('booked_slot');
			$veh_id  = $this->input->post('veh_id');
			$parkingId = $this->input->post('parkingId');
			$parkingName  = $this->input->post('parkingName');
			date_default_timezone_set("Africa/Kigali");
			$expire_at = date("Y-m-d H:i:s");
			$newDate = date('Y-m-d H:i:s', strtotime($expire_at. ' +5 minutes'));

			$sql = "SELECT * FROM booking WHERE owner_id='$client_id' AND bk_status ='Arrival' OR bk_status = 'unpaid'";
			$check= $this->db->query($sql);

			if($check->num_rows()) {
				echo '<script>alert("You have  pending booking!")</script>';
			} else {
				$phone = "";
				$sqlp = "SELECT * FROM client WHERE client_id='$client_id'";
				$exe = $this->db->query($sqlp);
				if($exe->num_rows()){
					$row=$exe->result_array();
					$phone = $row[0]['phone_no'];
				}


				$vehicle = "";

				$sqlv = "SELECT * FROM vehicles WHERE veh_id='$veh_id'";
				$exev = $this->db->query($sqlv);
				if($exev->num_rows()){
					$row=$exev->result_array();
					$vehicle = $row[0]['veh_plateno'];
				}

				$data = array(
					"sender" => '+250780674459',
					"recipients" => $phone,
					"message" => "Your booking has been confirmed .\n Your booking details: \n 
					parkingName:". $parkingName ."\n Vehicle plate number: ".$vehicle."\n Booked at:" .$expire_at."\n Booking expire _at:".$newDate,
				);

				$query= "INSERT INTO `booking`(`owner_id`, `veh_id`,`parkingId`,`parkingName` ,`space_id`, `bk_status`,`expire_at`) VALUES ('$client_id', '$veh_id','$parkingId','$parkingName', '$slot_id', 'Arrival','$newDate')";
				$exe=$this->db->query($query);

				if ($exe=true) {
					$upd_query= "UPDATE `parking_spaces` SET `availability` = '0' WHERE space_id= '$slot_id' ";
					$this->db->query($upd_query);
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
					echo '<script>alert("booking created!")</script>';
					redirect(base_url("client/parking/".$parkingId."/book"));
					
				}else{
					echo '<script>alert("Error occured")</script>';
				}
				}

		}
	}


		// Parking requests
	public function parkingRequests() {

		$result['reqData']= $this->ParkingModel->getParkingRequests();

		// Loading template
		$this->load->view('templates/header');
		$this->load->view('templates/menus');
		$this->load->view('admin/requests', @$result);
		$this->load->view('templates/footer');
		$this->load->view('templates/downow');
		$this->load->view('templates/modals');
	}

	public function getAllParkings(){
		$data['allParkingsData'] = $this->ParkingModel->getAllParkings();
		$data['parkingsCount'] = $this->MainModel->countParkings();

		$this->load->view('templates/header');
		$this->load->view('templates/menus');
		$this->load->view('admin/allParkings', @$data);
		$this->load->view('templates/footer');
		$this->load->view('templates/downow');
		$this->load->view('templates/modals',@$data);

		if($this->input->post('saveParking')) {
			$pname= $this->input->post('parkingName');
			$plocation= $this->input->post('location');
			$user_id= $this->input->post('user_id');
			$prices= $this->input->post('prices');
			$ownerMail = $this->input->post('email');
			$category = $this->input->post('category');


			$sql = "INSERT INTO `parkings`(`parkingName`, `parkingLocation`, `ownerID`, `parkingOwner`, `carCategories`, `pricePerHour`) VALUES ('$pname', '$plocation', '$user_id','$ownerMail','$category','$prices')";
			if($this->db->query($sql)){
				$upd_query= "UPDATE `CLIENT` SET `role` = 'parkingOwner' WHERE client_id= '$user_id' ";
				$this->db->query($upd_query);
				$this->session->set_flashdata('message', "Parking created successfully");		
			}else {
				$data['message']="Parking creation failed</h3>";
			}			
		}

	}

	public function getAllPayements(){
		$this->load->view('templates/header');
		$this->load->view('templates/menus');
		$this->load->view('admin/payements',);
		$this->load->view('templates/footer');
		$this->load->view('templates/downow');
		$this->load->view('templates/modals');

	}

	public function getOneParkingDetails(){
		$data['parkingData'] = $this->ParkingModel->getOneParkingDetails();
		$data['slotData']= $this->SlotModel->fetchParkingSlots();

		$this->load->view('templates/header');
		$this->load->view('templates/menus');
		$this->load->view('admin/parkingDetails', @$data);
		$this->load->view('templates/footer');
		$this->load->view('templates/downow');
		$this->load->view('templates/modals');

		if($this->input->post('saveslot')) {
			$code = "PK-".rand(10000, 99999);
			$size = $this->input->post('space_size');
			$level= $this->input->post('space_level');
			$parkingId= $this->input->post('parkingId');

			$sql = "SELECT * FROM parking_spaces WHERE space_code='$code' ";
			$check= $this->db->query($sql);
			$sql = "INSERT INTO `parking_spaces`(`space_code`, `space_size`, `space_level`,`parkingId`) VALUES ('$code', '$size', '$level','$parkingId')";
			$this->db->query($sql);
			if($check->num_rows()) {
				echo '<script>alert("New parking slot is created!")</script>';
				redirect(base_url("admin/parkings/".$parkingId));
			}else{
				echo '<script>alert("New parking slot is not created!")</script>';
			}	
					
		}

	}



}
?>