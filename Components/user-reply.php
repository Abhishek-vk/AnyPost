<?php

$sql = "SELECT * FROM replies WHERE user='$user' ORDER BY id DESC";
$result = $conn->query($sql); ?>
<div class="message row container bg-dark p-4 mt-4 ml-0">
	<div class="w-100">
		<span onclick="{location.href='user.php?user=<?php echo $user; ?>'}">
			<span class="fa-stack fa-lg text-center" style="width: 40px; cursor: pointer;">
				<i class="fa fa-circle fa-2x w-100" style="color: #a694ff;"></i>
				<i class="fa fa-user fa-stack-1x" style="color: #5945bd;"></i>
			</span>
			<span class="userid"><?php echo $user; ?></span>
		</span>
	</div>
	<?php
	if ($result->num_rows == 0) { ?>
		<div class="container noreply">No Comments yet...</div>
	<?php }
	while ($row = $result->fetch_assoc()) {
		$id = $row['id']; ?>
		<div class="col-md-12">
			<span style="cursor: pointer; text-shadow: 0 0 2px #000548; font-weight: bold;" class="float-right text-info my-3 mr-sm-4 mr-md-0 mr-lg-4" onclick="{location.href='backend/sendtoreply.php?msgid=<?php echo $row['msgid'] . "&id=" . $id ?>'}">
				view
			</span>
			<div class="wrap-box message-box px-4 pt-1 pb-2 mx-sm-4 my-3 w-75">
				<?php echo $row['reply']; ?>
			</div>
		</div>
	<?php } ?>
</div>