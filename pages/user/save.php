<?php

include('../../inc/connect.php');


$username = $_POST['username'];
$password = $_POST['password'];

if(!isset($_REQUEST['id'])) {
    $sql = "INSERT INTO dic_users(username, password)
                VALUES('".$username."', '".$password."')";
} else {
    $sql = "UPDATE dic_users SET 
               
                username='".$username."',
                password='".$password."'
                WHERE id=".$_REQUEST['id']."
            ";
}




if(mysqli_query($link,$sql)) {
    header('Location: index.php');
} else {
    header('Location: index.php?err=1');
}

?>