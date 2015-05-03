<?php 
	require_once '../../classes/classUser.php';

	include '../../libraries/connect_database.php';
	
	
	session_start();
  
	
	$username = $_SESSION['username'];
	
	$userID = $_GET['userID'];
	$delete_post = "DELETE FROM posts where userID = '".$userID."'";
	$result = $conn -> query($delete_post);
	$delete = "DELETE FROM `users` where userID = '".$userID."'";
	//echo $delete;
	$result = $conn -> query($delete);
	//echo "thành công"

?>
<?php
	header('location: user.php');
?>