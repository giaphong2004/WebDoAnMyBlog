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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #00c6ff, #0072ff); /* Gradient màu xanh dương */
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 56px); /* Trừ đi chiều cao của navbar */
            text-align: center;
        }
        header h1 {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 5rem;
            background: linear-gradient(to right,rgb(234, 207, 189),rgb(203, 202, 201)); /* Gradient màu chữ */
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 2px 2px 4px rgba(163, 160, 160, 0.5);
            animation: bounce 2s infinite;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-30px);
            }
            60% {
                transform: translateY(-15px);
            }
        }
    </style>
</head>
<body>
<?php include 'inc/NavBar.php'; ?>
<div class="container">
    <header>
        <h1>Welcome to My Blog</h1>
    </header>
</div>
<footer>
    &copy; 2024 My Blog. All rights reserved.
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>