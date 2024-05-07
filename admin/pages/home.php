<?php if (!isset($_SESSION['tenDangNhap'])) {
    header("Location:../index.php?url=login");
} ?>
<div class="container-fluid">
     <div class="row">
          <div class="col-md-12">
               <h1 class="text-center mt-3">Trang quản trị</h1>
          </div>
     </div>
     <div class="row mt-3">
          <div class="col-md-3">
               <div class="panel panel-orange">
                    <div class="panel-heading text-center">
                         <h3 class="panel-title">Khoá học</h3>
                    </div>
                    <div class="panel-body">
                         <h1 class="text-center">
                              <?php
                        $sql = "SELECT * FROM `khoahoc`";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        echo $count;
                        ?>
                         </h1>
                    </div>
               </div>
          </div>
          <div class="col-md-3">
               <div class="panel panel-teal">
                    <div class="panel-heading text-center">
                         <h3 class="panel-title">Lớp</h3>
                    </div>
                    <div class="panel-body">
                         <h1 class="text-center">
                              <?php
                        $sql = "SELECT * FROM `lop`";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        echo $count;
                        ?>
                         </h1>
                    </div>
               </div>
          </div>
          <div class="col-md-3">
               <div class="panel panel-red">
                    <div class="panel-heading text-center">
                         <h3 class="panel-title">Sinh viên</h3>
                    </div>
                    <div class="panel-body">
                         <h1 class="text-center">
                              <?php
                        $sql = "SELECT * FROM `sinhvien`";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        echo $count;
                        ?>
                         </h1>
                    </div>
               </div>
          </div>
          <div class="col-md-3">
               <div class="panel panel-red">
                    <div class="panel-heading text-center">
                         <h3 class="panel-title">Hoạt động</h3>
                    </div>
                    <div class="panel-body">
                         <h1 class="text-center">
                              <?php
                        $sql = "SELECT * FROM `hoatdong`";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        echo $count;
                        ?>
                         </h1>
                    </div>
               </div>
          </div>
     </div>
</div>