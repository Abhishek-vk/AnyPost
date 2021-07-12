<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'anypost';

$conn = mysqli_connect($host, $username, $password);
if ($conn->connect_error) {
	if (file_exists('error.php'))
		header('error.php');
	else if (file_exists('../error.php'))
		header('../error.php');
	else
		die("Error: " . $conn->error);
}
$dbhandle = mysqli_select_db($conn, $database);
if (!$dbhandle) {
	$sql = '';
	if (file_exists('sql/anypost.sql'))
		$sql = file_get_contents('sql/anypost.sql');
	else if (file_exists('../sql/anypost.sql'))
		$sql = file_get_contents('../sql/anypost.sql');
	else
		die("Error: Database cannot be initialized");
	mysqli_multi_query($conn, $sql);
	header("Refresh:0");
}

$user_table = (mysqli_num_rows(mysqli_query($conn, "SHOW TABLES LIKE 'users'")) == 0);
$msg_table = (mysqli_num_rows(mysqli_query($conn, "SHOW TABLES LIKE 'message'")) == 0);
$reply_table = (mysqli_num_rows(mysqli_query($conn, "SHOW TABLES LIKE 'replies'")) == 0);

if ($user_table || $msg_table || $reply_table) {
	$sql = '';
	if (file_exists('sql/anypost.sql'))
		$sql = file_get_contents('sql/anypost.sql');
	else if (file_exists('../sql/anypost.sql'))
		$sql = file_get_contents('../sql/anypost.sql');
	else
		die("Error: Database cannot be initialized");
	mysqli_multi_query($conn, $sql);
	header("Refresh:0");
}
