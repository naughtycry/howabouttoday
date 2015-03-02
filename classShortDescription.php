<?php
	class classShortDescription
	{
		public $shortDescriptionID;
		public $shortDescriptionTitle;
		public $shortDescriptionContent;
		public $shortDescriptionEmotionLevel;
		public $userID;
		public $shortDescriptionCreatedDate;
		
		function __construct($ID)
		{
			if($ID == null)
			{
				$this -> shortDescriptionTitle = "";
				$this -> shortDescriptionContent = "";
				$this -> shortDescriptionEmotionLevel = null;
				$this -> shortDescriptionID = null;
			}
			else{
				include '.../libraries/connect_database.php';
				$sql = "SELECT * FROM shortdescription WHERE shortDescriptionID = ".$ID;
				$result = $conn -> query($sql);
				
				if ($result -> num_rows > 0 )
				{
					while ($row = $result -> fetch_assoc()){
						$this -> shortDescriptionTitle = $row['shortDescriptionTitle'];
						$this -> shortDescriptionContent = $row['shortDescriptionContent'];
						$this -> shortDescriptionEmotionLevel = $row['shortDescriptionEmotionLevel'];
						$this -> shortDescriptionID = $row['shortDescriptionID'];
						$this -> userID = $row['userID'];
						$this -> shortDescriptionCreatedDate = $row['shortDescriptionCreatedDate'];
					}
				}
			}
		}
		
		function save($data)
		{
			$shortDescriptionTitle = $data['shortDescriptionTitle'];
			$shortDescriptionContent = $data['shortDescriptionContent'];
			$shortDescriptionEmotionLevel = $data['shortDescriptionEmotionLevel'];
			$sql = "INSERT INTO shortdescription (shortDescriptionTitle, shortDescriptionContent, shortDescriptionEmotionLevel) values ("
				."'".$shortDescriptionTitle."',"
				."'".$shortDescriptionContent."',"
				."'".$shortDescriptionEmotionLevel."'"
				.")";
			include '.../libraries/connect_database.php';
			$resul = $conn -> query($sql);
		}
		
		function update($data)
		{
			$shortDescriptionTitle = $data['shortDescriptionTitle'];
			$shortDescriptionContent = $data['shortDescriptionContent'];
			$shortDescriptionEmotionLevel = $data['shortDescriptionEmotionLevel'];
			
			if ( $this -> shortDescriptionID = null){
				return;
			}
			
			else {
				$sql = "UPDATE shortdescription SET"
					."shortDescriptionTitle = '".$shortDescriptionTitle."',"
					."shortDescriptionContent = '".$shortDescriptionContent."',"
					."shortDescriptionEmotionLevel = '".$shortDescriptionEmotionLevel."'"
					."WHERE shortDescriptionID = ".$this->shortDescriptionID;
					
				include '../libraries/connect_database.php';
				$result = $conn->query($sql);
			}
		}
		
		function delete($data)
		{
			$shortDescriptionID = $data['shortDescriptionID'];
			
			if ( $this -> shortDescriptionID = null){
				return;
			}
			
			else {
				$sql = "DELETE FROM shortdescription WHERE shortDescriptionID = ".$this -> shortDescriptionID;
				include '../libraries/connect_database.php';
				$result = $conn->query($sql);
			}
		}
	}
?>