<?php
session_start();
include "../db_conn.php";

if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
    if (isset($_POST['comment']) && isset($_POST['post_id'])) {
        $comment = $_POST['comment'];
        $post_id = $_POST['post_id'];
        $user_id = $_SESSION['user_id'];

        if (empty($comment)) {
            $em = "Comment is required";
            header("Location: ../blog-view.php?error=$em&post_id=$post_id#comments");
            exit;
        } else {
            $sql = "INSERT INTO comment (post_id, user_id, comment) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $res = $stmt->execute([$post_id, $user_id, $comment]);

            if ($res) {
                $sm = "Comment added successfully";
                header("Location: ../blog-view.php?post_id=$post_id&success=$sm#comments");
                exit;
            } else {
                $em = "Failed to add comment";
                header("Location: ../blog-view.php?post_id=$post_id&error=$em#comments");
                exit;
            }
        }
    } else {
        header("Location: ../blog.php");
        exit;
    }
} else {
    header("Location: ../blog.php");
    exit;
}
?>