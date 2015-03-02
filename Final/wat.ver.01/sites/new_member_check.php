<?php 
	require_once '../classes/classUser.php';

	include '../libraries/connect_database.php';

	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM users WHERE username = '".$username."'";
	//echo $sql;
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	if ($result->num_rows > 0){
		header('Location: ../sites/member_new.php?warn');
	}
	else{
		$data = array(
			'username' => $username,
			'password' => $password
		);

		$user = new classUser(null);
		$user->save($data);
		header('Location: ../sites/member.php?success');
	}
?>