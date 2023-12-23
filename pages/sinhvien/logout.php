<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<?php
if (isset($_SESSION['mssv']) && isset($_SESSION['hoten'])) {
    unset($_SESSION['mssv']);
    unset($_SESSION['hoten']);
}
header("Location:index.php");
