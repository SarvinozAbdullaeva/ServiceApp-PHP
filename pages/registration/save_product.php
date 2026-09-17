<?php

include('../../inc/connect.php');

$last_id = $_POST['reg_id'];
$seriya = $_POST['seriya'];
$model = $_POST['model'];
$product_id = $_POST['product_id'];
$notes = $_POST['notes'];

$sql = "INSERT INTO doc_reg_list(reg_id, product_id, model, seriyasi, notes)
        VALUES('".$last_id."', '".$product_id."', '".$model."', '".$seriya."' ,'')";

if(mysqli_query($link,$sql)) {
    echo $link->insert_id;
} else {
    echo 'false';
}

?>