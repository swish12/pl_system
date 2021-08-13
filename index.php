<?php

	include 'class/product_class.php';

	$productObj = new productClass();

	if(isset($_GET['deleteProdId']) && !empty($_GET['deleteProdId'])){
		$deleteProdId = $_GET['deleteProdId'];
		$productObj->deleteProdData($deleteProdId);
	}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>View Product</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>
	<div class="container">
		<h2 style="margin-top: 20px;">Product List
		<a href="addProduct.php" class="btn btn-primary" style="float:right;">Add New Product</a>
		<a href="category.php" class="btn btn-success" style="float:right; margin-right: 10px;">Add New Category</a>
		</h2>
		<table class="table table-hover">
		<thead>
			<tr>
				<th>No.</th>
				<th>Product</th>
				<th>Category</th>
				<th>Date Added</th>
				<th>Action</th>
			</tr>	
		</thead>
		<tbody>
			<?php 	
					$count = 1;
					$product = $productObj->displayProduct();
					if(is_array($product) || is_object($product)){
						foreach ($product as $products) {	
					
				?>
			<tr>
				<td><?php echo $count++;?></td>
				<td><?php echo $products['name'].", ".$products['price'];?></td>
				<td><?php echo $productObj->categoryName($products['category_id']);?></td>
				<td><?php echo date('F d, Y', strtotime($products['date_added']));?></td>
				<td>
				<a href="editProduct.php?editProdId=<?php echo $products['prod_id'] ?>" style="color:green">
	          			<i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp	
	          		<a href="index.php?deleteProdId=<?php echo $products['prod_id'] ?>" style="color:red" onclick="confirm('Are you sure want to delete this record')">
	      				<i class="fa fa-trash" aria-hidden="true"></i></a>	
				</td>
			</tr>
			<?php } } ?>
		</tbody>	
		</table>
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
