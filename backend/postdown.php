<?php

  session_start();
  $uname=$_SESSION['user'];
  $msgid=$_GET['msgid'];
  include '../Components/sql_connect.php';
  $sql="DELETE FROM `message` WHERE id='$msgid'";
  if($conn->query($sql)){
    $sql="DELETE FROM replies WHERE msgid='$msgid'";
    $conn->query($sql);
    header('Location:../index.php');
  }
  else
    die("ERROR: ".$conn->error);

?>