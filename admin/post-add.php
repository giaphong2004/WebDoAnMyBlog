<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard -Create Post</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/side-bar.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/richtext.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/jquery.richtext.min.js"></script>
</head>
<body>
	<?php
	$key = "hhdsfs1263z";
	
	include "inc/side-nav.php"; 
	include_once "data/Post.php";
	include_once "../db_conn.php";
	$posts = getAll($conn);
	?>
	<div class="main-table">
		<table class="table t1 table-bordered">
			<thead class="table-light">
			<h3 class="mb-3">Create Posts <a href="post.php" class="btn btn-secondary">Posts  </a></h3>
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

				<form action="post-add-action.php" method="post">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control text"  name="text" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
	</div>
		</section>
	</div>

	<script>
		var navList = document.getElementById('navList').children;
		navList.item(1).classList.add("active");
        $(document).ready(function() {
            $('.text').richText();
        });
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>

<?php }else {
	header("Location: ../admin-login.php");
	exit;
} ?>