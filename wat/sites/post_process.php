<?php 
	require_once '../classes/classUser.php';

    include 'analyze/src/HybridLogic/Classifier.php';
	include '../libraries/connect_database.php';
	include 'analyze/analyze.php';
	
	session_start();
	$post = $_POST['post'];
    $groups = $classifier->classify($post);
	$user_id  = $_SESSION['userID'];
	$username = $_SESSION['username'];
	$sql = "INSERT INTO posts(postContent, userID, postEmotionlevel) Values ('".$post."', '".$user_id."', '".$groups."' )";
	$conn->query($sql);

	
	$select = "SELECT * FROM posts order by postID DESC";
	$result = $conn -> query($select);

	$row = $result -> fetch_assoc();
	$_SESSION['postID'] = $row['postID'];
    
    
    
    
    //var_dump($groups);

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
    <td width="115"><?php echo "<a href='edit_post.php?postID=".$row['postID']."'>edit</a>";?></td>
    <td width="115"><?php echo "<a href='delete_post.php?postID=".$row['postID']."'>delete</a>";?></td>
  </tr>
</table>




</body>
</html>