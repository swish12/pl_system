<?php 

	include 'class/core_class.php';

	$categObj = new myClass();

	if(isset($_POST['submit'])){

		$categObj->insertCateg($_POST);
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add Category</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>
	<div class="container">
		<form action="category.php" method="POST">
			<div class="form-group">
		      <label for="name">Name:</label>
		      <input type="text" class="form-control" name="name" placeholder="Enter name" required="">
		    </div>
		    <div class="form-group">
		      <label for="name">Description:</label>
		      <input type="text" class="form-control" name="description" placeholder="Enter description" required="">
		    </div>
		    <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Submit">
		</form>	
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>