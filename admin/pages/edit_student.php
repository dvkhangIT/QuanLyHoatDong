<?php
if (!isset($_SESSION['tenDangNhap'])) {
     header("Location:../index.php?url=login");
 }

$id = $_GET['id'];
$sql_edit = "SELECT * FROM sinhvien WHERE MSSV = '$id'";
$query_edit = mysqli_query($conn, $sql_edit);
$row_edit = mysqli_fetch_array($query_edit);
if (isset($_POST['btn_save'])) {
     $MSSV = $_POST['MSSV'];
     $hoTen = $_POST['hoTen'];
     $email = $_POST['email'];
     $soDienThoai = $_POST['soDienThoai'];
     $lopID = $_POST['lopID'];
     $sql = "UPDATE sinhvien SET hoTen = '$hoTen', email = '$email', soDienThoai = '$soDienThoai', lopID = '$lopID' WHERE MSSV = '$MSSV'";
     $query = mysqli_query($conn, $sql);
     header('location:?url=list_student');
}

?>
<div class="container-fluid mt-3">
     <div class="row">
          <div class="col-3"></div>
          <div class="col-6">
               <div class="mb-4">
                    <a href="?url=list_student" class="btn btn-outline-primary">Sinh Viên</a>
               </div>
               <h3 class="mb-4 text-center">Sửa sinh viên</h3>
               <form class="form-group" action="" method="post" enctype="multipart/form-data">
                    <div class="mb-4 mt-4">
                         <label for="MSSV" class="form-label">Mã số sinh viên</label>
                         <input type="text" name="MSSV" class="form-control" id="MSSV" required
                              value="<?php echo $row_edit['MSSV'] ?>" />
                    </div>
                    <div class="mb-4 mt-4">
                         <label for="hoTen" class="form-label">Họ tên</label>
                         <input type="text" name="hoTen" class="form-control" id="hoTen" required
                              value="<?php echo $row_edit['hoTen'] ?>" />
                    </div>
                    <div class="mb-4 mt-4">
                         <label for="email" class="form-label">Email</label>
                         <input type="email" name="email" class="form-control" id="email" required
                              value="<?php echo $row_edit['email'] ?>" />
                    </div>
                    <div class="mb-4 mt-4">
                         <label for="soDienThoai" class="form-label">Số điện thoại</label>
                         <input type="text" name="soDienThoai" class="form-control" id="soDienThoai" required
                              value="<?php echo $row_edit['soDienThoai'] ?>" />
                    </div>
                    <div class="mb-4 mt-4">
                         <label for="lopID" class="form-label">Lớp</label>
                         <select class="custom-select" id="lopID" name="lopID">">
                              <<?php
                              $sql = "SELECT * FROM lop";
                              $result = mysqli_query($conn, $sql);
                              while ($row = mysqli_fetch_array($result)) {
                              ?> <option value="<?php echo $row['lopID'] ?>"><?php echo $row['tenLop'] ?></option>
                                   <?php } ?>
                         </select>
                    </div>

                    <div class="mb-4 text-center">
                         <button type="submit" name="btn_save" class="btn background-pr text-white w-100">
                              Lưu
                         </button>
                    </div>
               </form>
          </div>
          <div class="col-3"></div>
     </div>
</div>