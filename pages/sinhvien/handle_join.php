<?php
if (isset($_GET['id'])) {
  $id_link = $_GET['id'];
  $mssv = $_SESSION['tenDangNhap'];

  // Kiểm tra số lượng người tham gia
  $sql_count = "SELECT COUNT(*) AS slThamGia FROM thamgia WHERE hoatDongID = $id_link";
  $result_count = mysqli_query($conn, $sql_count);
  $row_count = mysqli_fetch_assoc($result_count);
  $slThamGia = $row_count['slThamGia'];

  $sql_hoatDong = "SELECT `soLuong` FROM `hoatdong` WHERE hoatDongID = $id_link";
  $result_hoatDong = mysqli_query($conn, $sql_hoatDong);
  $row_hoatDong = mysqli_fetch_assoc($result_hoatDong);
  $soLuong = $row_hoatDong['soLuong'];

  if ($slThamGia >= $soLuong) {
    $_SESSION['error_message'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Lỗi!</strong> Đã đủ số lượng tham gia.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
  } else {
    $sql_check_participation = "SELECT COUNT(*) AS count FROM thamgia WHERE  hoatDongID = $id_link";
    $result_check_participation = mysqli_query($conn, $sql_check_participation);
    $row_check_participation = mysqli_fetch_assoc($result_check_participation);
    $count = $row_check_participation['count'];

    if ($count == 0) {
      $sql_insert = "INSERT INTO thamgia(MSSV, hoatDongID) VALUES ('$mssv', '$id_link')";
      $result_insert = mysqli_query($conn, $sql_insert);
      $_SESSION['success_message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Chúc mừng!</strong> Bạn đã tham gia thành công.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
    } else {
      $_SESSION['error_message'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Lỗi!</strong> Bạn đã tham gia hoạt động này.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
    }
  }
  echo '<script>location.replace("index.php?url=list_active");</script>';
}
