<?php

class Message extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
	}


	public function index() {
		if($this->input->post('register')) {

			$n= $this->input->post('name');
			$e= $this->input->post('email');
			$p= $this->input->post('pass');
			$m= $this->input->post('mobile');
			$c= $this->input->post('course');

			$que=$this->db->query("SELECT * from student where email='".$e."'");
			$row = $que->num_rows();

			if($row) {
				$data['message']="<h3 style='color:red'>This user already exists</h3>";
			} else {
				$que=$this->db->query("INSERT into student values('','$n','$e','$p','$m','$c')");
				$data['message']="<h3 style='color:blue'>Your account created successfully</h3>";
			}				
		}

		$this->load->view('student/student_registration',@$data);
	}



}
?>