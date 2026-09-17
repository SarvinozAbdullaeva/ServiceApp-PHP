<?php

include('../../inc/connect.php');

$name = $_POST['name'];
$phone = $_POST['phone'];
$region_name = $_POST['region_name'];
$adress = $_POST['adress'];


if(!isset($_REQUEST['id'])) {
    $sql = "INSERT INTO dic_client(name, phone, region_name,adress)
                VALUES('".$name."', '".$phone."', '".$region_name."', '".$adress."')";
} else {
    $sql = "UPDATE dic_client SET 
                name ='".$name."',
                phone='".$phone."',
                region_name='".$region_name."',
                adress='".$adress."'
            WHERE id=".$_REQUEST['id']."
            ";
}




if(mysqli_query($link,$sql)) {
    header('Location: index.php');
} else {
    header('Location: index.php?err=1');
}

?>