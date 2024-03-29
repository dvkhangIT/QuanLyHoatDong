<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require '../connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quản lý hoạt động khoa CNTT</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css" />
    <link rel="stylesheet" href="../assets/css/style.css" />
    <!-- icon -->
    <script src="https://kit.fontawesome.com/201f6c5d4d.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <?php
        require 'layout/side_ad.php';
        ?>
        <!-- Page Content  -->
        <div id="content" class="">
            <div class="main-content p-4 p-md-5 pt-5">
                <?php
                if (isset($_GET['url'])) {
                    $page = $_GET['url'];
                    require "pages/" . $page . ".php";
                } else {
                    require "pages/home.php";
                }
                ?>
            </div>
        </div>

        <script src="assets/js/jquery-3.7.1.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.js"></script>
        <script src="assets/js/main.js"></script>
</body>

</html>