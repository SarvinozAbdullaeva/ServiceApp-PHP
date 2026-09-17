<?php 
$link= new mysqli('localhost','root','','serviceapp');

$username= $_REQUEST['username'];
$password= $_REQUEST['password'];

$sql= mysqli_query($link,"SELECT * FROM dic_users WHERE username='".$username."' AND password='".$password."' ");

$rr=$sql->fetch_assoc();

if ($sql->num_rows > 0) {
	header('Location: ../profile/index.php');
    session_start();
    $_SESSION['user_id']=$rr['id'];
    $_SESSION['user_name']=$rr['name'];

} else {
	header('Location:index.php?err=1');

}

 ?>