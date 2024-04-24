<?php     
if(isset($_GET['id'])){
     $id_link = $_GET['id'];
     $sql = "SELECT * FROM thamgia, sinhvien, minhchung, lop, hoatdong
     WHERE sinhvien.MSSV = thamgia.MSSV 
     AND thamgia.hoatDongID = hoatdong.hoatDongID
     AND thamgia.thamGiaID = minhchung.thamGiaID 
     AND sinhvien.lopID = lop.lopID
     AND thamgia.hoatDongID = $id_link";
     $result = mysqli_query($conn, $sql);
     $row = mysqli_fetch_array($result);
     
}
?>

<table class="table-responsive table-striped table bg-light">
     <div class="mb-4">
          <a href="?url=list_proof" class="btn btn-outline-primary">Minh chứng</a>
     </div>
     <div class="mb-4">
          <h3 class="text-center">Thông tin hoạt động</h3>
          <div class="row">
               <div class="col-6">
                    <p><strong>Tên hoạt động: </strong><?php echo $row['tenHoatDong'] ?></p>
                    <p><strong>Thời gian: </strong><?php echo $row['thoiGian'] ?></p>
                    <p><strong>Số lượng: </strong><?php echo $row['soLuong'] ?></p>
               </div>
               <div class="col-6">
                    <p><strong>Địa điểm: </strong><?php echo $row['diaDiem'] ?></p>
                    <p><strong>Mô tả: </strong><?php echo $row['moTa'] ?></p>
               </div>
          </div>
          <thead>
               <tr>
                    <th colspan="7" class="text-center">Danh sách minh chứng</th>
               <tr>
                    <th class="">STT</th>
                    <th class="col-1">MSSV</th>
                    <th class="col-3">Họ tên</th>
                    <th class="col-2">Email</th>
                    <th class="col-3">Tên lớp</th>
                    <th class="col-1">Hình ảnh</th>
                    <th class="col-2">Thời gian tải lên</th>
               </tr>
          </thead>
          <tbody>
               <?php
            $stt =  1;
            while ($row = mysqli_fetch_array($result)) {
        ?>
               <tr>
                    <td><?php echo $stt++ ?></td>
                    <td><?php echo $row['MSSV'] ?></td>
                    <td><?php echo $row['hoTen'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['tenLop'] ?></td>
                    <td><img src="../uploads/<?php echo $row['hinhAnh'] ?>" alt="" width="100px"></td>
                    <td><?php echo $row['thoiGian'] ?></td>
               </tr>
               <?php
            }
          
          ?>
          </tbody>
</table>