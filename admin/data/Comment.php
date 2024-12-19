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
//đếm comment 
function CountByPostID($conn, $id)
{
    $sql = "SELECT * FROM comment WHere post_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    return $stmt->rowCount();
}
//đếm like
function likeCountByPostID($conn, $id)
{
    $sql = "SELECT * FROM post_like WHere post_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    return $stmt->rowCount();
}

//is liked
function isLikedByUserID($conn, $post_id,$user_id)
{
    $sql = "SELECT * FROM post_like WHere post_id = ? and like_by = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$post_id,$user_id]);

    if( $stmt->rowCount()>0){
        return 1;
    }else{
        return 0;
    }
}

function getCommentsByPostID($conn, $id)
{
    $sql = "SELECT * FROM comment WHere post_id = ? Order by created_at desc";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    if ($stmt->rowCount() >= 1) {
        $data = $stmt->fetchAll();
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