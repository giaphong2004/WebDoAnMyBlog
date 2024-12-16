<?php 
session_start();
$logged = false;
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
    $logged = true;
}

if (isset($_GET['post_id'])) {
    include_once "admin/data/Post.php";
    include_once "admin/data/Comment.php";
    include_once "db_conn.php";
    $id = $_GET['post_id'];
    $post = getById($conn, $id);
    $comments = getCommentsByPostID($conn, $id);
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

<div class="container mt-5">
    <section class="d-flex">
        <main class="main-blog">
            <div class="card main-block-card mb-3">
                <img src="upload/blog/<?= htmlspecialchars($post['cover_url']) ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($post['post_title']) ?> </h5>
                    <p class="card-text"><?= $post['post_text'] ?></p>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <div class="react-btn">
                            <i class="fa fa-thumbs-up" aria-hidden="true">Likes(</i>
                            <?php echo likeCountByPostID($conn, $post['post_id']); ?>)
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
                                    <span><?= htmlspecialchars($u['username']) ?></span>
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
<?php 
} else {
    header("Location: blog.php");
    exit;
} 
?>