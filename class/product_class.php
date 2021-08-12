<?php 

	class productClass
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

		public function GETCURRENTDATE(){
			ini_set('date.timezone','UTC');
			date_default_timezone_set('UTC');
			$today = date('H:i:s');
			$date = date('Y-m-d H:i:s', strtotime($today)+28800);
			
			return $date;
		}

		public function selectOption()
		{

			$option = "<option value=''>---Please Choose---</option>";
			$query = "SELECT * FROM tbl_category";
			$sql = $this->conn->query($query);
			if($sql){
				foreach($sql as $row){
					$option .= "<option value='".$row['id']."'>".$row['name']."</option>";
				}
			}

			return $option;
		}

		public function insertProduct($post)
	 	{
	 		$product = $this->conn->real_escape_string($_POST['product']);
	 		$price = $this->conn->real_escape_string($_POST['price']);
	 		$category_id = $this->conn->real_escape_string($_POST['categ_id']);
	 		$date = $this->GETCURRENTDATE();


	 		$query = "INSERT INTO `tbl_product`(`category_id`, `name`, `price`, `date_added`) VALUES ('$category_id', '$product','$price', '$date')";
	 		$sql = $this->conn->query($query);

	 		if($sql == true){
	 			header("Location:index.php");
	 		}else{
	 			echo "Failed Product !". $product." - ".$price." - ".$category_id;

	 		}
	 	}

	 	public function displayProduct()
	 	{
	 		$query = "SELECT * FROM tbl_product";
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

	 	public function categoryName($id)
	 	{
	 		$query = "SELECT name FROM tbl_category WHERE id='$id'";
	 		$sql = $this->conn->query($query);
			 	
	 		$result = mysqli_fetch_array($sql);

	 		if($result){
	 			return $result['name'];
	 		}else{
	 			echo "No Data!";
	 		}
	 		
	 	}

	 	public function DisplayProdById($id)
	 	{
	 		$query = "SELECT * FROM tbl_product WHERE prod_id='$id'";
	 		$result = $this->conn->query($query);

	 		if($result->num_rows > 0){
	 			$data = array();

		 			$row = $result->fetch_assoc();
					return $row;
	 			
	 		}else{
	 			echo "No Data Found !";
	 		}
	 	}

	 	public function UpdateProd($postData)
	 	{
	 		$categ_id = $this->conn->real_escape_string($_POST['up_categ_id']);
	 		$product = $this->conn->real_escape_string($_POST['up_product']);
	 		$price = $this->conn->real_escape_string($_POST['up_price']);
	 		$id = $this->conn->real_escape_string($_POST['up_prodId']);

	 		if(!empty($id) && !empty($postData)){
	 			$query = "UPDATE tbl_product SET category_id='$categ_id', name='$product', price='$price' WHERE prod_id='$id'";
	 			$sql = $this->conn->query($query);
	 			if($sql == true){
	 				header("Location:index.php");
	 			}else{
	 				echo "Failed Update !";
	 			}
	 		}
	 		
	 	}

	 	public function deleteProdData($id)
	 	{
	 		$query = "DELETE FROM tbl_product WHERE prod_id='$id'";
	 		$sql  = $this->conn->query($query);
	 		if($sql == true){
	 			header("Location:index.php");
	 		}else{
	 			echo "Failed to Delete !";
	 		}
	 	}
	}

?>