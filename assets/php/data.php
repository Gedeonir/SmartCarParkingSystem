<?php
while($row = mysqli_fetch_assoc($sql)){
    $userId = $row['client_id'];
    $userEmail = $row['email'];
    $output .= '<li class="p-2 border-bottom cursor-pointer user" onclick="getOwnerID(\''.str_replace("'","\\'",$userId).'\',\''.str_replace("'","\\'",$userEmail).'\')">'. $row['email'] .'</li>';
}
?>