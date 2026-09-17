<?php

include('../../inc/connect.php');

$doc_reg_id = $_REQUEST['doc_reg_id'];
$doc_reg_list_id = $_REQUEST['doc_reg_list_id'];
$usta_id = $_REQUEST['usta_id'];

$sql ="INSERT INTO doc_remont(date_in, doc_reg_list_id, doc_reg_id, status_id,notes,usta_id)
VALUES(CURDATE(),'".$doc_reg_list_id."', '".$doc_reg_id."',0, '' ,'".$usta_id."')";

    if(mysqli_query($link,$sql_list)) {
        header('Location: daily.php');
    }else {
    header('Location: daily.php?err=1');
    }

?>