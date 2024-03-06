<?php
if (!isset($_SESSION['tenDangNhap'])) {
  echo ' <script> location.replace("index.php?url=login"); </script>';
}
if (isset($_POST['btn_save'])) {
  $id_thamGia = $_POST['id_thamGia'];
  $uploadDir = 'uploads/';
  if (isset($_FILES['images']['name']) && !empty($_FILES['images']['name'])) {
    $name = $_FILES['images']['name'];
    $targetFile = $uploadDir . time() . '_' . $_FILES['images']['name'];
    if (move_uploaded_file($_FILES['images']['tmp_name'], $targetFile)) {
      $newFileName = time() . '_' . $_FILES['images']['name'];
      $minhChung = "SELECT * FROM `minhchung` WHERE thamGiaID = $id_thamGia";
      $result = mysqli_query($conn, $minhChung);
      $row = mysqli_fetch_array($result);
      if (empty($row['thamGiaID']) || $id_thamGia != $row['thamGiaID']) {
        $sql = "INSERT INTO minhchung(hinhAnh, thamGiaID) VALUES ( '$newFileName', '$id_thamGia')";
        $query = mysqli_query($conn, $sql);
        $flg = 1;
      } else {
        $flg = 2;
      }
    }
  } else {
    $flg = 3;
    // echo 'Loi';
  }
}
?>
<?php
$mssv = $_SESSION['tenDangNhap'];
$sql = "SELECT * FROM thamgia,hoatdong WHERE thamgia.hoatDongID = hoatdong.hoatDongID AND thamgia.mssv = '$mssv'";
$result = mysqli_query($conn, $sql);
if ($num = mysqli_fetch_row($result) > 0) {
?>
  <div class="form-proof">
    <?php
    if (isset($flg)) {
      if ($flg == 1) {
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                   <strong>Chúc mừng!</strong> Bạn đã thêm thành công.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
      } elseif ($flg == 3) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                   <strong>Lỗi!</strong> Bạn chưa chọn ảnh.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
      } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                   <strong>Lỗi!</strong> Minh chứng đã tồn tại.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
      }
    }
    ?>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="mb-4 mt-4">
        <label for="id_thamGia" class="form-label">Tên hoạt động</label>
        <select class="custom-select" id="id_thamGia" name="id_thamGia">
          <<?php
            // $mssv = $_SESSION['tenDangNhap'];
            $sql = "SELECT * FROM thamgia,hoatdong WHERE thamgia.hoatDongID = hoatdong.hoatDongID AND thamgia.mssv = '$mssv'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
            ?> <option value="<?php echo $row['thamGiaID'] ?>"><?php echo $row['tenHoatDong'] ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="mb-4 mt-4">
        <label class="form-label">Hình ảnh</label>
        <div class="custom-file">
          <input type="file" name="images" class="custom-file-input" id="hinhAnh" onchange="previewImage(event)" />
          <label class="custom-file-label" for="hinhAnh" data-browse="Tải lên">Chọn ảnh</label>
        </div>
        <label for="hinhAnh" class="preview">
          <div class="wrap-image ">
            <img onclick="previewImage(event)" id="image-preview" src="images/img-upload.png" alt="image-upload">
          </div>
        </label>
        <div class="icon-trash" id="deleteIcon">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
          </svg>
        </div>
      </div>
      <div class="mb-4 text-center">
        <button type="submit" name="btn_save" class="btn background-pr text-white w-100">
          Lưu
        </button>
      </div>
    </form>
  <?php
} else {
  echo ' <script> location.replace("index.php?url=error"); </script>';
}
  ?>
  </div>
  </div>