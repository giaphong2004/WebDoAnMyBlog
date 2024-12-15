<?php
 session_start();
 $logged =false;
 if(isset($_SESSION['user_id'])&& isset($_SESSION['username'])) 
           $logged = true;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<?php include 'inc/NavBar.php'; 
      include_once "admin/data/Post.php";
      include_once "admin/data/Comment.php";
      include_once "db_conn.php";
      $posts = getAll($conn);
?>

<div class="container mt-5">
        <section class="d-flex">
        <?php if ($posts != 0) { ?>
            <main class="main-blog">
              <?php foreach ($posts as $post) { ?>
            <div class="card main-block-card mb-3" >
                <img src="upload/blog/<?= $post['cover_url'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $post['post_title'] ?> </h5>
                    <?php 
                    $p= strip_tags($post['post_text']); 
                    $p = substr($p, 0, 200);
                    ?>
                    <p class="card-text"><?= $p ?>...</p>
                    
                    <a href="blog-view.php?post_id=<?=$post['post_id']?>" class="btn btn-primary">Read more</a>
                    <hr>
                    <div class="d-flex justify-content-between">
                      <div class="react-btn">
                      <i class="fa fa-thumbs-up like" aria-hidden="true"></i>Likes(
                        <?php
                        echo likeCountByPostID($conn, $post['post_id']);
                        ?>)
                    <a href="blog-view.php?post_id=<?=$post['post_id']?>#comments">
                    <i class="fa fa-comments" aria-hidden="true"></i> Comments(
                      <?php
                       echo CountByPostID($conn, $post['post_id']);
                      ?>)
                      
                      </a>
                        </div>
                        
                      <small class="text-body-secondary"><?= $post['created_date'] ?></small>
                      </div>
                </div>
                
            </div>
            <?php } ?>
            </main>
            <?php } ?>
            <aside class="aside-main">
            <div class="list-group category-aside">
                <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                  Category
                </a>
                <a href="#" class="list-group-item list-group-item-action">Category 1</a>
                <a href="#" class="list-group-item list-group-item-action">Category 2</a>
                <a href="#" class="list-group-item list-group-item-action">Category 3</a>
                <a class="list-group-item list-group-item-action disabled" aria-disabled="true">A disabled link item</a>
</div>
            </aside>
        </section>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>