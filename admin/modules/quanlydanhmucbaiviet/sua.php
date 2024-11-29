<?php
$sql_sua_danhmucbaiviet = "SELECT * FROM tbl_danhmucbaiviet WHERE id_danhmuc ='$_GET[iddanhmuc]' LIMIT 1";
$query_sua_danhmucbaiviet = mysqli_query($mysqli, $sql_sua_danhmucbaiviet);
?>
<p>Sửa danh mục bài viết</p>
<table border="1" width="50%" style="border-collapse: collapse;">
    <form method="POST" action="modules/quanlydanhmucbaiviet/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc'] ?>">
        <?php
        while ($dong = mysqli_fetch_array($query_sua_danhmucbaiviet)) {
            ?>
            <tr>
                <td>Sửa danh mục</td>
                <td><input type="text" value="<?php echo $dong['tendanhmuc'] ?>" name="tendanhmuc"></td>
            </tr>

            <tr>
                <td colspan="2"><input type="submit" name="suadanhmuc" value="Sửa danh mục bài viết"></td>
            </tr>
            <?php
        }
        ?>
    </form>
</table>