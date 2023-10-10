<?php

class ParkingModel extends CI_Model{


	public function fetchParkingSlots(){
		$query=$this->db->query("SELECT * FROM parking_spaces");
		return $query->result();
	}

	public function fetchParkingSlot($space){
		$query=$this->db->query("SELECT * FROM parking_spaces WHERE space_id='$space'");
		return $query->result();
	}

	// Get vehicles
	public function getClientVehicles($id){
		$query=$this->db->query("SELECT * FROM vehicles WHERE veh_owner='$id' ");
		return $query->result();
	}

	public function getParkingInfo($id) {

		$sql="SELECT bk.*, sp.space_code, vh.veh_plateno, ct.firstname, ct.lastname, ct.phone_no, ct.address FROM booking bk LEFT JOIN client ct ON ct.client_id= bk.owner_id LEFT JOIN vehicles vh ON vh.veh_id = bk.veh_id LEFT JOIN parking_spaces sp ON sp.space_id=bk.space_id WHERE bk.bk_id = '$id' ";
		$query=$this->db->query($sql);
		return $query->result();
	}

	public function getParkingRequests() {

		$sql="SELECT bk.*, sp.space_code, vh.veh_plateno, ct.firstname, ct.lastname, ct.phone_no,ct.email, ct.address FROM booking bk LEFT JOIN client ct ON ct.client_id= bk.owner_id LEFT JOIN vehicles vh ON vh.veh_id = bk.veh_id LEFT JOIN parking_spaces sp ON sp.space_id=bk.space_id ORDER BY bk_id DESC ";
		$query=$this->db->query($sql);
		return $query->result();
	}

	// Get booking history
	public function getBookingHistory($id){
		$sql="SELECT bk.*, sp.space_code, vh.veh_plateno, ct.firstname, ct.lastname, ct.phone_no, ct.address FROM booking bk LEFT JOIN client ct ON ct.client_id= bk.owner_id LEFT JOIN vehicles vh ON vh.veh_id = bk.veh_id LEFT JOIN parking_spaces sp ON sp.space_id=bk.space_id WHERE owner_id='$id' LIMIT 40 ";
		$query=$this->db->query($sql);
		return $query->result();
	}

	public function countBookingHistory($id){

		$query=$this->db->query(" SELECT * FROM booking WHERE owner_id='$id' ");
		return $query->num_rows();
		
	}

	public function getAllParkingLimited(){
		$query=$this->db->query("SELECT * FROM parkings LIMIT 2");
		return $query->result();
	}

	public function getAllParkings(){
		$query=$this->db->query("SELECT * FROM parkings");
		return $query->result();
	}
	public function getOneParkingDetails(){
		$parking_id=$this->uri->segment(3);
		$query=$this->db->query(" SELECT * FROM parkings WHERE parkingId='$parking_id' ");
		return $query->result();
	}
	
}
?>