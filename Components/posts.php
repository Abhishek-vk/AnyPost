<?php
if (isset($where)) {
	$sql = "SELECT * FROM `message` WHERE user='$where' ORDER BY id DESC";
	$profile = true;
} else {
	$sql = 'SELECT * FROM `message` ORDER BY id DESC';
	$profile = false;
}
$result = $conn->query($sql);
if ($result->num_rows == 0) { ?>
	<div class="container noreply">No post yet...</div>
<?php }
$flag = false;
while ($row = $result->fetch_assoc()) {
	$id = $row['id']; ?>
	<div id="msg<?php echo $id; ?>" class="message row container bg-dark p-4 mt-4 <?php if ($flag && !$profile) echo "ml-3";
																					if ($profile) echo ' ml-0'; ?>">
		<div style="width: 100%">
			<span onclick="{location.href='user.php?user=<?php echo $row['user']; ?>'}">
				<span class="fa-stack fa-lg text-center" style="width: 40px; cursor: pointer;">
					<i class="fa fa-circle fa-2x w-100" style="color: #a694ff;"></i>
					<i class="fa fa-user fa-stack-1x" style="color: #5945bd;"></i>
				</span>
				<span class="userid"><?php echo $row['user']; ?></span>
			</span>
			<span class="post-time">
				<?php echo date('d/m/Y H:i', strtotime($row['time']));
				if ($_SESSION['user'] == $row['user']) { ?>
					<san class="ml-3 font-weight-bold" data-toggle="modal" data-target="#Modal" style="cursor:pointer; padding:0 5px 2px; border:2px solid grey; border-radius:100%;">
						&#10008
			</span>
		<?php } ?>
		</span>
		</div>
		<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content text-dark">
					<div class="modal-header">
						<h5 class="modal-title">Confirmation</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Are you sure you want to delete the post?
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-success" onclick="{location.href='backend/postdown.php?msgid=<?php echo $id; ?>'}">
							Yes
						</button>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12 px-0 px-sm-3">
			<div class="message-box px-2 px-sm-4 pt-2 pb-1 mx-sm-3 mt-2">
				<textarea class="disp-post mt-0" rows="1" disabled><?php echo $row['message']; ?></textarea>
			</div>
		</div>
		<a href="#replies<?php echo $id; ?>" class="mt-3 ml-sm-4 reply-text" data-toggle="collapse">Reply &#10149</a>
	</div>
	<div id="replies<?php echo $id; ?>" class="px-sm-4 px-2 py-4 row container reply 
	<?php echo ($flag) ? 'ml-4' : 'ml-2';
	$flag = !$flag; ?>">
		<div class="col-md-12" style="display: contents;">
			<textarea id="reply-box<?php echo $id; ?>" placeholder="Reply..." class=" textarea w-75 py-2 px-3 text-break" rows="1" oninput="autoResize(this)"></textarea>
			<input type="button" onclick="addreply(<?php echo $id; ?>)" class="btn btn-primary ml-sm-3" value="Send" style="height:max-content; border-radius: 30px;">
			<div id="reply-comp<?php echo $id; ?>" class='w-100'>
				<?php
				include 'reply.php';
				?>
			</div>
		</div>
	</div>
<?php }
?>