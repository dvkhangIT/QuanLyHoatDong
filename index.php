<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Quản lý hoạt động khoa CNTT</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css"/>
    <link rel="stylesheet" href="assets/css/style.css"/>
    <!-- icon -->
    <script
            src="https://kit.fontawesome.com/201f6c5d4d.js"
            crossorigin="anonymous"
    ></script>
</head>
<body>
<div class="wrapper d-flex align-items-stretch">
    <?php
    require 'pages/layouts/sidebar.php';
    ?>
    <!-- Page Content  -->
    <div id="content" class="">
        <div class="navbar-content">
            <nav class="background-pr d-flex">
                <div class="col-10">
                </div>
                <div class="col-2 d-flex flex-nowrap">
                    <div class="user py-2 d-block">
                        <!-- <a href="pages/login.html" class="text-white">
                          <i class="fa-regular fa-user pr-1"></i>
                          Đăng nhập
                        </a> -->
                        <div class="">
                            <button
                                    class="dropdown-toggle bg-transparent border-0 text-white"
                                    type=""
                                    data-toggle="dropdown"
                                    aria-expanded="false"
                            >
                                <i class="fa fa-user"></i>
                                <?php
                                echo isset($_SESSION['hoten']) ? $_SESSION['hoten'] : ""
                                ?>
                            </button>
                            <div class="dropdown-menu">
                                <a
                                        class='dropdown-item <?php echo isset($_SESSION['mssv']) ? "" : "disabled" ?>'
                                        data-toggle="modal"
                                        data-target="#staticBackdrop"
                                        href="#"
                                >Thông tin cá nhân</a
                                >
                                <a class="dropdown-item <?php echo isset($_SESSION['mssv']) ? "" : "disabled" ?>" href="#">Đổi mật khẩu</a>
                                <a class="dropdown-item" href="<?php
                                echo isset($_SESSION['hoten']) ? "?url=logout" : "?url=login"
                                ?>">
                                    <?php
                                    echo isset($_SESSION['hoten']) ? "Đăng xuất" : "Đăng nhập"
                                    ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="main-content p-4 p-md-5 pt-5">
            <?php
            if (isset($_GET['url'])) {
                $page = $_GET['url'];
                require "pages/sinhvien/" . $page . ".php";
            } else {
                require "pages/home.php";
            }
            ?>
        </div>
    </div>
    <!-- model info -->
    <?php
    if (isset($_SESSION['mssv'])) {
        ?>
        <div
                class="modal fade"
                id="staticBackdrop"
                data-backdrop="static"
                data-keyboard="false"
                tabindex="-1"
                aria-labelledby="staticBackdropLabel"
                aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">
                            Thông tin cá nhân
                        </h5>
                        <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col">
                            <table class="table table-striped">
                                <tbody>
                                <?php
                                $sql = "SELECT ho,ten, mssv,khoa,nganh,lop.tenLop,email,sdt FROM `sinhvien`, `lop` WHERE sinhvien.id_lop = lop.id_lop AND mssv = " . $_SESSION['mssv'] . "";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                    ?>

                                    <tr>
                                        <th>Họ tên:</th>
                                        <td><?php echo $row['ho'] . $row['ten'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Mã số sinh viên:</th>
                                        <td><?php echo $row['mssv'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Khoa:</th>
                                        <td><?php echo $row['khoa'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Ngành:</th>
                                        <td><?php echo $row['nganh'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Lớp:</th>
                                        <td><?php echo $row['tenLop'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email:</th>
                                        <td><?php echo $row['email'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Số điện thoại:</th>
                                        <td><?php echo $row['sdt'] ?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="text-center mb-3">
                        <button
                                type="button"
                                class="btn background-pr text-white w-25"
                                data-dismiss="modal"
                        >
                            Đóng
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } ?>
</div>
<script src="assets/js/jquery-3.7.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
