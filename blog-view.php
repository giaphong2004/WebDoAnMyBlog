<?php 
session_start();
$logged = false;
$user_id = null;
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
    $logged = true;
    $user_id = $_SESSION['user_id'];
}

if (isset($_GET['post_id'])) {
    include_once "admin/data/Post.php";
    include_once "admin/data/Comment.php";
    include_once "db_conn.php";
    $id = $_GET['post_id'];
    $post = getById($conn, $id);
    $comments = getCommentsByPostID($conn, $id);
    $categories = getAllCategory($conn);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - <?= htmlspecialchars($post['post_title']) ?></title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<?php include 'inc/NavBar.php'; ?>

<div class="container mt-4">
    <section class="d-flex">
        <main class="main-blog">
            <div class="card main-block-card mb-3">
                <img src="upload/blog/<?= htmlspecialchars($post['cover_url']) ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($post['post_title']) ?> </h5>
                    <p class="card-text"><?= nl2br($post['post_text']) ?></p>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <div class="react-btn">
                        <?php
                        $post_id = $post['post_id'];
                        $liked = isLikedByUserID($conn, $post_id, $user_id);
                        if ($liked) {
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
                            <i class="fa fa-comments" aria-hidden="true"></i> Comments(
                            <?php echo CountByPostID($conn, $post['post_id']); ?>)
                        </div>
                        <small class="text-body-secondary"><?= $post['created_date'] ?></small>
                    </div>

                    <form action="php/comment.php" method="post" id="comments">
                        <h5 class="mt-4">Add comment</h5><br>
                        <?php if (isset($_GET['error'])) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?= htmlspecialchars($_GET['error']); ?>
                            </div>
                        <?php } ?>

                        <?php if (isset($_GET['success'])) { ?>
                            <div class="alert alert-success" role="alert">
                                <?= htmlspecialchars($_GET['success']); ?>
                            </div>
                        <?php } ?>
                        <div class="mb-3">
                            <label for="comment" class="form-label">Comment</label>
                            <textarea class="form-control" name="comment" rows="4" required></textarea>
                            <input type="hidden" name="post_id" value="<?= $id ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Comment</button>
                    </form>
                    <hr>
                    <div>
                        <div class="comments">
                            <?php if ($comments != 0) {
                                foreach ($comments as $comment) {
                                    $u = getUserById($conn, $comment['user_id']);
                            ?>
                            <div class="Comment d-flex">
                                <div>
                                    <img src="img/default-icon.jpg" width="40" height="40">
                                </div>
                                <div class="p-2">
                                    <span><?= htmlspecialchars($u['fname']) ?></span>
                                    <p><?= htmlspecialchars($comment['comment']) ?></p>
                                    <small class="text-body-secondary"><?= $comment['created_at'] ?></small>
                                </div>
                            </div><hr>
                            <?php }} ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <aside class="aside-main">
            <div class="list-group category-aside">
                <a href="#" class="list-group-item list-group-item-action active" aria-current="true">Category</a>
                <?php foreach($categories as $category){ ?>
                <a href="#" class="list-group-item list-group-item-action"><?=$category['category']?></a>
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
<?php 
} else {
    header("Location: blog.php");
    exit;
} 
?>