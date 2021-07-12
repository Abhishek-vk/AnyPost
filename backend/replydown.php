<?php 
  session_start();
  $id=$_GET['id'];
  include '../Components/sql_connect.php';
  $sql="DELETE FROM replies WHERE id='$id'";
  if($conn->query($sql)){
    $id=$_GET['msgid'];
		$var=include '../Components/reply.php';
		echo rtrim($var,'1');
	}
	else
		die('Error: '.$conn->error);

?>