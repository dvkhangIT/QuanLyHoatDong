<?php
// if (session_status() == PHP_SESSION_NONE) {
//     session_start();
// }
require 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title>Quản lý hoạt động khoa CNTT</title>
     <link rel="stylesheet" href="assets/css/bootstrap.css" />
     <link rel="stylesheet" href="assets/css/style.css" />
     <!-- icon -->
     <script src="https://kit.fontawesome.com/201f6c5d4d.js" crossorigin="anonymous"></script>
</head>

<body>
     <div class="wrapper d-flex align-items-stretch">
          <?php
        require 'pages/layouts/side_ad.php';
        ?>
          <!-- Page Content  -->
          <div id="content" class="">
               <!-- <div class="navbar-content">
                    <nav class="background-pr d-flex">
                         <div class="col-10">
                         </div>
                         <div class="col-2 d-flex flex-nowrap">
                              <div class="user py-2 d-block">
                                   <div class="">
                                        <button class="dropdown-toggle bg-transparent border-0 text-white" type=""
                                             data-toggle="dropdown" aria-expanded="false">
                                             <i class="fa fa-user"></i>
                                             < ?php
                                    echo isset($_SESSION['hoTen']) ? $_SESSION['hoTen'] : ""
                                    ?>
                                        </button>
                                        <div class="dropdown-menu">
                                             <a class='dropdown-item < ?php echo isset($_SESSION['tenDangNhap']) ? "" : "disabled" ?>'
                                                  data-toggle="modal" data-target="#staticBackdrop" href="#">Thông tin
                                                  cá nhân</a>
                                             <a class="dropdown-item < ?php echo isset($_SESSION['tenDangNhap']) ? "" : "disabled" ?>"
                                                  href="#">Đổi mật khẩu</a>
                                             <a class="dropdown-item" href="< ?php
                                                                    echo isset($_SESSION['hoTen']) ? "?url=logout" : "?url=login"
                                                                    ?>">
                                                  < ?php
                                        echo isset($_SESSION['hoTen']) ? "Đăng xuất" : "Đăng nhập"
                                        ?>
                                             </a>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </nav>
               </div> -->
               <div class="main-content p-4 p-md-5 pt-5">
                    <?php
                if (isset($_GET['url'])) {
                    $page = $_GET['url'];
                    require "pages/admin/" . $page . ".php";
                } else {
                    require "pages/admin/home.php";
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