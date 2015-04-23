<?php 
	require_once '../classes/classUser.php';
	require_once '../classes/classPost.php';

	include '../libraries/connect_database.php';
	
	if(isset($_GET['postID']))
		$id = $_GET['postID'];
	else 
		$id = 0;
		
	session_start();
	$post = $_POST['post'];
	$user_id  = $_SESSION['userID'];
	$username = $_SESSION['username'];
	$sql = "INSERT INTO posts(postContent, userID) Values ('".$post."', '".$user_id."')";
	$sql ="update sinhvien set postContent='$post' where id = $id";

	$conn->query($sql);
	header('location: welcome.php');

?>