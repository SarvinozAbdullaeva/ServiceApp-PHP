<?php

include('../../inc/connect.php');

$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$region_id = $_POST['region_id'];

if(!isset($_REQUEST['id'])) {
    $sql = "INSERT INTO dic_client(name, phone, addres, reg_id)
                VALUES('".$name."', '".$phone."', '".$address."', '".$region_id."')";
} else {
    $sql = "UPDATE dic_client SET 
                name='".$name."',
                phone='".$phone."',
                reg_id='".$region_id."',
                addres='".$address."'
            WHERE id=".$_REQUEST['id']."
            ";
}




if(mysqli_query($link,$sql)) {
    header('Location: index.php');
} else {
    header('Location: index.php?err=1');
}

?>