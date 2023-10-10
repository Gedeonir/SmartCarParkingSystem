<?php
    include 'config.php';
    $output ='';
    $startDate = mysqli_real_escape_string($conn, $_POST['startDate']);
    $endDate = mysqli_real_escape_string($conn,$_POST['endDate']);


    $sql = mysqli_query($conn,"SELECT bk.*, sp.space_code, vh.veh_plateno, ct.firstname, ct.lastname, ct.phone_no,ct.email, ct.address FROM booking bk LEFT JOIN client ct ON ct.client_id= bk.owner_id LEFT JOIN vehicles vh ON vh.veh_id = bk.veh_id LEFT JOIN parking_spaces sp ON sp.space_id=bk.space_id WHERE (bk.bk_date BETWEEN '$startDate' AND '$endDate') OR 
    (bk.bk_date >= '$startDate' AND bk_date <= '$endDate') ORDER BY bk_id DESC"); 


    if(mysqli_num_rows($sql) > 0 ){
        while($row = mysqli_fetch_assoc($sql)){
            $output .= '<tr>
            <td data-toggle="tooltip" data-placement="bottom" title="'. $row['firstname'] .'" "'. $row['lastname'] .'"><small>'. $row['email'] .'</small></td>
            <td><small>'. $row['parkingName'] .'</small></td>
            <td><small>'. $row['space_code'] .'</small></td>
            <td data-toggle="tooltip" data-placement="bottom" title="'. $row['firstname'] .'" "'. $row['lastname'] .'"><small>'. $row['veh_plateno'] .'</small></td>
            <td><small>'. $row['bk_status'] .'</small></td>
            <td>
                <small>'.date("Y M dS", strtotime($row['bk_date'])) .' </small>
            </td>
            <td>
                <small>'.date("Y M dS", strtotime($row['in_date'])) .'</small>
            </td>
            <td>
                <small>'.date("Y M dS", strtotime($row['lv_date'])) .'</small>
            </td>
        </tr>';
        }

    }else{
        $output .= "No recods found related to your search found!";
        
    }


    echo $output;

?>