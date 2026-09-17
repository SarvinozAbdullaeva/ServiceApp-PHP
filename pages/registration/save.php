<?php

include('../../inc/connect.php');

$sana = $_POST['sana'];
$status_id = $_POST['status_id'];
$service_id = $_POST['service_id'];
$client_id = $_POST['client_id'];
$notes = $_POST['notes'];

$sql = "INSERT INTO doc_reg(sana, client_id, service_id, notes, status_id, qushilgan_vaqti)
        VALUES('".$sana."', '".$client_id."', '".$service_id."', '".$notes."', '".$status_id."', CONCAT(CURDATE(),' ',CURTIME()))
    ";

if(mysqli_query($link,$sql)) {
    echo $link->insert_id;
} else {
    echo 'false';
}

?>