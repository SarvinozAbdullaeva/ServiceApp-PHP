<?php

include('../../inc/connect.php');

$sana = $_REQUEST['date'];
$status_id = $_REQUEST['status_id'];
$service_id = $_REQUEST['service_id'];
$product_id = $_REQUEST['product_id'];
$seriya = $_REQUEST['seriya'];
$model = $_REQUEST['model'];
$client_id = $_REQUEST['client_id'];
$notes = $_REQUEST['notes'];

$sql = "INSERT INTO doc_order(sana, client_id, service_id, status_id, notes)
        VALUES('".$sana."', '".$client_id."', '".$service_id."', '".$status_id."', '".$notes."')
    ";

if(mysqli_query($link,$sql)) {

    $last_id = $link->insert_id;

    $sql_list = "INSERT INTO doc_reg_list(reg_id, product_id, model, seriyasi, notes)
        VALUES('".$last_id."', '".$product_id."', '".$model."', '".$seriya."' ,'')";

    if(mysqli_query($link,$sql_list)) {
        header('Location: index.php');
    }

    
} else {
    header('Location: index.php?err=1');
}

?>