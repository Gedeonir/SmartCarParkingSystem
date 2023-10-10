<?php
    include 'config.php';
    $today= date("Y-m-d H:i:s");
    $sql = mysqli_query($conn,"SELECT bk.*, sp.space_code, vh.veh_plateno, ct.firstname, ct.lastname, ct.phone_no,ct.email, ct.address FROM booking bk LEFT JOIN client ct ON ct.client_id= bk.owner_id LEFT JOIN vehicles vh ON vh.veh_id = bk.veh_id LEFT JOIN parking_spaces sp ON sp.space_id=bk.space_id");

    $output='';

    if(mysqli_num_rows($sql) > 0 ){
        while($row = mysqli_fetch_assoc($sql)){
            $output .= '<tr>
            <td data-toggle="tooltip" data-placement="bottom" title="'. $row['firstname'] .'" "'. $row['lastname'] .'"><medium>'. $row['email'] .'</medium></td>
            <td><medium>'. $row['parkingName'] .'</medium></td>
            <td><medium>'. $row['space_code'] .'</medium></td>
            <td data-toggle="tooltip" data-placement="bottom" title="'. $row['firstname'] .'" "'. $row['lastname'] .'"><medium>'. $row['veh_plateno'] .'</medium></td>
            <td><medium>'. $row['bk_status'] .'</medium></td>
            <td>
                <medium>'.date("Y M dS H:i:s", strtotime($row['bk_date'])) .' </medium>
            </td>
            <td>
                <medium>'.$row['in_date'].'</medium>
            </td>
            <td>
                <medium>'.$row['lv_date'].'</medium>
            </td>
        </tr>';
        }
    }else{
        $output .= "No record found";
        
    }

    echo $output;
    
?>