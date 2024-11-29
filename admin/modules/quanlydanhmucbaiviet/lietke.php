<?php
$sql_lietke_danhmucbaiviet = "SELECT * FROM tbl_danhmucbaiviet ORDER BY thutu DESC";
$query_lietke_danhmucbaiviet = mysqli_query($mysqli, $sql_lietke_danhmucbaiviet);
?>
<p>Liệt kê danh mục bài viết</p>
<table border="1" width=100% style="border-collapse: collapse;">
    <tr>
        <th>Id</th>
        <th>Tên danh mục</th>
        <th>Quản lý</th>

    </tr>

    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_danhmucbaiviet)) {
        $i++;
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row['tendanhmuc']; ?></td>
            <td>
                <a href="modules/quanlydanhmucbaiviet/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Xóa</a> |
                <a href="?action=quanlydanhmucbaiviet&query=sua&iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Sửa</a>
            </td>
        </tr>
        <?php
    }
    ?>

</table>