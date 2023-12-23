<div class="main-content p-4 p-md-5 pt-5">
    <?php
    if (isset($_SESSION['success_message'])) {
        echo $_SESSION['success_message'];
    } else if (isset($_SESSION['error_message'])) {
        echo $_SESSION['error_message'];
    }
    unset($_SESSION['success_message']);
    unset($_SESSION['error_message']);
    ?>
        <div class=" mb-3 w-50 float-right">
            <form action="#">
                <div class="input-group">
                    <input
                            type="text"
                            class="form-control form-control"
                            placeholder="Tìm kiếm"
                            name="input-search"
                    />
                    <div class="input-group-append background-pr rounded-right">
                        <button
                                type="submit"
                                class="btn btn btn-default text-white btn-hover"
                                name="button-search"
                        >
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <table class="table-responsive table bg-light">
        <tbody>
        <tr>
            <th class="col-1">STT</th>
            <th class="col-3">Tên hoạt động</th>
            <th class="col-3">Địa điểm</th>
            <th class="col-4">Mô tả</th>
            <th class="col-1">Thao tác</th>
        </tr>
        <?php
        $sql = "SELECT * FROM `hoatdong`";
        $result = mysqli_query($conn, $sql);
        if ($num = mysqli_num_rows($result) > 0) {
            $stt = 0;
            while ($row = mysqli_fetch_array($result)) {
                $stt++;
                ?>
                <tr>
                    <td><?php echo $stt ?></td>
                    <td><?php echo $row['tenHoatDong'] ?></td>
                    <td><?php echo $row['diaDiem'] ?></td>
                    <td><?php echo $row['moTa'] ?></td>
                    <td>
                        <a
                                class="text-decoration-none"
                                href="?url=handle_join&id=<?php echo $row['id_hoatDong'] ?>"
                        >Tham gia</a
                        >
                    </td>
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination float-right">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>