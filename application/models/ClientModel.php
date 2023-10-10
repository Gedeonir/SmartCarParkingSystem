<?php

class ClientModel extends CI_Model{  
    
    public function insertSomething($data) {
    	// Thru ajax
		if($this->db->insert('table_name', $data)) {
			return 1;	
		} else {
			return 0;	
		}
    }

    public function fetchAllClients(){
		$query=$this->db->query("SELECT * FROM client");
		return $query->result();
	}

    public function fetchClients(){
		$query=$this->db->query("SELECT cl.client_id, cl.firstname, cl.lastname, cl.username, cl.phone_no, cl.email, cl.password, cl.address, cl.card_number, cl.status, cl.date_created, ac.balance, ac.update_date FROM client cl JOIN account ac ON ac.client_id= cl.client_id WHERE status='1' ORDER BY cl.client_id DESC ");
		return $query->result();
	}

	public function fetchOneClient($id){
		$query=$this->db->query("SELECT cl.client_id, cl.firstname, cl.lastname, cl.username, cl.phone_no, cl.email, cl.password, cl.address, cl.card_number, cl.status, cl.date_created, ac.balance, ac.update_date FROM client cl JOIN account ac ON ac.client_id= cl.client_id WHERE cl.client_id='$id' ORDER BY cl.client_id DESC ");
		return $query->result();
	}

	public function fetchClientsFromLast(){
		$query=$this->db->query("SELECT cl.client_id, cl.firstname, cl.lastname, cl.username, cl.phone_no, cl.email, cl.password, cl.address, cl.card_number, cl.status, cl.date_created, ac.balance, ac.update_date FROM client cl JOIN account ac ON ac.client_id= cl.client_id ORDER BY cl.client_id DESC ");
		return $query->result();
	}

    public function fetchClientsDisx(){
		$query=$this->db->query("SELECT cl.client_id, cl.firstname, cl.lastname, cl.username, cl.phone_no, cl.email, cl.password, cl.address, cl.card_number, cl.status, cl.date_created, ac.balance, ac.update_date FROM client cl JOIN account ac ON ac.client_id= cl.client_id WHERE status='0' ORDER BY cl.client_id DESC ");
		return $query->result();
	}

	// Not used
	public function disableClient($client){
		$query=$this->db->query("UPDATE client SET status='0' WHERE client_id='$client' ");
		return $query->result();
	}

	public function searchClient($user){
		$query=$this->db->query("SELECT * FROM client WHERE username LIKE '%$user%' OR email LIKE '%$user%'");
		return $query->result();
	}


}
?>