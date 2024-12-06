<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {

    if(isset($_POST['title']) && 
        isset($_FILES['cover']) && 
        isset($_POST['text'])&&
        isset($_POST['post_id']) &&
        isset($_POST['cover_url']) ){
            include "../../db_conn.php";
            $title = $_POST['title'];
            $text = $_POST['text'];
            $post_id = $_POST['post_id'];
            $cu = $_POST['cover_url'];
            if(empty($title)){
                $em = "Empty fields are not allowed";
                header("Location: ../post-edit.php?error=$em&post_id=$post_id");
                exit;
            }else if(empty($title)){
                $em = "Empty fields are not allowed";
                header("Location: ../post-edit.php?error=$em&post_id=$post_id");
                exit;
            }

            $images_name = $_FILES['cover']['name'];
            if($cu != "macdinh.jpg" && $images_name!=""){
                $clocation = "../../upload/blog".$cu;
                if(!unlink($clocation)){
                    
            }
        }
            if($images_name!=""){
                $images_size = $_FILES['cover']['size'];
                $images_temp = $_FILES['cover']['tmp_name'];
                $error = $_FILES['cover']['error'];
                if($error==0){
                    if($images_size > 1250000){
                        $em = "Image is too large";
                        header("Location: ../post-edit.php?error=$em&post_id=$post_id");
                        exit;
                    }else{
                        $images_ex = pathinfo($images_name, PATHINFO_EXTENSION);
                        $images_ex = strtolower($images_ex);

                        $allowed = array('jpg', 'jpeg', 'png');

                        if(in_array($images_ex, $allowed)){
                            $new_images_name = uniqid("COVER-", true).'.'.$images_ex;
                            $image_path = '../../upload/blog/'.$new_images_name;
                            move_uploaded_file($images_temp, $image_path);

                            $sql = "update post set post_title=?,post_text=?,cover_url=? where post_id=?";
                            $stmt = $conn->prepare($sql);
                            $res = $stmt->execute([$title,$text,$new_images_name,$post_id]);
                        }else{
                            $em = "You can't upload image of this type";
                            header("Location: ../post-add.php?error=$em&post_id=$post_id");
                            exit;
                        }
                }
            }
                
            }else{
                $sql = "update post set post_title=?,post_text=? where post_id=?";
                $stmt = $conn->prepare($sql);
                $res = $stmt->execute([$title,$text,$post_id]);
              
            }
            if($res){
                $sm = "Created Successfully";
                header("Location: ../post-edit.php?success=$sm&post_id=$post_id");
                exit;
            
             }else {
                $em = "Failed to delete user";
                header("Location: ../post-edit.php?=error=$em&post_id=$post_id");
                exit;
             }
                      
        }else {
            header("Location: ../post-edit.php&post_id=$post_id");
            exit;
        }
    


}else {
        header("Location: ../admin-login.php");
        exit;
    } 
