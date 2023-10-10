<?php
     
    require 'database.php';
 
    if ( !empty($_POST)) {
        // keep track post values
        $client_id = $_POST['client_id'];
		$balance= $_POST['balance']+=$balance;
        
		// insert data
        $pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	

		$sqlfetch = "SELECT * FROM account WHERE client_id = '$client_id'";
		$qf = $pdo->prepare($sqlfetch);
		$qf->execute();
		$dataf = $qf->fetch();
		$balancee = $dataf['balance'];
		$newbalnce = $balance + $balancee;

		$sqlup = "UPDATE account SET balance = '$newbalnce' WHERE client_id = '$client_id'";
		$qup = $pdo->prepare($sqlup);
		$qup->execute();

		Database::disconnect();
		header("Location: user data2.php");
    }
?>