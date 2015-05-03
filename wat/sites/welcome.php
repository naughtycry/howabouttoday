<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Emotiondiary</title>
<script src="../libraries/jquery-1.11.2.min.js"></script>

<link href="../libraries/stylesheet.css" rel="stylesheet" type="text/css" />
<link href="../libraries/bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class = "jumbotron" id ="page">
<?php 
	session_start();
	// echo $_SESSION['userID'];

	require_once '../classes/classUser.php';
	
	
	if ( !@$_SESSION['userID'] )
	{ 
		echo "You aren't Login! Click here to  <a href='member.php'>login </a> or <a href='member_new.php'>Register</a>"; 
	}
	else
	{
		
		$user = new classUser($_SESSION['userID']);
	?>
<div class = "welcome">
    <?php 
		echo "Hi ".$user->username;
	
		$data = array(
			'username' => $_SESSION['username'],
			'password' => $_SESSION['password'],
			'userFullname' => 'Johny Walker',
			'userGender' => 'male',
			'userBirthday' => '1994-03-29'
		);
	
		$user->update($data);
		
		echo "<br><a href='logout.php'>Log out</a>";
		?>
</div>
        <?php 
		
		include'post.php';
	}
 ?>
 </div>
 </body>
 </html>

