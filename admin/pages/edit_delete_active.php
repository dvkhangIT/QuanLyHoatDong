<?php
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $trangThai = 1;
    $sql_select = "SELECT * FROM hoatdong WHERE hoatdong.hoatDongID = '$id'";
    $query_select = mysqli_query($conn, $sql_select);
    if ($row = mysqli_fetch_assoc($query_select)) {
        $tenHoatDong = $row['tenHoatDong']; // Assuming 'tenHoatDong' is the activity name column
    } else {
        // Handle error if activity not found
        echo "Activity not found.";
        exit;
    }

    if(isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
        // Delete the activity
        $sql_delete = "UPDATE hoatdong SET trangThai = $trangThai WHERE hoatdong.hoatDongID = '$id'";
        $query_delete = mysqli_query($conn, $sql_delete);
        if($query_delete) {
            echo "Hoạt động đã được xóa thành công.";
            header('location:?url=add_active_delete');
        } else {
            echo "Có lỗi xảy ra khi xóa hoạt động.";
            header('location:?url=add_active_delete');
        }
    } else {
        // Confirmation prompt using JavaScript
        ?>
<script>
if (confirm("Bạn có chắc chắn muốn thêm lại hoạt động '<?php echo $tenHoatDong; ?>'?")) {
     // Proceed with deletion
     window.location.href = "?url=edit_delete_active&id=<?php echo $id; ?>&confirm=yes";
} else {
     // Cancel deletion
     window.location.href = "?url=add_active_delete";
}
</script>
<?php
    }
} else {
    echo "Không tìm thấy hoạt động.";
}
?>