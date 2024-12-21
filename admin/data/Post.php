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
// getAllDeep admin
function getAllDeep($conn){
  $sql = "SELECT * FROM post";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if($stmt->rowCount() >= 1){
        $data = $stmt->fetchAll();
        return $data;
  }else {
      return 0;
  }
} 
//Get User By Id
function getById($conn, $id)
{
  $sql = "SELECT * FROM post WHere post_id = ? ";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id]);

  if ($stmt->rowCount() >= 1) {
    $data = $stmt->fetch();
    return $data;
  } else {
    return 0;
  }
}

//create search
function search($conn, $key){
  $sql = "SELECT * FROM post WHERE post_title LIKE ? ";
  $stmt = $conn->prepare($sql);
  $stmt->execute(["%$key%"]);
  if($stmt->rowCount() >= 1){
        $data = $stmt->fetchAll();
        return $data;
  }else {
      return 0;
  }
}

//Get All Post By Category
function getAllPostsByCategory($conn, $category_id){
  $sql = "SELECT * FROM post  WHERE category=? AND publish=1";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$category_id]);

   if($stmt->rowCount() >= 1){
         $data = $stmt->fetchAll();
         return $data;
   }else {
       return 0;
   }
}

//get by id Category
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
// getById Deep - Admin
function getByIdDeep($conn, $id){
  $sql = "SELECT * FROM post WHERE post_id=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id]);

  if($stmt->rowCount() >= 1){
        $data = $stmt->fetch();
        return $data;
  }else {
      return 0;
  }
}

//Get all category
function getAllCategory($conn){
  $sql = "SELECT * FROM category ORDER BY category";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if($stmt->rowCount() >=1 ){
    $data = $stmt->fetchAll();
    return $data;
  }else {
    return 0;
  }
}

//get5Categoies
function get5Categories($conn){
  $sql = "SELECT * FROM category LIMIT 5";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if($stmt->rowCount() >= 1){
        $data = $stmt->fetchAll();
        return $data;
  }else {
      return 0;
  }
}

// getCategoryById
function getCategoryById($conn, $id){
  $sql = "SELECT * FROM category WHERE id=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id]);

  if($stmt->rowCount() >= 1){
        $data = $stmt->fetch();
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