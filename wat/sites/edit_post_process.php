<?php 
	require_once '../classes/classUser.php';

	include '../libraries/connect_database.php';
	

		
	session_start();
	$post = $_POST['post'];
	$ID = $_POST['postID'];
	
	
	
	
	$sql ="update posts set postContent='".$post."' where postID ='".$ID."'";

	$conn->query($sql);
    echo "thành công";

?>
<html>
<head>
<link href="../libraries/stylesheet.css" rel="stylesheet" type="text/css" />
<script src="../libraries/jquery-1.11.2.min.js"></script>
<link href="../libraries/bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<head>
<body>
<a href = "welcome.php"> quay lại trang chủ </a>
</body>
</html>
