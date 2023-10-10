<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SlotController extends CI_Controller {

     public function __construct() {
          
          parent::__construct();
         
          // Loading models manually
          $this->load->model('SlotModel');
     }


	// Slots
	public function displaySlots() {
		$result['slotData']= $this->SlotModel->fetchParkingSlots();

		// Loading template
		$this->load->view('templates/header');
		// $this->load->view('templates/menus');
		$this->load->view('admin/slots', @$result);
		$this->load->view('templates/footer');
		$this->load->view('templates/downow');

	}


	public function updateSlot() {

		$slot_id=$this->uri->segment(3);
		$data['singleslot']= $this->SlotModel->fetchParkingSlot($slot_id);

		// Loading template
		$this->load->view('templates/header');
		$this->load->view('templates/menus');
		$this->load->view('admin/slot_edit', @$data);
		$this->load->view('templates/footer');
		$this->load->view('templates/downow');

		// Updating
		if($this->input->post('updateslot')) {

			$size = $this->input->post('space_size');
			$level= $this->input->post('space_level');
			$code = $this->input->post('space_code');
			
			$sql = "SELECT * FROM parking_spaces WHERE space_code='$code' ";
			$check= $this->db->query($sql);

			if($check->num_rows()) {
				$data['message']="There is a problem!</h3>";
				redirect(base_url("index.php/slots"));
			} else {
				$query= "UPDATE parking_spaces SET space_code='$code', space_size='Medium', space_level='$level' WHERE space_id='$slot_id' ";
				$this->db->query($query);
				$this->session->set_flashdata('message', "Parking slot is updated!");
				redirect(base_url("index.php/slots"));		
			}			
		}
	}


	public function deleteSlot() {

		$slot_id=$this->uri->segment(3);
		// Delete this sh
		$query= "DELETE FROM parking_spaces WHERE space_id='$slot_id' ";
		$this->db->query($query);
		$this->session->set_flashdata('message', "Parking slot is deleted!");
		redirect(base_url("index.php/slots"));					
	}


}
?>