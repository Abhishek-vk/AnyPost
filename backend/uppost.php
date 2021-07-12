<?php

	session_start();
	include '../Components/sql_connect.php';
	$uname=mysqli_real_escape_string($conn,$_SESSION['user']);
	$message=mysqli_real_escape_string($conn,$_POST['message']);
	$sql="INSERT INTO `message` (`user`,`message`) VALUES ('$uname','$message')";
	if($conn->query($sql))
		header('Location:../index.php');
	else
		die("ERROR: ".$conn->error);
?>