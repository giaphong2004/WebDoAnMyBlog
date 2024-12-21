<?php
 session_start();
 $logged =false;
 $user_id = null;

 if(isset($_SESSION['user_id'])&& isset($_SESSION['username'])) {
           $logged = true;
          $user_id = $_SESSION['user_id'];

        }
        $notFound = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    <?php if(isset($_GET['search'])){
			 echo "Search '" .htmlspecialchars($_GET['search'])."'";
		     }else{
          echo "My Blog";
         } ?>
    </title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<?php include 'inc/NavBar.php'; 
      include_once "admin/data/Post.php";
      include_once "admin/data/Comment.php";
      include_once "db_conn.php";
      if(isset($_GET['search'])){
        $key = $_GET['search'];
        $posts = search($conn, $key);
        if ($posts == 0) {
            $notFound = 1;
        }
     }else {
        $posts = getAll($conn);
     }
     $categories = get5Categories($conn);
  ?>
      <!-- hiển thị search -->
      <h1 class="display-4 mb-4 fs-3 search-title">
        <?php if(isset($_GET['search'])){
			       echo "Search <b> '" .htmlspecialchars($_GET['search'])."'</b>";} ?>
      </h1>
<div class="container mt-4">
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
                        <?php
                        
                        $post_id = $post['post_id'];
                        $liked = isLikedByUserID($conn, $post_id,$user_id);
                          if($liked){
                           
                        ?>
                         <i class="fa fa-thumbs-up liked like-btn"
                            post-id="<?= $post_id ?>" 
                            liked="1"
                            aria-hidden="true"></i>
                        <?php } else { ?>
                      <i class="fa fa-thumbs-up like like-btn"
                            post-id="<?= $post_id ?>" 
                            liked="0"
                            aria-hidden="true"></i>
                        <?php } ?>
                        Likes(
                          <span class="like-count">
                          <?php echo likeCountByPostID($conn, $post['post_id']); ?></span>)
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
            <?php }else { ?>
  	   	<main class="main-blog p-2">
  	   		<?php if($notFound){ ?>
  	   			<div class="alert alert-warning"> 
  	   				No search results found 
  	   				<?php echo " - <b>key = '".htmlspecialchars($_GET['search'])."'</b>" ?>
  	   			</div>
  	   		<?php }else{ ?>
  	   			<div class="alert alert-warning"> 
  	   				No posts yet.
  	   			</div>
  	   		<?php } ?>
  	   	</main>
  	   <?php } ?>
            <aside class="aside-main">
            <div class="list-group category-aside">
                <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                  Category
                </a>
                <?php foreach($categories as $category){ ?>
                <a href="category.php?category_id=<?=$category['id']?>" class="list-group-item list-group-item-action"><?=$category['category']?></a>
                <?php } ?>
              </div>
            </aside>
        </section>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const likeButtons = document.querySelectorAll('.like-btn');
        likeButtons.forEach(button => {
            button.addEventListener('click', function() {
                const postId = this.getAttribute('post-id');
                const liked = this.getAttribute('liked') === '1';
                const likeCountSpan = this.parentElement.querySelector('.like-count');
                let likeCount = parseInt(likeCountSpan.textContent);

                if (liked) {
                    this.classList.remove('liked');
                    this.setAttribute('liked', '0');
                    likeCount--;
                } else {
                    this.classList.add('liked');
                    this.setAttribute('liked', '1');
                    likeCount++;
                }

                likeCountSpan.textContent = likeCount;

                // Send AJAX request to update like status in the database
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'php/update_like.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.send(`post_id=${postId}&liked=${!liked}`);
            });
        });
    });
</script>
</body>
</html>