<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include 'Components/sql_connect.php';
$user = $_GET['user'];
$sql = "SELECT * FROM users WHERE uname='$user'";
$res = ($conn->query($sql))->fetch_assoc();
$where = $user;
?>
<!DOCTYPE html>
<html>

<head>
	<title>Any Post-<?php echo $res['fname']; ?></title>
	<?php include 'Components/head.php'; ?>
	<script type="text/javascript">
		window.addEventListener("paste", function(e) {
			e.preventDefault();
			var text = e.clipboardData.getData("text");
			document.execCommand("insertHTML", false, text);
		});

		window.onload = function() {
			resizeReplyBoxes(document, 'disp-post');
			resizeReplyBoxes(document);
			reply = document.getElementsByClassName('reply');
			for (i = 0; i < reply.length; i++) {
				reply[i].classList.add('collapse');
			}
		}

		window.onresize = function() {
			reply = document.getElementsByClassName('reply');
			for (i = 0; i < reply.length; i++) {
				reply[i].classList.remove('collapse');
			}
			resizeReplyBoxes(document, 'disp-post');
			resizeReplyBoxes(document);
			for (i = 0; i < reply.length; i++) {
				reply[i].classList.add('collapse');
			}
		}

		function togglePost(element) {
			if (element.classList.contains('active'))
				return;
			postcol = document.getElementById('post-col');
			commcol = document.getElementById('comm-col');
			postcol.classList.toggle('active');
			postcol.classList.toggle('btn-glow');
			commcol.classList.toggle('active');
			commcol.classList.toggle('btn-glow');
			var PostCom = document.getElementById('post-comm');
			if (element.id == 'post-col') {
				PostCom.innerHTML = `<?php include "Components/posts.php"; ?>`;
				resizeReplyBoxes(document, 'disp-post');
				resizeReplyBoxes(document);
				reply = document.getElementsByClassName('reply');
				for (i = 0; i < reply.length; i++) {
					reply[i].classList.add('collapse');
				}
			} else
				PostCom.innerHTML = `<?php include "Components/user-reply.php" ?>`;


		}

		function logout() {
			location.href = 'backend/logout.php';
		}

		function addreply(msgid) {
			reply = document.getElementById('reply-box' + msgid).innerText.trim();
			if (reply == '') {
				console.log('empty');
				return;
			}
			data = 'msgid=' + msgid + '&reply=' + reply;
			xmlhttp = new XMLHttpRequest();
			xmlhttp.open('POST', 'backend/upreply.php', false);
			xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xmlhttp.send(data);
			document.getElementById("reply-comp" + msgid).innerHTML = xmlhttp.response;
			document.getElementById("reply-box" + msgid).innerHTML = "";
		}
	</script>
</head>

<body>
	<header class="bg-dark">
		<button class="home btn btn-info" onclick="{location.href='index.php'}"><i class="fa fa-home"></i></button>
		<h2 class="text-center" onclick="scrollup()">
			<span>Any Post
				<i class="fa fa-pencil"></i>
			</span>
		</h2>
		<div class="btn-group setting-btn">
			<button type="button" class="btn btn-danger rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fa fa-cog"></i>
			</button>
			<div class="dropdown-menu">
				<a class="dropdown-item text-info" href="user.php?user=<?php echo $_SESSION['user']; ?>"><i class="fa fa-eye"></i> View Profile</a>
				<a class="dropdown-item text-info" href="edituser.php"><i class="fa fa-edit"></i> Edit Profile</a>
				<div class='dropdown-divider'></div>
				<a class="dropdown-item text-danger" href="backend/logout.php"><i class="fa fa-sign-out"></i> Sign Out</a>
			</div>
		</div>
	</header>

	<div class="main container mt-5 pt-5">
		<div class="row mx-0">
			<div class="message bg-dark p-4 col-md-6 mx-auto">
				<span class="mx-auto w-75">
					<div>
						<span class="fa-stack fa-lg text-center" style="width: 100px; height:84px; cursor: pointer;">
							<i class="fa fa-circle fa-4x w-100 h-100" style="color: #a694ff;"></i>
							<i class="fa fa-user fa-stack-2x" style="color: #5945bd; margin-top:18px;"></i>
						</span>
						<span class="userdetails">
							<?php
							$hr = "<hr class='m-1' style='background: #1f2326; padding-top:1px;'>";
							echo $hr;
							echo "&nbsp;&nbsp;&nbsp;&nbsp;" . $res['uname'];
							echo $hr;
							echo "&nbsp;&nbsp;&nbsp;&nbsp;" . $res['fname'] . " " . $res['lname'];
							echo $hr;
							echo "&nbsp;&nbsp;&nbsp;&nbsp;" . $res['email'];
							echo $hr;
							?>
						</span>
					</div>
				</span>
			</div>
		</div>
		<div class="row mx-0">
			<div class="message col-md-6 px-0 mx-auto my-4 bg-dark">
				<button id="post-col" class="btn btn-dark active btn-glow" onclick="togglePost(this)">Posts</button>
				<button id="comm-col" class="btn btn-dark" onclick="togglePost(this)">Comments</button>
			</div>
		</div>
		<div class="row">
			<div id="post-comm" class="col-md-6 mx-auto message" style="box-shadow: none;">
				<?php include 'Components/posts.php'; ?>
			</div>
		</div>
		<div class="message row bg-dark p-4 mt-4">
			<div style="width: 100%">
				<span class="fa-stack fa-lg text-center" style="width: 40px; cursor: pointer;">
					<i class="fa fa-circle fa-2x w-100 logobg"></i>
					<i class="fa fa-pencil fa-stack-1x" style="color: #004084;"></i>
				</span>
				<span class="userid">AnyPost</span>
			</div>
			<div class="col-md-12">
				<div class="message-box px-sm-4 pt-1 pb-1 mx-sm-3 mt-2">
					<p>
						<center>All the posts end here. Thank you!!!</center>
					</p>
				</div>
			</div>
		</div>
	</div>
</body>

</html>