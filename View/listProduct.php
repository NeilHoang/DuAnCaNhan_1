<div class="container">
    <div class="col-12">
        <div class="col-12 mt-3">
            <div class="col-3  float-left">
                <div class="mb-4">
                    <div class="card h-100">
                        <img src="../images/<?php echo $user->getAvatar() ?>" class="card-img-top" alt="..."
                             style="width: 180px">
                        <p></p>
                        <div class="card-body">
                            <h6 class="card-title"><?php echo $user->getName() ?></h6>
                        </div>
                    </div>
                </div>
                <a href="homepage.php?page=createProduct" class="btn btn-outline-info">CREATE</a>
            </div>

            <div class="col-9  float-left">
                <table class="table col-12 table-bordered ">
                    <thead>
                    <tr style="text-align: center">
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <?php foreach ($products as $key => $product): ?>
                        <tbody style="text-align: center">
                        <tr>
                            <th scope="row"><?php echo ++$key ?></th>
                            <td><?php echo $product->getCategories() ?></td>
                            <td><?php echo mb_strtoupper($product->getName()) ?></td>
                            <td><?php echo $product->getPrice() ?></td>
                            <td><a href="homepage.php?page=deleteProduct&id=<?php echo $product->getId()?>" type="button" class="btn btn-outline-primary" onclick="return confirm('Bạn có chắc muốn xóa ?')">DELETE</a><a href="homepage.php?page=editProduct&id=<?php echo $product->getId()?>"
                                                                                                      type="button"
                                                                                                      class="btn btn-outline-danger ml-4">EDIT</a>
                            </td>
                        </tr>
                        </tbody>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>
