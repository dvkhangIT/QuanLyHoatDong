<?php
if (isset($_GET['id'])) {
    $id_hoatDong = $_GET['id'];
    $mssv = $_SESSION['mssv'];
    $sql = "SELECT `mssv`, `id_hoatDong` FROM `thamgia` WHERE mssv = '$mssv' AND id_hoatDong = '$id_hoatDong'";
    $result = mysqli_query($conn, $sql);
    if ($num = mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        if ($id_hoatDong != $row['id_hoatDong'] && $mssv != $row['mssv']) {
            $sql_insert = "INSERT INTO thamgia(mssv, id_hoatDong)VALUES ( '$mssv', '$id_hoatDong')";
            $result = mysqli_query($conn, $sql_insert);
            $_SESSION['success_message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Chúc mừng!</strong> Bạn đã tham gia thành công.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
</button>
            </div>';
        } else {
            $_SESSION['error_message'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Lỗi!</strong> Hoạt động đã tồn tại.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
</button>
            </div>';
        }
    }
    header('location:index.php?url=list_active');
}
