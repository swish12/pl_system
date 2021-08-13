<?php 
	include 'class/product_class.php';

	$productObj = new productClass();

	if(isset($_GET['editProdId']) && !empty($_GET['editProdId'])){
		$editProdId = $_GET['editProdId'];
		$products = $productObj->DisplayProdById($editProdId);
	}

	if(isset($_POST['update'])){

		$productObj->UpdateProd($_POST);
	}

?>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit Product</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>
	<div class="container">
		<form action="editProduct.php" method="POST">
		    <div class="form-group">
		      <label for="Product">Product:</label>
		      <input type="text" class="form-control" name="up_product" value="<?= $products['name']; ?>" placeholder="Enter product" required="">
		    </div>
		    <div class="form-group">
		      <label for="Price">Price:</label>
		      <input type="number" class="form-control" min="1" name="up_price" value="<?= $products['price']?>" placeholder="Enter price" required="">
		    </div>
		    <div class="form-group">
		      <label for="Category">Category:</label>
		      <select class="form-control" name="up_categ_id" id="up_categ_id" selected value="<?= $selected; ?>"  required>
				  <?= $productObj->selectOption();?>
			   </select>
		    </div>
		    <input type="hidden" name="up_prodId" style="float:right;" value="<?= $products['prod_id'];?>">
		    <input type="submit" name="update" class="btn btn-primary" style="float:right;" value="Update">
		</form>	
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
