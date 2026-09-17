<?php

include('../../inc/connect.php');

$name = $_POST['name'];


if(!isset($_REQUEST['id'])) {
    $sql = "INSERT INTO dic_region(name)
                VALUES('".$name."')";
} else {
    $sql = "UPDATE dic_region SET 
                name='".$name."'
                WHERE id=".$_REQUEST['id']."
            ";
}




if(mysqli_query($link,$sql)) {
    header('Location: region.php');
} else {
    header('Location: region.php?err=1');
}

?>