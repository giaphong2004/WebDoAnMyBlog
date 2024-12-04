<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])
    && $_GET['id']) {
 
$id =  $_GET['id'];

include_once "data/Category.php";
include_once "../db_conn.php";
$res = deleteById($conn,$id);
if($res){
    $sm = "Category Deleted Successfully";
    header("Location: category.php?success=$sm");
    exit;

 }else {
    $em = "Failed to delete category";
    header("Location: category.php?=error=$em");
    exit;
 }

}else {
	header("Location: ../admin-login.php");
	exit;
} 