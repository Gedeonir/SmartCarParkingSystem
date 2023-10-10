<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "digitalparking";
$price=500;

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
date_default_timezone_set("Africa/kigali");

// global variables
$servo=0;
$bal=0;
$paid=0;
$book=0;
$card_valid=0;
$bal_valid=0;
$in_out=1;
$card=$_GET['card'];
$lastname="";
$sql="SELECT * FROM client as c WHERE c.card_number='$card'";
$exe=$conn->query($sql);
if ($exe->num_rows<=0) {
	$card_valid=0;
}
else{
	$card_valid=1;
	
	while ($row=$exe->fetch_array()) {
		$client_id=$row['client_id'];
		$lastname=$row['lastname'];
		$firstname=$row['firstname'];
		$email=$row['email'];
	}

	$sql="SELECT * FROM  booking as b INNER JOIN account as acc on acc.client_id=b.owner_id  WHERE b.owner_id='$client_id' and b.bk_status!='paid'";
	$exe=$conn->query($sql);
	if($exe->num_rows>0){
		$book=1;
		while ($row=$exe->fetch_array()) {
			$status=$row['bk_status'];
			$balance=$row['balance'];
			$bk_id=$row['bk_id'];
			$in_date=$row['in_date'];
			$space_id=$row['space_id'];
			$veh_id=$row['veh_id'];
		}
		if($status=='Arrival'){
			$in_out=0;
			$time_in=time();
			$sql="UPDATE `booking` SET `bk_status` = 'unpaid',`in_date`='$time_in' WHERE `booking`.`bk_id` = '$bk_id'";
			$exe=$conn->query($sql);
			if ($exe==true) {
				$servo=1;
			}
		}
		if ($status='unpaid') {
			if($in_date==""){
				$in_date=0;
			}
		
			$time_out=time();
			$in_date_s=$in_date; 
			$duration=($time_out-$in_date_s);
			$paid= ($duration/3600)*$price;
			$bal=$balance-$paid;
			if($bal>=0){
				$bal_valid=1;
				$sql="UPDATE booking  SET booking.lv_date= '$time_out',booking.bk_status='paid' WHERE booking.bk_id = '$bk_id'";
				$exe=$conn->query($sql);
				$sql="UPDATE account  SET balance= '$bal' WHERE client_id='$client_id'";
				$exe=$conn->query($sql);
				$sql="UPDATE `parking_spaces` SET `availability` = '1' WHERE `parking_spaces`.`space_id` = '$space_id'";
				$exe=$conn->query($sql);
				$sql="INSERT INTO `payment`(`py_id`, `py_amount`, `duration`, `client_id`, `veh_id`) VALUES (NULL,'$paid','$duration','$client_id','$veh_id')";
				$exe=$conn->query($sql);
				if ($exe=true) {
					$servo=1;
				}
			}

		}
	}
	else{
		$book=0;
		
	}

}

$response='{"card_valid":'.$card_valid.',"bal":'.$bal.',"servo":'.$servo.',"name":"'.$lastname.'","charged":'.$paid.',"book":'.$book.',"bal_valid":'.$bal_valid.',"in_out":'.$in_out.'}';
echo $response;


?>