<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Category Page </title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<?php include 'inc/NavBar.php'; 
?>

<div class="container mt-5">
    <h1 class="display-4 mb-4 fs-3">Category 2</h1>
        <section class="d-flex">
            <main class="main-blog">
            <div class="card main-block-card mb-3" >
                <img src="upload/blog/2.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Blog title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <p class='card-text'>
                      <small class="text-body-secondary">Last update 3 mins ago</small>
                    </p>
                    <a href="#" class="btn btn-primary">Read more</a>
                </div>
            </div>

            <div class="card main-block-card mb-3" >
                <img src="upload/blog/2.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Blog title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <p class='card-text'>
                      <small class="text-body-secondary">Last update 3 mins ago</small>
                    </p>
                    <a href="#" class="btn btn-primary">Read more</a>
                </div>
            </div>

            <div class="card main-block-card" >
                <img src="upload/blog/2.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Blog title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <p class='card-text'>
                      <small class="text-body-secondary">Last update 3 mins ago</small>
                    </p>
                    <a href="#" class="btn btn-primary">Read more</a>
                </div>
            </div>

            
            </main>
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