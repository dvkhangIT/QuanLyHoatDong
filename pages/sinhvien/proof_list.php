<?php
if (!isset($_SESSION['tenDangNhap'])) {
  header("Location:index.php?url=login");
}
$mssv = $_SESSION['tenDangNhap'];
$sql = "SELECT hoatdong.tenHoatDong,hoatdong.diaDiem,hoatdong.moTa,minhchung.hinhAnh FROM thamgia,minhchung,hoatdong WHERE hoatdong.hoatDongID = thamgia.hoatDongID AND thamgia.thamGiaID=minhchung.thamGiaID AND thamgia.MSSV = $mssv";
$result = mysqli_query($conn, $sql);
?>
<table class="table-responsive table bg-light">
  <tbody>
    <?php
    if ($num = mysqli_num_rows($result) <= 0) {
      echo '<h4 class="text-center">Bạn chưa có minh chứng!</h4>';
    } else {
      echo '<tr>
      <th class="">STT</th>
      <th class="">Tên hoạt động</th>
      <th class="">Địa điểm</th>
      <th class="">Mô tả</th>
      <th class="">Hình ảnh</th>
    </tr>';
    }
    ?>

    <?php
    if ($num = mysqli_num_rows($result) > 0) {
      $stt = 0;
      while ($row = mysqli_fetch_array($result)) {
        $stt++;
    ?>
        <tr>
          <td><?php echo $stt ?></td>
          <td><?php echo $row['tenHoatDong'] ?></td>
          <td><?php echo $row['diaDiem'] ?></td>
          <td><?php echo $row['moTa'] ?></td>
          <td><img src="uploads/<?php echo $row['hinhAnh'] ?>" width="50"></td>
        </tr>
    <?php
      }
    }
    ?>
  </tbody>
</table>