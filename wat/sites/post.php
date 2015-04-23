
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="../libraries/jquery-1.11.2.min.js"></script>

<link href="../libraries/stylesheet.css" rel="stylesheet" type="text/css" />
<link href="../libraries/bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php 
require_once '../classes/classUser.php';
require_once '../classes/classPost.php';
?>

<div id ="mainpage" dir="ltr">
<form action="post_process.php" method="post" id="form_post">
<input type="text" name="post" id="post"  class="form-control"/> <br />
<button type="button" id="btn_submit"  class="btn btn-default">Save</button>
</form>
<div class="table-responsive">
<p id="post_display">
<?php include'post_show.php';
?>
</p>
</div>

</div>
</body>
</html>

<script type="text/javascript">
	$('document').ready(function() {
        $("#btn_submit").click(function(){
			var form = $('#form_post');
			var data = form.serialize();
    		$.ajax(
				{url: "post_process.php", 
				data: data,
				type:"POST",
				success: function(result){
        		$("#post_display").prepend(result);
    		}});
		});
    });

</script>