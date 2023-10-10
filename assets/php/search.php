<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "digitalparking";
    $conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $output ='';
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

    $sql = mysqli_query($conn,"SELECT * FROM client WHERE username LIKE '%$searchTerm%' OR email LIKE '%$searchTerm%' OR firstname LIKE '%$searchTerm%' OR lastname LIKE '%$searchTerm%'");

    if(mysqli_num_rows($sql) > 0 ){
       include "data.php";
    }else{
         $output .= "No user related to your search found!";
        
    }

    echo $output;
?>