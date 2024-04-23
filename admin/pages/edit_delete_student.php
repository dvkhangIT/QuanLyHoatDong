<?php
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $trangThai = 1;
    $sql_select = "SELECT * FROM sinhvien WHERE sinhvien.MSSV = '$id'";
    $query_select = mysqli_query($conn, $sql_select);
    if ($row = mysqli_fetch_assoc($query_select)) {
        $hoTen = $row['hoTen']; 
    } else {
       
        echo "Student not found.";
        exit;
    }

    if(isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
        // Delete the activity
        $sql_delete = "UPDATE sinhvien SET trangThai = $trangThai WHERE sinhvien.MSSV = '$id'";
        $query_delete = mysqli_query($conn, $sql_delete);
        if($query_delete) {
            echo "Sinh viên đã được xóa thành công.";
            header('location:?url=add_student_delete');
        } else {
            echo "Có lỗi xảy ra khi xóa .";
            header('location:?url=add_student_delete');
        }
    } else {
        // Confirmation prompt using JavaScript
        ?>
<script>
if (confirm("Bạn có chắc chắn muốn thêm lại sinh viên '<?php echo $hoTen; ?>'?")) {
     // Proceed with deletion
     window.location.href = "?url=edit_delete_student&id=<?php echo $id; ?>&confirm=yes";
} else {
     // Cancel deletion
     window.location.href = "?url=add_student_delete";
}
</script>
<?php
    }
} else {
    echo "Không tìm thấy sinh viên.";
}
?>