<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-12">
            <h1>Thêm mới</h1>
        </div>
        <div class="col-12">
            <form method="POST" enctype="multipart/form-data">
                    <label>Tên loại hàng</label>
                    <input type="file" name="image[]" id="file" multiple>
                    <input type="submit" name="submit" value="Upload">
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
            </form>
        </div>
    </div>
</div>
