<?php
if (isset($_GET['match']))
	if ($_GET['match'] == 'pass')
		header('location:index.php');
?>

<!DOCTYPE html>
<html>

<head>
	<title>Any Post-Login</title>
	<?php include 'Components/head.php' ?>
	<script type="text/javascript">

	</script>
</head>

<body>

	<header class="bg-dark">
		<h2 class="text-center" onclick="scrollup()">
			<span>Any Post
				<i class="fa fa-pencil"></i>
			</span>
		</h2>
		<button class="logout btn btn-primary" onclick="{location.href='signup.php'}">
			<span class='font-weight-normal d-none d-sm-inline' style="font-family:cursive">SIGNUP </span><i class="fa fa-sign-in"></i>
		</button>
	</header>
	<div class="container main w-75 w-sm-50">
		<div>
			<form class="w-100 pt-4" autocomplete="off" method="post" action="backend/login_check.php">
				<h3 class="w-50 mx-auto">
					<center>LOG IN</center>
				</h3>
				<div class="container w-50 form-box">
					<span id="mismatch">
						<?php
						if (isset($_GET['match'])) {
							if ($_GET['match'] == 'fail')
								echo "<div class='alert alert-danger'>ID and Password Missmatch!</div>";
							elseif ($_GET['match'] == 'none')
								echo "<div class='alert alert-danger'>User name not found!</div>";
						}
						?>
					</span>
					<input id="uname" class="form-control mt-4" placeholder="User Name" name="uname" type="text" required>
					<input id="pwd" class="form-control my-4" placeholder="Password" name="pwd" type="password" required>
					<input type="submit" value="Log In" class="btn btn-success" />
				</div>
				<div>&nbsp;</div>
			</form>
		</div>
	</div>

</body>

</html>