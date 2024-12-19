<?php
session_start();
include "../db_conn.php";

if (isset($_SESSION['user_id']) && isset($_POST['post_id']) && isset($_POST['liked'])) {
    $user_id = $_SESSION['user_id'];
    $post_id = $_POST['post_id'];
    $liked = $_POST['liked'] === 'true';

    if ($liked) {
        $sql = "INSERT INTO post_like (post_id, like_by) VALUES (?, ?)";
    } else {
        $sql = "DELETE FROM post_like WHERE post_id = ? AND like_by = ?";
    }

    $stmt = $conn->prepare($sql);
    $stmt->execute([$post_id, $user_id]);
}
?>