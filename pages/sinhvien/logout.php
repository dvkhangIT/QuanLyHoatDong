<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<?php
if (isset($_SESSION['tenDangNhap']) && isset($_SESSION['hoTen'])) {
    unset($_SESSION['tenDangNhap']);
    unset($_SESSION['hoTen']);
}
header("Location:index.php");
