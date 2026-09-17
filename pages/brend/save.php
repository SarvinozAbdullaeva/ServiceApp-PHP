<?php

include('../../inc/connect.php');

$name = $_POST['name'];


if(!isset($_REQUEST['id'])) {
    $sql = "INSERT INTO dic_brand(name)
                VALUES('".$name."')";
} else {
    $sql = "UPDATE dic_brand SET 
                name='".$name."'
               
            WHERE id=".$_REQUEST['id']."
            ";
}




if(mysqli_query($link,$sql)) {
    header('Location: index.php');
} else {
    header('Location: index.php?err=1');
}

?>