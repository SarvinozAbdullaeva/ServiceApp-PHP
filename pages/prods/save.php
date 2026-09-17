<?php

include('../../inc/connect.php');

$name = $_POST['name'];
$brand = $_POST['brand'];
$code = $_POST['code'];
$item = $_POST['item'];

if(!isset($_REQUEST['id'])) {

    $sql = "INSERT INTO dic_products(name,brand,code,item)
                VALUES('".$name."','".$brand."','".$code."','".$item."')";

} else {

    $sql = "UPDATE dic_products SET 
                name='".$name."',
                brand='".$brand."',
                code='".$code."',
                item='".$item."'
            WHERE id=".$_REQUEST['id']."
            ";

}




if(mysqli_query($link,$sql)) {
    header('Location: index.php');
} else {
    header('Location: index.php?err=1');
}

?>