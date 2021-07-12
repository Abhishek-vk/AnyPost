<!DOCTYPE html>
<html>

<head>
	<title>Any Post-Signup</title>
	<?php include 'Components/head.php' ?>
	<script type="text/javascript">
		function checkavail(e, sub) {
			xmlhttp = new XMLHttpRequest();
			uname = document.getElementById('uname').value.trim();
			fname = document.getElementById('fname').value.trim();
			lname = document.getElementById('lname').value.trim();
			email = document.getElementById('email').value.trim();
			pwd = document.getElementById('pwd').value;
			input = 'uname=' + uname + '&fname=' + fname + '&lname=' + lname + '&email=' + email + '&pwd=' + pwd + '&submit=' + sub;
			xmlhttp.open('GET', 'backend/adduser.php?' + input, false);
			xmlhttp.send();
			res = xmlhttp.response;
			if (uname == '')
				document.getElementById('user').innerHTML = " ";
			else if (res == 'true')
				document.getElementById('user').innerHTML = "<i class='small text-success'>Username available</i>";
			else if (res == 'false')
				document.getElementById('user').innerHTML = "<i class='small text-danger'>Username unavailable</i>";
			else if (res == 'failure') {
				void(0);
			} else if (res == 'invalid-mail') {
				document.getElementById('invalid-mail').innerHTML = "<i class='small text-danger'>Email Invalid</i>";
				e.preventDefault();
			} else if (res == 'email') {
				document.getElementById('mail-reused').innerHTML = "<div class='alert alert-danger'>Email already registered try logging in</div>";
				e.preventDefault();
			} else if (res == 'success') {
				window.location.replace("index.php");
				e.preventDefault();
			} else {
				window.innerHTML = "Error";
				e.preventDefault();
			}
		}
	</script>
</head>

<body>

	<header class="bg-dark">
		<h2 class="text-center" onclick="scrollup()">
			<span>Any Post
				<i class="fa fa-pencil"></i>
			</span>
		</h2>
		<button class="logout btn btn-info text-white" onclick="{location.href='login.php'}">
			<span class='font-weight-normal d-none d-sm-inline' style="font-family:cursive">LOGIN </span><i class="fa fa-sign-in"></i>
		</button>
	</header>
	<div class="container main w-75">
		<div>
			<form class="w-100 pt-4" autocomplete="off">
				<h3 class="w-50 mx-auto">
					<center>SIGN UP</center>
				</h3>
				<div class="container w-50 form-box">
					<span id="mail-reused"></span>
					<input id="uname" class="form-control mt-4" placeholder="User Name" name="uname" type="text" onkeyup="checkavail(event,'no')" required>
					<span id="user" class="position-absolute"></span>
					<div class="row">
						<div class="col-sm">
							<input id="fname" class="form-control mt-4" placeholder="First Name" name="fname" type="text" required>
						</div>
						<div class="col-sm">
							<input id="lname" class="form-control mt-4" placeholder="Last Name" name="lname" type="text">
						</div>
					</div>
					<input id="email" class="form-control mt-4" placeholder="Email ID" name="email" type="email" required>
					<span id="invalid-mail" class="position-absolute"></span>
					<input id="pwd" class="form-control my-4" placeholder="Password" name="pwd" type="password" required>
					<input type="submit" value="Sign Up" class="btn btn-success" onclick="checkavail(event,'yes')" />
				</div>
				<div>&nbsp;</div>
			</form>
		</div>
	</div>

</body>

</html>