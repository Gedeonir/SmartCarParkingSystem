<?php

class MainModel extends CI_Model{  

	public function fetchAdmins(){
		$query=$this->db->query("SELECT * FROM admin ORDER BY admin_id DESC ");
		return $query->result();
	}

	public function fetchOneAdmin($id){
		$query=$this->db->query("SELECT * FROM admin WHERE admin_id='$id' ");
		return $query->result();
	}


	// Counters
	public function countParkingReqs(){
		$query=$this->db->query("SELECT * FROM booking");
		return $query->num_rows();
	}

	public function countAvailableSlots(){
		$query=$this->db->query("SELECT * FROM parking_spaces WHERE availability='1'");
		return $query->num_rows();
	}

	public function countBookedSlots(){
		$query=$this->db->query("SELECT * FROM parking_spaces WHERE availability='0'");
		return $query->num_rows();
	}

	public function countClients(){
		$query=$this->db->query("SELECT * FROM client ");
		return $query->num_rows();
	}

	public function countParkings(){
		$query=$this->db->query("SELECT * FROM parkings");
		return $query->num_rows();
	}

}
?>