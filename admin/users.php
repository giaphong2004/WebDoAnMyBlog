<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - Users</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/bar-side.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<?php
	$key = "hhdsfs1263z";
	
	include "inc/side-nav.php"; 
	?>
	<div class="main-table">
		<table class="table t1">
			<thead class="table-light">
				<h3>All Users</h3>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">First Name</th>
					<th scope="col">User Name</th>
					<th scope="col">Password</th>
				</tr>
			</thead>
			<tbody>
				
			</tbody>
		</table>
	</div>
		
		</section>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>

<?php }else {
	header("Location: ../admin-login.php");
	exit;
} ?>