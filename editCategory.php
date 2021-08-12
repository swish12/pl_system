<?php 
	include 'class/core_class.php';
	$categObj = new myClass();

	if(isset($_GET['editId']) && !empty($_GET['editId'])){
		$editId = $_GET['editId'];
		$category = $categObj->DisplayById($editId);
	}

	if(isset($_POST['update'])){
		$categObj->UpdateRecord($_POST);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit Category</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>
	<div class="container">
		<form action="editCategory.php" method="POST">
			<div class="form-group">
		      <label for="name">Name:</label>
		      <input type="text" class="form-control" name="up_name" placeholder="Enter name" value="<?= $category['name']; ?>" required="">
		    </div>
		    <div class="form-group">
		      <label for="name">Description:</label>
		      <input type="text" class="form-control" name="up_description" placeholder="Enter description" value="<?= $category['description']; ?>" required="">
		    </div>
		    <input type="hidden" name="up_id" style="float:right;" value="<?= $category['id'];?>">
		    <input type="submit" name="update" class="btn btn-primary" style="float:right;" value="update">
		</form>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>