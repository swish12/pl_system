<?php 
	
	class myClass
	{
		private $username = "root";
		private $password = "";
		private $hostname = "localhost";
		public  $db = "pl_system";


		public 	function __construct()
		{
			$this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->db);

			if(mysqli_connect_error()){
				trigger_error("Failed to Connect Mysql:" . mysqli_connect_error());
			} else {
				echo "";
			}

		}

	 	public function insertCateg($post)
	 	{
	 		$name = $this->conn->real_escape_string($_POST['name']);
	 		$desc = $this->conn->real_escape_string($_POST['description']);

	 		$query = "INSERT INTO tbl_category(name, description) VALUES ('$name', '$desc')";
	 		$sql = $this->conn->query($query);

	 		if($sql == true){
	 			header("Location:viewCategory.php");
	 		}else{
	 			echo "Failed Category !";
	 		}
	 	}

	 	public function displayData()
	 	{
	 		$query = "SELECT * FROM tbl_category";
	 		$result = $this->conn->query($query);

	 		if($result->num_rows > 0){
	 			$data = array();

	 			while ($row = $result->fetch_assoc()){
	 				$data[] = $row;
	 			}

	 				return $data;
	 		}else{
	 			echo "No Data Found !";
	 		}

	 	}

	 	public function DisplayById($id)
	 	{
	 		$query = "SELECT * FROM tbl_category WHERE id='$id'";
	 		$result = $this->conn->query($query);

	 			if($result->num_rows > 0){
	 			$data = array();

		 			$row = $result->fetch_assoc();
					return $row;
	 			
		 		}else{
		 			echo "No Data Found !";
		 		}

	 		
	 		
	 	}

	 	public function UpdateRecord($postData)
	 	{
	 		$name = $this->conn->real_escape_string($_POST['up_name']);
	 		$desc = $this->conn->real_escape_string($_POST['up_description']);
	 		$id = $this->conn->real_escape_string($_POST['up_id']);

	 		if(!empty($id) && !empty($postData)){
	 			$query = "UPDATE tbl_category SET name='$name', description='$desc' WHERE id='$id'";
	 			$sql = $this->conn->query($query);
	 			if($sql == true){
	 				header("Location:viewCategory.php");
	 			}else{
	 				echo "Failed Update !";
	 			}
	 		}
	 		
	 	}

	 	public function deleteData($id)
	 	{
	 		$query = "DELETE FROM tbl_category WHERE id='$id'";
	 		$sql  = $this->conn->query($query);
	 		if($sql == true){
	 			header("Location:viewCategory.php");
	 		}else{
	 			echo "Failed to Delete !";
	 		}
	 	}
	}
?>