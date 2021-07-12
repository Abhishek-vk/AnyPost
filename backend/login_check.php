<?php

include '../Components/sql_connect.php';
$uname=mysqli_real_escape_string($conn,trim($_POST['uname']));
$pwd=mysqli_real_escape_string($conn,$_POST['pwd']);
$sql="SELECT * FROM users WHERE uname='$uname'";
$result=$conn->query($sql);
$data=$result->fetch_assoc();

if($result->num_rows==0)
	$res='none';
else if(!password_verify($pwd, $data['pwd']))
	$res='fail';
else{
	$res='pass';
	session_start();
	$_SESSION['user']=$data['uname'];
	$_SESSION['fname']=$data['fname'];
	$_SESSION['lname']=$data['lname'];
}
header("location:../login.php?match=".$res);

?>