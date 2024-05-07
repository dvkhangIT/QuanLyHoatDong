<?php
if (!isset($_SESSION['tenDangNhap'])) {
     header("Location:../index.php?url=login");
 }

$id = $_GET['id'];
$sql_edit = "SELECT * FROM hoatdong WHERE hoatDongID = '$id'";
$query_edit = mysqli_query($conn, $sql_edit);
$row_edit = mysqli_fetch_array($query_edit);
if (isset($_POST['btn_save'])) {
     $tenHoatDong = $_POST['tenHoatDong'];
     $thoiGian = $_POST['thoiGian'];
     $soLuong = $_POST['soLuong'];
     $diaDiem = $_POST['diaDiem'];
     $moTa = $_POST['moTa'];
     $sql = "UPDATE hoatdong SET tenHoatDong = '$tenHoatDong', thoiGian = '$thoiGian', soLuong = '$soLuong', diaDiem = '$diaDiem', moTa = '$moTa' WHERE hoatDongID = '$id'";
     $query = mysqli_query($conn, $sql);
     header('location:?url=list_active');
}
?>

<div class="container-fluid mt-3">
     <div class="row">
          <div class="col-3"></div>
          <div class="col-6">
               <div class="mb-4">
                    <a href="?url=list_active" class="btn btn-outline-primary">Hoạt Động</a>
               </div>
               <h3 class="mb-4 text-center">Sửa hoạt động</h3>
               <form class="form-group" action="" method="post" enctype="multipart/form-data">
                    <div class="mb-4 mt-4">
                         <label for="tenHoatDong" class="form-label">Tên hoạt động</label>
                         <input type="text" name="tenHoatDong" class="form-control" id="tenHoatDong" required
                              value="<?php echo $row_edit['tenHoatDong'] ?>" />
                    </div>
                    <div class="mb-4 mt-4">
                         <label for="thoiGian" class="form-label">Thời gian</label>
                         <input type="date" name="thoiGian" class="form-control" id="thoiGian" required
                              value="<?php echo $row_edit['thoiGian'] ?>" />
                    </div>
                    <div class="mb-4 mt-4">
                         <label for="soLuong" class="form-label">Số lượng</label>
                         <input type="number" name="soLuong" class="form-control" id="soLuong" min="1" required
                              value="<?php echo $row_edit['soLuong'] ?>" />
                    </div>
                    <div class="mb-4 mt-4">
                         <label for="diaDiem" class="form-label">Địa điểm</label>
                         <input type="text" name="diaDiem" class="form-control" id="diaDiem" required
                              value="<?php echo $row_edit['diaDiem'] ?>" />
                    </div>
                    <div class="mb-4 mt-4">
                         <label for="moTa" class="form-label">Mô tả</label>
                         <input type="text" name="moTa" class="form-control" id="moTa" required
                              value="<?php echo $row_edit['moTa'] ?>" />
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