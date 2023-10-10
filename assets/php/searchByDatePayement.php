<?php
    include 'config.php';
    $output ='';
    $startDate = mysqli_real_escape_string($conn, $_POST['startDate']);
    $endDate = mysqli_real_escape_string($conn,$_POST['endDate']);


    $sql = mysqli_query($conn,"SELECT py.*,c.*,v.* from payment py LEFT JOIN client c ON c.client_id= py.client_id LEFT JOIN vehicles v ON v.veh_id = py.veh_id
    WHERE (py.py_date BETWEEN '$startDate' AND '$endDate') OR  (py.py_date >= '$startDate' AND py_date <= '$endDate') ORDER BY py_id DESC");
     


    if(mysqli_num_rows($sql) > 0 ){
        while($row = mysqli_fetch_assoc($sql)){
            $output .= '<tr>
            <td data-toggle="tooltip" data-placement="bottom" title="'. $row['firstname'] .'" "'. $row['lastname'] .'"><small>'. $row['email'] .'</small></td>
            <td><small>'. $row['phone_no'] .'</small></td>
            <td><small>'. $row['veh_plateno'] .'</small></td>
            <td><small>'. $row['duration'] .'</small></td>
            <td><small>'. $row['py_amount'] .'</small></td>
            <td>
                <small>'.date("Y M dS", strtotime($row['py_date'])) .'</small>
            </td>
        </tr>';
        }

    }else{
        $output .= "No records found related to your search found!";
        
    }


    echo $output;

?>