<div class="clear"></div>
<div class="main">
    <?php
    if (isset($_GET['action']) && $_GET['query']) {
        $tam = $_GET['action'];
        $query = $_GET['query'];
    } else {
        $tam = '';
        $query = '';
    }

    // Check if the action is to manage article categories and the query is to add
    if ($tam == 'quanlydanhmucbaiviet' && $query == 'them') {
        include 'modules/quanlydanhmucbaiviet/them.php';
        include 'modules/quanlydanhmucbaiviet/lietke.php'; // Include the list file
    } elseif ($tam == 'quanlydanhmucbaiviet' && $query == 'sua') {
        include 'modules/quanlydanhmucbaiviet/sua.php'; // Include the edit file
    } else {
        include 'modules/dashboard.php';
    }
    ?>

</div>