<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    require "../connect.php";
}
?>
<?php
if (isset($_POST['login_sv'])) {
    $username = $_POST['username'];
    $matkhau = md5($_POST['password']);
    $sql = "SELECT * FROM `sinhvien` WHERE mssv = '$username' AND matKhau = '$matkhau'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    // $_POST['radio_option'] == 3;
    if ($num > 0) {
        $row = mysqli_fetch_array($result);
        $_SESSION['mssv'] = $row['mssv'];
        $_SESSION['hoten'] = $row['ho'] . $row['ten'];
        // echo "Login success";
        header("Location:index.php");

    } else {
        $noti = "Thông tin đăng nhập không hợp lệ!";
    }

}
?>
<div class="container">
    <div class="form-login">
        <h4 class="text-center text-uppercase color-pr">Đăng nhập hệ thống</h4>
        <form action="" autocomplete="off" method="POST">
            <div class="mb-4">
                <label for="username" class="form-label">Tài khoản</label>
                <input
                    type="text"
                    class="form-control"
                    name="username"
                    value=""
                    id="username"
                />
            </div>
            <div class="mb-4">
                <label for="inputPassword" class="form-label">Mật khẩu</label>
                <input
                    type="password"
                    class="form-control"
                    name="password"
                    id="inputPassword"
                />
            </div>
            <div class="d-flex align-items-center justify-content-around">
                <div class="custom-control custom-radio">
                    <div class="d-flex align-items-center">
                        <input
                            class="custom-control-input"
                            type="radio"
                            name="radio_option"
                            id="sinh_vien"
                            checked=""
                            value="sinhvien"
                        />
                        <label class="custom-control-label ml-2" for="sinh_vien">
                            Sinh viên
                        </label>
                    </div>
                </div>
                <div class="custom-control custom-radio">
                    <div class="d-flex align-items-center">
                        <input
                            class="custom-control-input"
                            type="radio"
                            name="radio_option"
                            id="quan_ly"
                            value="quanly"
                        />
                        <label class="custom-control-label ml-2" for="quan_ly">
                            Quản lý
                        </label>
                    </div>
                </div>
                <div class="custom-control custom-radio">
                    <div class="d-flex align-items-center">
                        <input
                            class="custom-control-input"
                            type="radio"
                            name="radio_option"
                            id="quan_tri"
                            value="quantri"
                        />
                        <label class="custom-control-label ml-2" for="quan_tri">
                            Quản trị
                        </label>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <button
                    type="submit"
                    class="btn background-pr text-white mb-4 w-100 p-2 btn-hover"
                    name="login_sv"
                >
                    Đăng nhập
                </button>
            </div>
            <div class="noti text-center">
                <span class="text-danger"> <?php echo isset($noti) ? $noti : ""
                    ?></span>
            </div>
        </form>
    </div>
</div>