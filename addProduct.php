<?php 
	include 'class/product_class.php';

	$productObj = new productClass();

	if(isset($_POST['submit'])){

		$productObj->insertProduct($_POST);
	}
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Add Product</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>
	<div class="container">
		<form action="addProduct.php" method="POST">
		    <div class="form-group">
		      <label for="name">Product:</label>
		      <input type="text" class="form-control" name="product" placeholder="Enter product" required="">
		    </div>
		    <div class="form-group">
		      <label for="name">Price:</label>
		      <input type="number" class="form-control" min="1" name="price" placeholder="Enter price" required="">
		    </div>
		    <div class="form-group">
		      <label for="name">Category:</label>
		      <select class="form-control" name="categ_id" id="categ_id" required>
				  <?= $productObj->selectOption()?>
			   </select>
		    </div>
		    <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Submit">
		</form>	
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>