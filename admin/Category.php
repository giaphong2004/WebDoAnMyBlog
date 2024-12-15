<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - Category</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/side-bars.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/styles.css">
</head>
<body>
	<?php
	$key = "hhdsfs1263z";
	
	include "inc/side-nav.php"; 
	include_once "data/Category.php";
	include_once "../db_conn.php";
	$categories = getAll($conn);
	?>
	<div class="main-table">
		<table class="table t1 table-bordered">
			<thead class="table-light">
			<h3 class="mb-3">All Categories <a href="Category-add.php" class="btn btn-success">Add New  </a></h3>
				<?php if(isset($_GET['error'] )) { ?>
				<div class="alert alert-warning">
						<?=htmlspecialchars($_GET['error'])?>
					</div>
				<?php } ?>

				<?php if(isset($_GET['success'])) { ?>
				<div class="alert alert-warning">
					<?=htmlspecialchars($_GET['success'])?>
					</div>
				<?php } ?>

				<?php if($categories != 0) { ?>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Category</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($categories as $categories ) { ?>
				<tr>
					<th scope="row"><?=$categories['id']?></th>
					<td><?=$categories['category']?></td>
					
					<td><a href="category-delete.php?id=<?=$categories['id']?>" class="btn btn-danger">Delete</a>
					<a href="category-edit.php?id=<?=$categories['id']?>" class="btn btn-warning">Edit</a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
				<?php }else{ ?>
					<div class="alert alert-warning">
						No Post Found
					</div>
				<?php } ?>
	</div>
		</section>
	</div>

	<script>
		var navList = document.getElementById('navList').children;
		navList.item(2).classList.add("active");
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>

<?php }else {
	header("Location: ../admin-login.php");
	exit;
} ?>