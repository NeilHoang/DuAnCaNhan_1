<form method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="tel" class="form-control" name="name" value="<?php echo $product->getName() ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Price</label>
        <input type="tel" class="form-control" name="price" value="<?php echo $product->getPrice() ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Time Update</label>
        <input type="tel" class="form-control" name="time_update" value="<?php echo date_default_timezone_set('Asia/saigon');
        echo date('H:i:s d-m-Y', time()) ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Categories</label>
        <select name="id_categories">
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category->getId(); ?>" <?php if ($product->getIdCategories() == $category->getId()) echo "selected" ?>><?php echo $category->getName(); ?></option>
            <?php endforeach; ?>        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>