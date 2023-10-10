<?php

class SlotModel extends CI_Model{
    

	public function fetchParkingSlots(){
		$parking_id=$this->uri->segment(3);
		$query=$this->db->query("SELECT * FROM parking_spaces where parkingId='$parking_id'");
		return $query->result();
	}

	public function getAvailableParkingSlots(){
		$parking_id=$this->uri->segment(3);
		$query=$this->db->query("SELECT * FROM parking_spaces WHERE availability='1' AND parkingId='$parking_id'");
		return $query->result();
	}

	public function fetchParkingSlot($space){
		$query=$this->db->query("SELECT * FROM parking_spaces WHERE space_id='$space' ");
		return $query->result();
	}




}
?>