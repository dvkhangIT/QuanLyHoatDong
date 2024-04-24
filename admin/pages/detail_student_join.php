<?php     
if(isset($_GET['id'])){
     $id_link = $_GET['id'];
     $sql = "SELECT * FROM thamgia, sinhvien, hoatdong
     WHERE sinhvien.MSSV = thamgia.MSSV 
     AND thamgia.hoatDongID = hoatdong.hoatDongID
     AND sinhvien.MSSV = $id_link";
     $result = mysqli_query($conn, $sql);
     $row = mysqli_fetch_array($result);
     
}
?>

<table class="table-responsive table-striped table bg-light">
     <div class="mb-4">
          <a href="?url=list_student_join" class="btn btn-outline-primary">Sinh viên tham gia</a>
     </div>
     <div class="mb-4">
          <h3 class="text-center">Thông tin sinh viên tham gia</h3>
          <div class="row">
               <div class="col-6">
                    <p><strong>MSSV: </strong><?php echo $row['MSSV'] ?></p>
                    <p><strong>Họ tên: </strong><?php echo $row['hoTen'] ?></p>

               </div>
               <div class="col-6">
                    <p><strong>Email: </strong><?php echo $row['email'] ?></p>
                    <p><strong>Số điện thoại: </strong><?php echo $row['soDienThoai'] ?></p>
               </div>
          </div>
     </div>
     <thead>
          <tr>
               <th colspan="7" class="text-center">Danh sách hoạt động tham gia</th>
          <tr>
               <th class="col-1">STT</th>
               <th class="col-4">Tên hoạt động</th>
               <th class="col-1">Thời gian</th>
               <th class="col-4">Mô tả</th>
               <th class="col-1">Số lượng</th>
          </tr>
     </thead>
     <tbody>
          <?php
            $stt =  1;
            while ($row = mysqli_fetch_array($result)) {
        ?>
          <tr>
               <td><?php echo $stt++ ?></td>
               <td><?php echo $row['tenHoatDong'] ?></td>
               <td><?php echo $row['thoiGian'] ?></td>
               <td><?php echo $row['moTa'] ?></td>
               <td><?php echo $row['soLuong'] ?></td>

          </tr>
          <?php
            }
          
          ?>
     </tbody>
</table>