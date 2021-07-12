<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	session_start();
	$_SESSION['gotomsg']=$_GET['msgid'];
	$_SESSION['gotorep']=$_GET['id'];
	header("location: ../index.php");

?>