<?php
//Get All Post
function getAllComment($conn)
{
    $sql = "SELECT * FROM comment";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() >= 1) {
        $data = $stmt->fetchAll();
        return $data;
    } else {
        return 0;
    }
}

//Get By Id
function getCommentById($conn, $id)
{
    $sql = "SELECT * FROM comment WHere comment_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    if ($stmt->rowCount() >= 1) {
        $data = $stmt->fetch();
        return $data;
    } else {
        return 0;
    }
}

//hàm delete
function deleteCommentById($conn, $id)
{
    $sql = "DELETE FROM comment WHERE comment_id = ?";
    $stmt = $conn->prepare($sql);
    $res = $stmt->execute([$id]);

    if ($res) {
        return 1;
    } else {
        return 0;
    }
}