<?php
     $sql = "SELECT * FROM hoatdong, sinhvien, thamgia, lop, khoa, khoahoc, minhchung
     WHERE hoatdong.hoatDongID = thamgia.hoatDongID 
     AND thamgia.MSSV = sinhvien.MSSV 
     AND sinhvien.lopID = lop.lopID
     AND lop.khoaID = khoa.khoaID 
     AND khoa.khoaHocID = khoahoc.khoaHocID
     AND minhchung.thamGiaID = thamgia.thamGiaID";
     $query = mysqli_query($conn, $sql);
?>
<div class="mb-3 w-50 float-right">
     <form action="#">
          <div class="input-group">
               <input type="text" class="form-control form-control" placeholder="Tìm kiếm" name="input-search" />
               <div class="input-group-append background-pr rounded-right">
                    <button type="submit" class="btn btn-default text-white btn-hover" name="button-search">
                         <i class="fa fa-search"></i>
                    </button>
               </div>
          </div>
     </form>
</div>
<table class="table-responsive table bg-light">
     <tbody>
          <tr>
               <th class="">STT</th>
               <th class="">MSSV</th>
               <th class="">Họ tên</th>
               <th class="">Tên hoạt động</th>
               <th class="">Thời gian</th>
               <th class="">Minh chứng</th>
               <th class="">Lớp</th>
               <th class="">Khoá học</th>
          </tr>
          <?php
        if ($num = mysqli_num_rows($query) > 0) {
            $stt = 0;
            while ($row = mysqli_fetch_array($query)) {
                $stt++;
        ?>
          <tr>
               <td><?php echo $stt ?></td>
               <td><?php echo $row['MSSV'] ?></td>
               <td><?php echo $row['hoTen'] ?></td>
               <td><?php echo $row['tenHoatDong'] ?></td>
               <td><?php echo $row['thoiGian'] ?></td>
               <td><img src="uploads/<?php echo $row['hinhAnh'] ?>" width="100"></td>
               <td><?php echo $row['tenLop'] ?></td>
               <td><?php echo $row['khoaHoc'] ?></td>
          </tr>
          <?php
            }
        }
        ?>
     </tbody>
</table>