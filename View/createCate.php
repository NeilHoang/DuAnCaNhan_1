<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-12">
            <h1>Thêm mới</h1>
        </div>
        <div class="col-12">
            <form method="post">
                <div class="form-group">
                    <label>Tên loại hàng</label>
                    <input type="text" class="form-control" name="name"  placeholder="Nhập tên" required>
                </div>
                <div class="form-group">
                    <label>Ngày tạo</label>
                    <input type="text" class="form-control" name="time_create"
                           value="<?php echo date_default_timezone_set('Asia/saigon');
                           echo date('H:i:s d-m-Y', time()) ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Thêm mới</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
            </form>
        </div>
    </div>
</div>
