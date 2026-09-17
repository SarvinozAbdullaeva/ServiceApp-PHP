<?php

include('../../inc/connect.php');

$name = $_POST['name'];
$is_active = $_POST['is_active'];


if(!isset($_REQUEST['id'])) {

    $sql = "INSERT INTO dic_service(name,is_active)
                VALUES('".$name."','".$is_active ."')";

} else {

    $sql = "UPDATE dic_service SET 
                name='".$name."',
                is_active='".$is_active."'
            WHERE id=".$_REQUEST['id']."
            ";

}




if(mysqli_query($link,$sql)) {
    header('Location: index.php');
} else {
    header('Location: index.php?err=1');
}

?>