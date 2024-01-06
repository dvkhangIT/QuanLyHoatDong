<?php
if (isset($_POST['button-search'])) {
    $key = $_POST['input-search'];
    $sql = "SELECT * FROM sinhvien, thamgia, hoatdong 
    WHERE sinhvien.mssv = thamgia.mssv 
    AND thamgia.id_hoatDong = hoatdong.id_hoatDong 
    AND sinhvien.mssv = 21000123 AND hoatdong.tenHoatDong LIKE '%$key%'";
    $result = mysqli_query($conn, $sql);
    if ($num = mysqli_num_rows($result) > 0) {
        $stt = 0;
        while ($row = mysqli_fetch_array($result)) {
            $stt++;
            echo "
            ";
        }
    }
}
