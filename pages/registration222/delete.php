<?php

include('../../inc/connect.php');

$sql = "DELETE FROM dic_product WHERE id=".$_REQUEST['id'];

if(mysqli_query($link,$sql)) {
    header('Location: index.php');
} else {
    header('Location: index.php?err=1');
}

?>