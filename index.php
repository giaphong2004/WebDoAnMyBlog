<?php
session_start();
 $logged =false;

 if(isset($_SESSION['user_id'])&& isset($_SESSION['username'])) {
           $logged = true;
          $user_id = $_SESSION['user_id'];

        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to My Blog</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"></head>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }
        header {
            background-color: #0088FF;
            color: white;
            padding: 10px 20px;
            text-align: center;
        }
        main {
            padding: 20px;
            max-width: 800px;
            margin: 20px auto;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        footer {
            text-align: center;
            padding: 10px 20px;
            background-color: #0088FF;
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
<body>
<?php 
include 'inc/NavBar.php'; 
include_once "admin/data/Post.php";
include_once "admin/data/Comment.php";
include_once "db_conn.php";
?>
<header>
        <h1>Welcome to My Blog</h1>
    </header>
    <main>
        <h2>Hello there!</h2>
        <p>Thank you for visiting my blog. Here, I share my thoughts, ideas, and stories on various topics. Feel free to explore and leave your feedback!</p>
    </main>
    <footer>
        &copy; 2024 My Blog. All rights reserved.
    </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>