<?php
session_start();
if (!isset($_SESSION['user'])) {
	header('location: signup.php');
}
include 'Components/sql_connect.php';
?>
<!DOCTYPE html>
<html>

<head>
	<title>Any Post</title>
	<?php include 'Components/head.php'; ?>
	<script type="text/javascript">
		window.addEventListener("paste", function(e) {
			e.preventDefault();
			var text = e.clipboardData.getData("text");
			document.execCommand("insertHTML", false, text);
		});

		window.onload = function() {
			<?php
			if (isset($_SESSION['gotomsg'])) {
				$gotomsg = $_SESSION['gotomsg'];
				$gotorep = $_SESSION['gotorep'];
				unset($_SESSION['gotomsg']);
				unset($_SESSION['gotorep']); ?>
				gotomsg = document.getElementById('replies<?php echo $gotomsg; ?>');
				gotomsg.classList.add('show');
				gotorep = document.getElementById('<?php echo $gotorep; ?>');
				gotorep.style.background = '#3b308a';
				gotorep.style.transition = 'all 500ms';
				gotorep.scrollIntoView({
					behavior: 'auto',
					block: 'center',
					inline: 'start'
				});
				setTimeout(function() {
					gotorep.style.background = 'transparent';
				}, 3000);
			<?php } ?>
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

		function logout() {
			location.href = 'backend/logout.php';
		}

		function enableBtn() {
			if (document.getElementsByTagName('textarea')[0].value.trim() == '')
				document.getElementsByClassName('post')[0].disabled = true;
			else
				document.getElementsByClassName('post')[0].disabled = false;
		}

		function addreply(msgid) {
			replyBox = document.getElementById('reply-box' + msgid);
			reply = replyBox.value.trim();
			reply = reply.replace(/(\r\n|\r|\n){2,}/g, '\n');
			replyBox.value = '';
			autoResize(replyBox);
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
			resizeReplyBoxes(document.getElementById("reply-comp" + msgid));
		}

		function replydown(id, msgid) {
			xmlhttp = new XMLHttpRequest();
			xmlhttp.open('GET', 'backend/replydown.php?id=' + id + '&msgid=' + msgid, false);
			xmlhttp.send();
			document.getElementById("reply-comp" + msgid).innerHTML = xmlhttp.response;
			resizeReplyBoxes(document.getElementById("reply-comp" + msgid));

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
		<form style="width: 100%;" method="POST" action="backend/uppost.php">
			<div class="message bg-dark p-4 row">
				<div class="col-md-9">
					<textarea name="message" class="form-control textarea" rows="4" placeholder="Write something to post..." onkeyup="enableBtn()"></textarea>
				</div>
				<div class="col-md-3">
					<div id="post-box" style="width: min-content;">
						<span class="fa-stack fa-lg text-center my-3" style="width: 40px; cursor: pointer;" onclick="{location.href='user.php?user=<?php echo $_SESSION['user']; ?>'}">
							<i class="fa fa-circle fa-2x w-100" style="color: lightgrey;"></i>
							<i class="fa fa-user fa-stack-1x" style="color: grey;"></i>
						</span>
						<input type="submit" class="btn btn-success px-4 post" value="Post" disabled>
					</div>
				</div>
			</div>
		</form>
		<?php include 'Components/posts.php'; ?>
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