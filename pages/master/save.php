<?php

include('../../inc/connect.php');

$name = $_POST['name'];
$phone = $_POST['phone'];

if(!isset($_REQUEST['id'])) {
    $sql = "INSERT INTO dic_usta(name, phone)
                VALUES('".$name."', '".$phone."')";
} else {
    $sql = "UPDATE dic_usta SET 
                name='".$name."',
                phone='".$phone."'
                WHERE id=".$_REQUEST['id']."
            ";
}




if(mysqli_query($link,$sql)) {
    header('Location: index.php');
} else {
    header('Location: index.php?err=1');
}

?>