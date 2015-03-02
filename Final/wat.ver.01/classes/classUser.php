<?php 
	/**
	* 
	*/
	class classUser
	{
		public $username;
		public $password;
		public $userID;
		public $userFullname;
		public $userBirthday;
		public $userGender;
		public $userCreatedDate;


		function __construct($ID)
		{
			if($ID==null){
				$this->username = "";
				$this->password = "";
				$this->userID = null;
			}
			else{
				include '../libraries/connect_database.php';
				$sql = "SELECT * FROM users WHERE userid = ".$ID;
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        $this->username = $row['username'];
				        $this->password = $row['password'];
				        $this->userID = $row['userID'];
				        $this->userFullname = $row['userFullname'];
				        $this->userGender = $row['userGender'];
				        $this->userBirthday = $row['userBirthday'];
				        $this->userCreatedDate = $row['userCreatedDate'];
				    }
				}
			}
			
		}


		function save($data){
			$username = $data['username'];
			$password = $data['password'];
			$userFullname = $data['userFullname'];
			$userGender = $data['userGender'];
			$userBirthday = $data['userBirthday'];
			$sql = "INSERT INTO users (username, password, userFullname, userGender, userBirthday) values ("
				."'".$username."',"
				."'".$password."',"
				."'".$userFullname."',"
				."'".$userGender."',"
				."'".$userBirthday."'"
			.")";

			include '../libraries/connect_database.php';
			$result = $conn->query($sql);
		}


		function update($data){
			$username = $data['username'];
			$password = $data['password'];
			$userFullname = $data['userFullname'];
			$userGender = $data['userGender'];
			$userBirthday = $data['userBirthday'];

			if ($this->userID==null) {
				return;
			}
			else{
				$sql = "UPDATE users SET "
					."username = '".$username."',"
					."password = '".$password."',"
					."userFullname = '".$userFullname."',"
					."userGender = '".$userGender."',"
					."userBirthday = '".$userBirthday."'"
					."WHERE userID = ".$this->userID;

				include '../libraries/connect_database.php';
				$result = $conn->query($sql);
			}
		}
	}

 ?>