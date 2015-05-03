<?php 
	require_once '../../classes/classUser.php';

	include '../../libraries/connect_database.php';
	

		
	session_start();
	$username = $_POST['username'];
	$userFullname = $_POST['userFullname'];
	$userGender = $_POST['userGender'];
	$userBirthday = $_POST['userBirthday'];
	$ID = $_POST['userID'];
	
	
	
	
	$sql ="update users set username='".$username."', userFullname='".$userFullname."', userGender='".$userGender."', userBirthday='".$userBirthday."' where userID ='".$ID."'";
	echo $sql;

	$conn->query($sql);
    echo "thành công";

?>
<html>
<head>
<link href="../../libraries/stylesheet.css" rel="stylesheet" type="text/css" />
<script src="../../libraries/jquery-1.11.2.min.js"></script>
<link href="../../libraries/bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<head>
<body>
<a href = "user.php"> quay lại trang chủ </a>
</body>
</html>
