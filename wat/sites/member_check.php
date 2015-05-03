<?php 
	require_once '../classes/classUser.php';

	include '../libraries/connect_database.php';

	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql = "SELECT * FROM users WHERE username = '".$username."'";
	//echo $sql;
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	if ($result->num_rows > 0 && $password == $row['password']){
		session_start();
		$_SESSION['userID'] = $row['userID'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['password'] = $row['password'];
        if($_SESSION['userID'] == 1 && $password =='123456'){
            header('Location: admin/admin.php');
        }
        else 
            header('Location: welcome.php');
	}
	else{
		header('Location: ../sites/member.php?warn');
	}
 ?>