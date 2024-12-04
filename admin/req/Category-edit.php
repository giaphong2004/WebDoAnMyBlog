<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username']) && isset($_POST['id'])) {
    include "../../db_conn.php";
    $category = $_POST['category'];
    $id = $_POST['id'];

    if (empty($category)) {
        $em = "Category is not allowed";
        header("Location: ../category-edit.php?id=$id&error=$em");
        exit;
    }

    $sql = "UPDATE category SET category = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $res = $stmt->execute([$category, $id]);

    if ($res) {
        $sm = "Edited Successfully";
        header("Location: ../category-edit.php?id=$id&success=$sm");
        exit;
    } else {
        $em = "Failed to edit category";
        header("Location: ../category-edit.php?id=$id&error=$em");
        exit;
    }
} else {
    header("Location: ../admin-login.php");
    exit;
}
?>