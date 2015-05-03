<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="../libraries/jquery-1.11.2.min.js"></script>

<link href="../../libraries/stylesheet.css" rel="stylesheet" type="text/css" />
<link href="../../libraries/bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class = "jumbotron" id ="page">
<?php 
	echo "hi admin";
	echo "<br><a href='../logout.php'>Log out</a>";
	require_once '../../classes/classUser.php';

	include '../../libraries/connect_database.php';

	$username = @$_SESSION['username'];
	$select = "SELECT * FROM users";
	$result = $conn -> query($select);
?>
	<table width="788" class = "table" >
  <tr>
    <td width="120"><?php echo 'userID';?></td>
    <td width="120"><?php echo 'username' ?></td>
    <td width="120"><?php echo 'userFullname' ?></td>
    <td width="120"><?php echo 'userGender' ?></td>
    <td width="120"><?php echo 'userBirthday'?></td>
    <td width="94"><?php echo 'edit';?></td>
    <td width="94"><?php echo 'delete';?></td>
  </tr>
</table>
<?php
	while ($row = $result -> fetch_assoc()){
	
?>

  <table width="788" class = "table">
  <tr>
    <td width="120"><?php echo $row['userID']; $_SESSION['userID'] = $row['userID'];?></td>
    <td width="120"><?php echo $row['username'] ?></td>
    <td width="120"><?php echo $row['userFullname'] ?></td>
    <td width="120"><?php echo $row['userGender'] ?></td>
    <td width="120"><?php echo $row['userBirthday'] ?></td>
    <td width="94"><?php echo "<a href='edit_user.php?userID=".$row['userID']."'> edit</a>";?></td>
    <td width="94"><?php echo "<a href='delete_user.php?userID=".$row['userID']."'>delete</a>";?></td>
  </tr>
</table>

<?php
	}
	?>

</div>
</body>
</html>