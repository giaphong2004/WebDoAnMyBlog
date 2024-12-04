<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {

    if(isset($_POST['title']) && 
        isset($_FILES['cover']) && 
        isset($_POST['text'])){
            include "../../db_conn.php";
            $title = $_POST['title'];
            $text = $_POST['text'];

            if(empty($title)){
                $em = "Empty fields are not allowed";
                header("Location: ../post-add.php?error=$em");
                exit;
            }else if(empty($title)){
                $em = "Empty fields are not allowed";
                header("Location: ../post-add.php?error=$em");
                exit;
            }

            $images_name = $_FILES['cover']['name'];
            if($images_name!=""){
                $images_size = $_FILES['cover']['size'];
                $images_temp = $_FILES['cover']['tmp_name'];
                $error = $_FILES['cover']['error'];
                if($error==0){
                    if($images_size > 1250000){
                        $em = "Image is too large";
                        header("Location: ../post-add.php?error=$em");
                        exit;
                    }else{
                        $images_ex = pathinfo($images_name, PATHINFO_EXTENSION);
                        $images_ex = strtolower($images_ex);

                        $allowed = array('jpg', 'jpeg', 'png');

                        if(in_array($images_ex, $allowed)){
                            $new_images_name = uniqid("COVER-", true).'.'.$images_ex;
                            $image_path = '../../upload/blog/'.$new_images_name;
                            move_uploaded_file($images_temp, $image_path);

                            $sql = "INSERT INTO post (post_title,post_text,cover_url) VALUES (?,?,?)";
                            $stmt = $conn->prepare($sql);
                            $res = $stmt->execute([$title,$text,$new_images_name]);
                        }else{
                            $em = "You can't upload image of this type";
                            header("Location: ../post-add.php?error=$em");
                            exit;
                        }
                }
            }
                
            }else{
                $sql = "INSERT INTO post (post_title,post_text) VALUES (?,?)";
                $stmt = $conn->prepare($sql);
                $res = $stmt->execute([$title,$text]);
              
            }
            if($res){
                $sm = "Created Successfully";
                header("Location: ../post-add.php?success=$sm");
                exit;
            
             }else {
                $em = "Failed to delete user";
                header("Location: ../post-add.php?=error=$em");
                exit;
             }
                      
        }else {
            header("Location: ../post-add.php");
            exit;
        }


}else {
        header("Location: ../admin-login.php");
        exit;
    } 
