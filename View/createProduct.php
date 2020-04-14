<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-12">
            <h1>Thêm mới sản phẩm </h1>
        </div>
        <div class="col-12">
            <form method="POST">
                <div class="form-group">
                    <label>Loại sản phẩm</label>
                    <select class="form-group" name="categories">
                        <?php foreach ($categories as $category) :?>
                            <option value="<?php echo $category->getId()?>"><?php echo $category->getName()?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" placeholder="Nhập tên" required>
                </div>
                <div class="form-group">
                    <label>Giá</label>
                    <input type="text" class="form-control" name="price" placeholder="Nhập tên" required>
                </div>
                <button type="submit" class="btn btn-primary">Thêm mới</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
            </form>
        </div>
    </div>
</div>

<?php //var_dump($category->getId()); ?>