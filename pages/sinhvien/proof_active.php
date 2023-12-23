<?php
// Kiểm tra xem form đã được submit chưa
if (isset($_POST['btn_save'])) {
    $id_thamGia = $_POST['id_thamGia'];
    // Kiểm tra có tập tin nào được chọn hay không
    if (isset($_FILES["images"])) {
        // Thư mục lưu trữ ảnh
        $uploadDirectory = "uploads/";

        // Loop qua từng ảnh
        foreach ($_FILES["images"]["tmp_name"] as $key => $tmp_name) {
            // Lấy thông tin về ảnh
            $fileName = $_FILES["images"]["name"][$key];
            $fileTmp = $_FILES["images"]["tmp_name"][$key];
            $fileType = $_FILES["images"]["type"][$key];
            $fileSize = $_FILES["images"]["size"][$key];
            $fileError = $_FILES["images"]["error"][$key];

            // Kiểm tra xem có phải là ảnh không
            $allowedTypes = array("image/jpeg", "image/png");
            if (in_array($fileType, $allowedTypes)) {
                // Đổi tên tập tin để tránh trùng lặp
                $newFileName = time() . "_" . $fileName;
                // Di chuyển tập tin vào thư mục lưu trữ
                move_uploaded_file($fileTmp, $uploadDirectory . $newFileName);
                // Lưu ảnh và db
                $sql = "INSERT INTO minhchung(hinhAnh, id_thamGia) VALUES ( '$newFileName', '$id_thamGia')";
                $query = mysqli_query($conn, $sql);
                // Hiển thị thông báo thành công
//                echo "Upload thành công: $newFileName <br>";
                $flg = true;
            } else {
                // Hiển thị thông báo lỗi nếu tập tin không phải là ảnh
//                echo "Lỗi: Tập tin không phải là ảnh <br>";
                $flg = false;
            }
        }
    }
}
?>
<div class="form-proof">
    <?php
    if (isset($flg)) {
        if ($flg) {
            echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                   <strong>Chúc mừng!</strong> Bạn đã thêm thành công.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
        } elseif ($flg == false) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                   <strong>Lỗi!</strong> Tập tin không phải là ảnh.
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
                $mssv = $_SESSION['mssv'];
                $sql = "SELECT * FROM thamgia,hoatdong WHERE thamgia.id_hoatDong = hoatdong.id_hoatDong AND thamgia.mssv = '$mssv'";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <option value="<?php echo $row['id_thamGia'] ?>"><?php echo $row['tenHoatDong'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-4 mt-4">
            <label for="hinhAnh" class="form-label">Hình ảnh</label>
            <div class="custom-file">
                <input type="file" name="images[]" class="custom-file-input" id="hinhAnh" multiple accept="image/*"/>
                <label
                        class="custom-file-label"
                        for="hinhAnh"
                        data-browse="Tải lên"
                >Chọn ảnh</label
                >
            </div>
        </div>
        <div class="mb-4 text-center">
            <button
                    type="submit"
                    name="btn_save"
                    class="btn background-pr text-white w-100"
            >
                Lưu
            </button>
        </div>
    </form>
</div>
</div>