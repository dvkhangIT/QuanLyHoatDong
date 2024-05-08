<?php
if (!isset($_SESSION['tenDangNhap'])) {
  header("Location:../index.php?url=login");
}

if (isset($_POST['update'])) {
  $newPassword = md5($_POST['newPassword']);
  $confirmPassword = md5($_POST['confirmPassword']);
  $tenDangNhap = $_SESSION['tenDangNhap'];
  $sql = "SELECT * FROM `taikhoan` WHERE tenDangNhap = 'admin'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  $taiKhoanID = $row['taiKhoanID'];
  $oldPassword = $row['matKhau'];
  if ($newPassword == $confirmPassword) {
    if ($newPassword != $oldPassword) {

      $sql = "UPDATE `taikhoan` SET `matKhau` = '$newPassword' WHERE `taikhoan`.`taiKhoanID` = $taiKhoanID";
      $result = mysqli_query($conn, $sql);
      $flg = true;
      $noti = "Đổi mật khẩu thành công!";
    } else {
      $noti = "Mật khẩu này bạn đang dùng!";
    }
  } else if ($newPassword != $confirmPassword) {
    $noti = "Mật khẩu không khớp!";
  }
}
?> <div class="container">
  <div class="form-login">
    <h4 class="text-center text-uppercase color-pr">Đổi mật khẩu</h4>
    <form action="" autocomplete="off" method="POST">
      <div class="mb-4">
        <label for="username" class="form-label">Mật khẩu mới</label>
        <input type="password" class="form-control" name="newPassword" value="" id="username" />
      </div>
      <div class="mb-4">
        <label for="inputPassword" class="form-label">Xác thực mật khẩu</label>
        <input type="password" class="form-control" name="confirmPassword" id="inputPassword" />
      </div>
      <div class="mt-3">
        <button type="submit" class="btn background-pr text-white mb-4 w-100 p-2 btn-hover" name="update">
          Cập nhật
        </button>
      </div>
      <div class="noti text-center">
        <span class="<?php echo isset($flg) ? "text-success" : "text-danger" ?>"> <?php echo isset($noti) ? $noti : ""
                                                                                  ?></span>
      </div>
    </form>
  </div>
</div>