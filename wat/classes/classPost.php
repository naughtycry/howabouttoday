<?php
	class classPost
	{
		public $postID;
		public $postTile;
		public $postContent;
		public $postEmotionLevel;
		public $userID;
		public $postCreatedDate;
		
		function __construct($ID)
		{
			if($ID == null)
			{
				$this -> postTile = "";
				$this -> postContent = "";
				$this -> postEmotionLevel = null;
				$this -> postID = null;
			}
			else{
				include '.../libraries/connect_database.php';
				$select = "SELECT * FROM posts";
				$result = $conn -> query($elect);
				
				if ($result -> num_rows > 0 )
				{
					while ($row = $result -> fetch_assoc()){
						$this -> postTile = $row['postTile'];
						$this -> postContent = $row['postContent'];
						$this -> postEmotionLevel = $row['postEmotionLevel'];
						$this -> postID = $row['postID'];
						$this -> userID = $row['userID'];
						$this -> postCreatedDate = $row['postCreatedDate'];
					}
				}
			}
		}
		
		function save($data)
		{
			$postTile = $data['postTile'];
			$postContent = $data['postContent'];
			$postEmotionLever = $data['postEmotionLevel'];
			$sql = "INSERT INTO posts (postTile, postcontent, postEmotionLevel, postCreatedDate) values ("
				."'".$postTile."',"
				."'".$postContent."',"
				."'".$postEmotionLevel."'"
                ."'".now()."',"
				.")";
			include '.../libraries/connect_database.php';
			$resul = $conn -> query($sql);
		}
		
		function update($data)
		{
			$postTile = $data['postTile'];
			$postContent = $data['postContent'];
			$postEmotionLevel = $data['postEmotionLevel'];
			
			if ( $this -> postID = null){
				return;
			}
			
			else {
				$sql = "UPDATE posts SET"
					."postTile = '".$postTile."',"
					."postContent = '".$postContent."',"
					."postEmotionLevel = '".$postEmotionLevel."'"
					."WHERE postID = ".$this->postID;
					
				include '../libraries/connect_database.php';
				$result = $conn->query($sql);
			}
		}
		
		function delete($data)
		{
			$postID = $data['postID'];
			
			if ( $this -> postID = null){
				return;
			}
			
			else {
				$sql = "DELETE FROM posts WHERE postID = ".$this -> postID;
				include '../libraries/connect_database.php';
				$result = $conn->query($sql);
			}
		}
	}
?>