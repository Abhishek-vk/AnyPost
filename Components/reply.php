<?php
$msgid = $id;
$sql = "SELECT * FROM replies WHERE msgid='$msgid' ORDER BY id DESC";
$replies = $conn->query($sql);
$color = true;
while ($reps = $replies->fetch_assoc()) { ?>
	<div id="<?php echo $reps['id']; ?>" class="rounded container px-sm-4 py-2 mt-4">
		<div style="width: 100%">
			<span onclick="{location.href='user.php?user=<?php echo $reps['user']; ?>'}">
				<span class="fa-stack fa-lg text-center" style="width: 40px; cursor: pointer;">
					<i class="fa fa-circle fa-2x w-100" style="color:<?php echo $color ? '#ff9e9e' : '#b7ffa3'; ?>;"></i>
					<i class="fa fa-user fa-stack-1x" style="color:<?php echo $color ? '#b72525' : '#3ea419'; ?>;"></i>
				</span>
				<span class="userid"><?php echo $reps['user']; ?></span>
			</span>
		</div>
		<div class="col-md-12 px-0 px-sm-3">

			<div class="text-break message-box px-2 px-sm-4 pt-1 pb-2 mx-sm-4">
				<textarea class='disp-reply' rows="1" disabled><?php echo strval($reps['reply']); ?></textarea>
			</div>
			<?php if ($reps['user'] == $_SESSION['user']) { ?>
				<span style="cursor: pointer;" class="float-right text-white small mx-sm-4" onclick="replydown(<?php echo $reps['id'] . ',' . $msgid; ?>)">Delete Comment</span>
			<?php } ?>
		</div>
	</div>
<?php $color = !$color;
}
?>