<form method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Tên Loại Hàng</label>
        <input type="tel" class="form-control" name="name" value="<?php echo $category->getName()?>">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Ngày Cập Nhập</label>
        <input type="tel" class="form-control" name="time_update" value="<?php echo date_default_timezone_set('Asia/saigon');
        echo date('H:i:s d-m-Y', time()) ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>