<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="img/logo.png">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Delius+Unicase:wght@700&family=Vollkorn:ital,wght@1,400;1,800&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/style.css?version=1">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
	function scrollup() {
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
	}

	function autoResize(e) {
		e.style.height = 'auto';
		e.style.height = e.scrollHeight + 'px';
	}

	function resizeReplyBoxes(parent, className = 'disp-reply') {
		disp_reply = parent.getElementsByClassName(className);
		for (i = 0; i < disp_reply.length; i++) {
			disp_reply[i].style.height = 'auto';
			autoResize(disp_reply[i]);
		}
	}
</script>