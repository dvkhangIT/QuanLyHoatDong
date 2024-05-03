<?php
if (!isset($_SESSION['tenDangNhap'])) {
     header("Location:../index.php?url=login");
 }
?>
<div class="mb-3 w-50 float-right">
     <form action="" method="post">
          <div class="input-group">
               <input type="text" class="form-control form-control" placeholder="Nhập tên hoạt động...?"
                    name="input-search" />
               <div class="input-group-append background-pr rounded-right">
                    <button type="submit" class="btn btn-default text-white btn-hover" name="button-search">
                         <i class="fa fa-search"></i>
                    </button>
               </div>
          </div>
     </form>
</div>
<table class="table-responsive table-striped table bg-light">
     <thead>
          <tr>
               <th colspan="7" class="text-center">Danh sách minh chứng</th>
          <tr>
               <th class="col-1">STT</th>
               <th class="col-4">Tên hoạt động</th>
               <th class="col-2">Thời gian</th>
               <th class="col-1">Số lượng</th>
               <!-- <th class="col-3">Mô tả</th> -->
               <th class="col-3">Địa điểm</th>

          </tr>
     </thead>
     <tbody>
          <?php
        $limit = 5; 
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1; 
        $start = ($current_page - 1) * $limit;
        if (isset($_POST['button-search'])) {
            $key = trim($_POST['input-search']);
            $sql = "SELECT * FROM hoatdong 
            WHERE tenHoatDong LIKE '%$key%'";
         } else {
            $sql = "SELECT * FROM hoatdong
            LIMIT $start,  $limit";
        }
        $result = mysqli_query($conn, $sql);
        $total_rows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM hoatdong "));
        $total_pages = ceil($total_rows / $limit);
        if ($num = mysqli_num_rows($result) > 0) {
            $stt = $start + 1;
            while ($row = mysqli_fetch_array($result)) {
        ?>
          <tr>
               <td><?php echo $stt++ ?></td>
               <td><?php echo $row['tenHoatDong'] ?></td>
               <td><?php echo $row['thoiGian'] ?></td>
               <td><?php echo $row['soLuong'] ?></td>
               <!-- <td>< ?php echo $row['moTa'] ?></td> -->
               <td><?php echo $row['diaDiem'] ?></td>
               <td>
                    <a class="text-decoration-none"
                         href="?url=list_handle_proof&id=<?php echo $row['hoatDongID'] ?>">Xem</a>
               </td>

          </tr>
          <?php
            }
        }
        ?>
     </tbody>
</table>
<nav aria-label="Page navigation">
     <ul class="pagination float-right">
          <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
          <li class="page-item <?php echo ($i == $current_page) ? 'active' : ''; ?>">
               <a class="page-link" href="?url=list_proof&page=<?php echo $i; ?>">
                    <?php echo $i; ?>
               </a>
          </li>
          <?php endfor; ?>
     </ul>
</nav>