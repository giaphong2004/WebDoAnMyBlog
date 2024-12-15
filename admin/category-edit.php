<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username']) && isset($_GET['id'])) {
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Edit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/side-bars.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <?php
    $key = "hhdsfs1263z";
    $id = $_GET['id'];
    include "inc/side-nav.php"; 
    include_once "data/Category.php";
    include_once "../db_conn.php";
    $category = getById($conn, $id);
    ?>
    <div class="main-table">
        <table class="table t1 table-bordered">
            <thead class="table-light">
            <h3 class="mb-3">Edit <a href="Category.php" class="btn btn-secondary">Category  </a></h3>
                <?php if(isset($_GET['error'] )) { ?>
                <div class="alert alert-warning">
                        <?=htmlspecialchars($_GET['error'])?>
                    </div>
                <?php } ?>

                <?php if(isset($_GET['success'])) { ?>
                <div class="alert alert-success">
                    <?=htmlspecialchars($_GET['success'])?>
                    </div>
                <?php } ?>

    <form action="req/Category-edit.php" method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Category</label>
            <input type="text" class="form-control" name="category" value="<?=$category['category']?>">
            <input type="hidden" name="id" value="<?=$category['id']?>">
        </div>

       
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
                
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

<?php } else {
    header("Location: ../admin-login.php");
    exit;
} ?>