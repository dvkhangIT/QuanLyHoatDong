<?php
if (!isset($_SESSION['tenDangNhap'])) {
     header("Location:../index.php?url=login");
 }
?>
<div class="main-content p-4 p-md-3 pt-3">
     <?php
    if (isset($_SESSION['success_message'])) {
        echo $_SESSION['success_message'];
    } else if (isset($_SESSION['error_message'])) {
        echo $_SESSION['error_message'];
    }
    unset($_SESSION['success_message']);
    unset($_SESSION['error_message']);
    ?>
     <div class="mb-3 w-50 float-right">
          <form action="" method="POST">
               <div class="input-group">
                    <input type="text" class="form-control form-control" placeholder="Nhập tên hoạt động....?"
                         name="input-search" />
                    <div class="input-group-append background-pr rounded-right">
                         <button type="submit" class="btn btn btn-default text-white btn-hover" name="button-search">
                              <i class="fa fa-search"></i>
                         </button>
                    </div>
               </div>
          </form>
     </div>
     <!-- <button onclick="printPage()">In trang</button> -->
</div>
<div class="mb-3">
     <a href="?url=add_active" class="btn btn-outline-primary">Thêm hoạt động</a>
     <!-- <a href="?url=add_active_delete" class="btn btn-success">Hoạt động đã xoá</a> -->
</div>
<table class="table-responsive table-striped table bg-light">
     <thead>
          <tr>
               <th colspan="6" class="text-center">Danh sách hoạt động</th>
          </tr>
          <tr>
               <th class="col-0">STT</th>
               <th class="col-3">Tên hoạt động</th>
               <th class="col-3">Địa điểm</th>
               <th class="col-4">Mô tả</th>
               <th class="col-2">Thời gian</th>
               <th class="col-0">Số lượng</th>
               <th>Sửa</th>
               <th>Xoá</th>
          </tr>
     </thead>
     <tbody>

          <?php
        // Bước 1: Định nghĩa các biến và hằng số phân trang
        $limit = 5; // Số bản ghi trên mỗi trang
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1; // Trang hiện tại, mặc định là trang 1
        // Bước 2: Sửa câu truy vấn SQL để lấy chỉ một phần của dữ liệu dựa trên trang hiện tại
           $start = ($current_page - 1) * $limit;
           if (isset($_POST['button-search'])) {
               $key = trim($_POST['input-search']);
               $sql = "SELECT * FROM hoatdong 
               WHERE hoatdong.trangThai <> '0' 
               AND hoatdong.tenHoatDong LIKE '%$key%' LIMIT $start, $limit";
            } else {
               $sql = "SELECT * FROM hoatdong WHERE hoatdong.trangThai <> '0'  LIMIT $start,  $limit";
           }
        $result = mysqli_query($conn, $sql);
        // Bước 3: Tính toán số lượng trang và hiển thị các nút phân trang
        $total_rows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM hoatdong"));
        $total_pages = ceil($total_rows / $limit);
        if ($num = mysqli_num_rows($result) > 0) {
            $stt = $start + 1;
            while ($row = mysqli_fetch_array($result)) {
        ?>
          <tr>
               <td><?php echo $stt++ ?></td>
               <td><?php echo $row['tenHoatDong'] ?></td>
               <td><?php echo $row['diaDiem'] ?></td>
               <td><?php echo $row['moTa'] ?></td>
               <td><?php echo $row['thoiGian'] ?></td>
               <td><?php echo $row['soLuong'] ?></td>
               <td>
                    <a href="?url=edit_active&id=<?php echo $row['hoatDongID'] ?>"
                         class="btn btn-outline-primary">Sửa</a>
               </td>
               <td>
                    <a href="?url=delete_active&id=<?php echo $row['hoatDongID'] ?>"
                         class="btn btn-outline-danger">Xoá</a>
               </td>
          </tr>
          <?php
            }
        } else {
            header("Location:index.php?url=error");
        }
        ?>
     </tbody>
</table>
<nav aria-label="Page navigation">
     <ul class="pagination float-right">
          <?php for ($i=1; $i <=$total_pages; $i++) : ?>
          <li class="page-item <?php echo ($i == $current_page) ? 'active' : ''; ?>">
               <a class="page-link" href="?url=list_active&page=<?php echo $i; ?>">
                    <?php echo $i; ?>
               </a>
          </li>
          <?php endfor; ?>
     </ul>
</nav>
</div>