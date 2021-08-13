<?php

	include 'class/core_class.php';

	$categObj = new myClass();

	if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])){
		$deleteId = $_GET['deleteId'];
		$categObj->deleteData($deleteId);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>View Category</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>
	<h2 style="text-align: center;">Category</h2>
	<div class="container">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Description</th>
					<th>Action</th>
				</tr>
			</thead>		
			<tbody>
				<?php 
					$category = $categObj->displayData();
					if (is_array($category) || is_object($category)){
					foreach ($category as $categories) {	
					
				?>
				<tr>
					<td><?php echo $categories['id']?></td>
					<td><?php echo $categories['name']?></td>
					<td><?php echo $categories['description']?></td>
					<td>
					<a href="editCategory.php?editId=<?php echo $categories['id'] ?>" style="color:green">
	              				<i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp	
	              			<a href="viewCategory.php?deleteId=<?php echo $categories['id'] ?>" style="color:red" onclick="confirm('Are you sure want to delete this record')">
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
