<?php
	session_start();
	include '../Components/sql_connect.php';
	$user=$_SESSION['user'];
	$msgid=mysqli_real_escape_string($conn,$_POST['msgid']);
	$reply=mysqli_real_escape_string($conn,$_POST['reply']);
	$id=$msgid;
	$sql="INSERT INTO replies (msgid,user,reply) VALUES ('$msgid','$user','$reply')";
	// $sql->bind_param("sss",$msgid,$user,$reply);
	if($conn->query($sql)){
		$var=include '../Components/reply.php';
		echo rtrim($var,'1');
	}
	else
		die('Error: '.$conn->error);
