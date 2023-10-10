<?php
    include 'config.php';
    date_default_timezone_set("Africa/Kigali");
    $today= date("Y-m-d H:i:s");
    $sql = mysqli_query($conn,"SELECT * FROM booking WHERE bk_status='Arrival' AND expire_at < '$today'");

    $output='';

    if(mysqli_num_rows($sql) > 0 ){
        while($row = mysqli_fetch_assoc($sql)){
            $slot=$row['space_id'];
            $sqlu="UPDATE booking  SET booking.bk_status= 'Expired'";
            $exe=$conn->query($sqlu);
            $sqlus="UPDATE parking_spaces  SET parking_spaces.availability= '1' WHERE space_id='$slot'";
            $exes=$conn->query($sqlus);
        }
        $output .= 'Success';
    }else{
        $output .= "No records found";
        
    }

    echo $output
    
?>