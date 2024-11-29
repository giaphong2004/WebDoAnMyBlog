<?php
include('../../config/db_conn.php');

$mysqli = new mysqli("localhost", "root", "", "myblog_sqli");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$tenloaibaiviet = $_POST['tendanhmuc'];
$thutu = $_POST['thutu'];

if (isset($_POST['themdanhmuc'])) {                                  //them danh muc
    $sql_them = "INSERT INTO tbl_danhmucbaiviet(tendanhmuc,thutu) VALUES('$tenloaibaiviet', '$thutu')";
    if (!mysqli_query($mysqli, $sql_them)) {
        die("Error: " . mysqli_error($mysqli));
    }

    header('location:../../Category.php?action=quanlydanhmucbaiviet&query=them');

} elseif (isset($_POST['suadanhmuc'])) {                            //sua danh muc
    $sql_update = "UPDATE tbl_danhmucbaiviet SET tendanhmuc='$tenloaibaiviet', thutu='$thutu' WHERE id_danhmuc='$_GET[iddanhmuc]'";
    if (!mysqli_query($mysqli, $sql_update)) {
        die("Error: " . mysqli_error($mysqli));
    }

    header('location:../../Category.php?action=quanlydanhmucbaiviet&query=them');

} else {
    $id = $_GET['iddanhmuc'];
    $sql_xoa = "DELETE FROM tbl_danhmucbaiviet WHERE id_danhmuc='$id'";
    if (!mysqli_query($mysqli, $sql_xoa)) {
        die("Error: " . mysqli_error($mysqli));
    }

    header('location:../../Category.php?action=quanlydanhmucbaiviet&query=them');
    exit;
}

?>