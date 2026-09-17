<?php

include('../../inc/connect.php');

$sql = "DELETE FROM dic_region WHERE id=".$_REQUEST['id'];

if(mysqli_query($link,$sql)) {
    header('Location: region.php');
} else {
    header('Location: region.php?err=1');
}

?>