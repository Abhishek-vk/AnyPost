<?php
	include '../Components/sql_connect.php';
	$uname=mysqli_real_escape_string($conn,$_GET['uname']);
	$fname=mysqli_escape_string($conn,$_GET['fname']);
	$lname=mysqli_real_escape_string($conn,$_GET['lname']);
	$email=mysqli_real_escape_string($conn,$_GET['email']);
	$pwd=mysqli_real_escape_string($conn,$_GET['pwd']);
	$submit=$_GET['submit'];
	$sql="SELECT * from users where uname='$uname'";
	$result1=$conn->query($sql);
	$sql="SELECT * from users where email='$email'";
	$result2=$conn->query($sql);
	if($submit!='yes'){
		if(($result1->num_rows)==0)
			echo 'true';
		else
			echo 'false';
	}
	else{
		if(($result1->num_rows)!=0)
			echo 'false';
		else if($fname===""||$lname===""||$pwd==="")
			echo 'failure';
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
			echo "invalid-mail";
		else if(($result2->num_rows)!=0)
			echo 'email';
		else{
			$pwd=password_hash($pwd, PASSWORD_BCRYPT, array('const'=>12));
			$sql="INSERT INTO users (uname,fname,lname,email,pwd) VALUES ('$uname','$fname','$lname','$email','$pwd')";
			if($conn->query($sql)){
				echo 'success';
				session_start();
				$_SESSION['user']=$uname;
				$_SESSION['fname']=$fname;
				$_SESSION['lname']=$lname;
			}
			else
				header("../error.php");

		}
	}

?>