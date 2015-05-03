<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>edit post</title>
<link href="../../libraries/stylesheet.css" rel="stylesheet" type="text/css" />
<script src="../../libraries/jquery-1.11.2.min.js"></script>
<link href="../../libraries/bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php 
	require_once '../../classes/classUser.php';

	include '../../libraries/connect_database.php';
	
	
	session_start();
  
	
	$username = $_SESSION['username'];
	
	$userID = $_GET['userID'];
	$select = "SELECT * FROM users where userID = '".$userID."'";
	
	$result = $conn -> query($select);

	$row = $result -> fetch_assoc()
?>

<div id = "mainpage">
<form action="javascript:void(0);" method="post" id="form_post">
<input type="text" name="username" id="post"  class="form-control" value="<?php echo $row['username'] ?>"/> <br />
<input type="text" name="userFullname" id="post"  class="form-control" value="<?php echo $row['userFullname'] ?>"/> <br />
<input type="text" name="userGender" id="post"  class="form-control" value="<?php echo $row['userGender'] ?>"/> <br />
<input type="text" name="userBirthday" id="post"  class="form-control" value="<?php echo $row['userBirthday'] ?>"/> <br />
<input type="hidden" name="userID" value="<?php echo $_GET['userID']?>"  />
<button type="submit" id="btn_submit"  class="btn btn-default">Save</button>
</form>

</div>
<div id="post_display"></div>
</body>
</html>

<script type="text/javascript">
	$('document').ready(function() {
        $('#btn_submit').click(function(){
		console.log('t');
			var form = $('#form_post');
			var data = form.serialize();
    		$.ajax(
				{url: "edit_user_process.php", 
				data: data,
				type:"POST",
				success: function(result){
        		$("#post_display").html(result);
    		}});
			return false;
		});
    });
	
</script>
