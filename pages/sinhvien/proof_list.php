<!--SELECT hoatdong.tenHoatDong, hoatdong.diaDiem, hoatdong.moTa, minhchung.hinhAnh FROM minhchung,thamgia,hoatdong WHERE minhchung.id_thamGia = thamgia.id_thamGia AND thamgia.id_hoatDong = hoatdong.id_hoatDong-->

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
                        class="btn btn-default text-white btn-hover"
                        name="button-search"
                >
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </form>
</div>
<table class="table-responsive table bg-light">
    <tbody>
    <tr>
        <th class="col-1">STT</th>
        <th class="col-3">Tên hoạt động</th>
        <th class="col-3">Địa điểm</th>
        <th class="col-3">Mô tả</th>
        <th class="col-2">Hình ảnh</th>
    </tr>
    <tr>
        <td>1</td>
        <td>Hỗ trợ tình nguyện hồ sơ nhập học SV</td>
        <td>Trường Đại học Kỹ thuật - Công nghệ Cần Thơ</td>
        <td>Cộng 2 điểm rèn luyện vào mục 1</td>
        <td>
            <img
                    src="https://images.unsplash.com/photo-1626808642875-0aa545482dfb?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8ZnJlZSUyMGltYWdlc3xlbnwwfHwwfHx8MA%3D%3D"
                    width="80"
                    alt=""
            />
        </td>
    </tr>
    </tbody>
</table>
