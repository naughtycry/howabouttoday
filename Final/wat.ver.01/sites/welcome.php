<?php 
	session_start();
	// echo $_SESSION['userID'];

	require_once '../classes/classUser.php';
	$user = new classUser($_SESSION['userID']);

	echo $user->userFullname
	. " " .$user->userBirthday
	. " " .$user->userGender
	. " " .$user->userCreatedDate
	;

	$data = array(
		'username' => $_SESSION['username'],
		'password' => $_SESSION['password'],
		'userFullname' => 'Johny Walker',
		'userGender' => 'male',
		'userBirthday' => '1994-03-29'
	);

	$user->update($data);
 ?>