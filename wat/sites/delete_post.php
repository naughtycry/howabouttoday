<?php 
	require_once '../classes/classUser.php';

	include '../libraries/connect_database.php';
	
	
	session_start();
  
	
	$username = $_SESSION['username'];
	
	$postID = $_GET['postID'];
	$delete = "DELETE FROM posts where postID = '".$postID."'";
	
	$result = $conn -> query($delete);
	echo "thành công"

?>
<?php
	header('location: welcome.php');
?>