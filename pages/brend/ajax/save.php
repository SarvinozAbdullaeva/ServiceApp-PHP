<?php

include('../../../inc/connect.php');

$name = $_POST['nomi'];


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
    echo $link->insert_id;
} else {
    echo 'false';
}

?>