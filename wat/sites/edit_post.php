<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>edit post</title>
<link href="../libraries/stylesheet.css" rel="stylesheet" type="text/css" />
<link href="../libraries/bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php 
	require_once '../classes/classUser.php';
	require_once '../classes/classPost.php';

	include '../libraries/connect_database.php';
	
	if(isset($_GET['action']))
		$action = $_GET['action'];
	else
		$action = "";

	if(isset($_GET['postID']))
		$id = $_GET['postID'];
	else 
		$id = 0;
	echo $id;
	
	session_start();
	
	$username = $_SESSION['username'];

	$select = "SELECT * FROM posts where postID = '".$id."'";
	$result = $conn -> query($select);

	$row = $result -> fetch_assoc()
?>

<div id = "mainpage">
<form action="edit_post_process.php" method="post" id="form_post">
<input type="text" name="post" id="post"  class="form-control" value="<?php echo $row['postContent'] ?>"/> <br />
<button type="button" id="btn_submit"  class="btn btn-default">Save</button>
</form>

</div>
</body>
</html>