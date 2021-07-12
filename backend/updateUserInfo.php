<?php
session_start();
include '../Components/sql_connect.php';
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$uname = $_SESSION['user'];
$sql = "UPDATE users SET fname='$fname',lname='$lname' WHERE uname='$uname'";
if (!$conn->query($sql))
    die('Error: ' . $conn->error);
header("location:../user.php?user=$uname");
