<?php 
	require_once '../classes/classUser.php';

	include '../libraries/connect_database.php';
	
	if(isset($_GET['action']))
		$action = $_GET['action'];
	else
		$action = "";

	if(isset($_GET['postID']))
		$id = $_GET['postID'];
	else 
		$id = 0;
	
	session_start();
	$post = $_POST['post'];
	$user_id  = $_SESSION['userID'];
	$username = $_SESSION['username'];
	$sql = "INSERT INTO posts(postContent, userID) Values ('".$post."', '".$user_id."')";
	$conn->query($sql);
	$select = "SELECT * FROM posts order by postID DESC";
	$result = $conn -> query($select);

	$row = $result -> fetch_assoc()
?>
<html>
<body>

<table width="788" class="table">
  <tr>
    <td><?php echo $username?></td>
  </tr>
  <tr>
    <td><?php echo $post ?></td>
  </tr>
</table>
<table width="345" class="table">
  <tr>
    <td width="115">date: <?php  echo $row['postCreatedDate'] ?></td>
    <td width="115">edit</td>
    <td width="115">delete</td>
  </tr>
</table>




</body>
</html>