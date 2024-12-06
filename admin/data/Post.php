<?php
//Get All Post
function getAll($conn)
{
  $sql = "SELECT * FROM post";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() >= 1) {
    $data = $stmt->fetchAll();
    return $data;
  } else {
    return 0;
  }
}

//Get User By Id
function getById($conn, $id)
{
  $sql = "SELECT * FROM post WHere post_id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id]);

  if ($stmt->rowCount() >= 1) {
    $data = $stmt->fetch();
    return $data;
  } else {
    return 0;
  }
}

//getbtidCategory
//Get User By Id
function getCategory($conn,$id){
  $sql = "SELECT * FROM category WHere id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id]);

  if($stmt->rowCount() >=1 ){
    $data = $stmt->fetch();
    return $data;
  }else {
    return 0;
  }
}

//Get all category
function getAllCategory($conn){
  $sql = "SELECT * FROM category";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if($stmt->rowCount() >=1 ){
    $data = $stmt->fetchAll();
    return $data;
  }else {
    return 0;
  }
}

function getUserById($conn, $id)
{
  $sql = "SELECT id,fname,username FROM users Where id = ?";
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
function deleteById($conn, $id)
{
  $sql = "DELETE FROM post WHERE post_id = ?";
  $stmt = $conn->prepare($sql);
  $res = $stmt->execute([$id]);

  if ($res) {
    return 1;
  } else {
    return 0;
  }
}