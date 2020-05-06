<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-12">
            <h1>Thêm mới sản phẩm </h1>
        </div>
        <div class="col-12">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Loại sản phẩm</label>
                    <select class="form-group" name="categories">
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?php echo $category->getId() ?>"><?php echo $category->getName() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" placeholder="Nhập tên" required>
                </div>
                <div class="form-group">
                    <label>Giá</label>
                    <input type="text" class="form-control" name="price" placeholder="Nhập giá" required>
                </div>
                <div class="form-group">
                    <label>Ngày tạo</label>
                    <input type="text" class="form-control" name="time_create" placeholder="Nhập tên"
                           value="<?php echo date_default_timezone_set('Asia/saigon');
                           echo date('H:i:s d-m-Y', time()) ?>" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Thêm mới</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
            </form>
        </div>
    </div>
</div>
