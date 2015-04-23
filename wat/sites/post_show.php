<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php 
	require_once '../classes/classUser.php';

	include '../libraries/connect_database.php';

	$username = $_SESSION['username'];
	$select = "SELECT * FROM posts order by postID DESC";
	$result = $conn -> query($select);

	while ($row = $result -> fetch_assoc()){	
?>

<table width="788" class="table">
  <tr>
    <td><?php echo $username?></td>
  </tr>
  <tr>
    <td><?php echo $row['postContent'] ?></td>
  </tr>
</table>
<table width="345" class="table">
  <tr>
    <td width="115">date: <?php echo $row['postCreatedDate']?></td>
    <td width="115"><?php echo "<br><a href='edit_post.php'>edit</a>";?></td>
    <td width="115">delete</td>
  </tr>
</table>
<?php
	}
	?>


</body>
</html>