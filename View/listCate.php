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
                <a href="?page=createCate" class="btn btn-outline-info">CREATE</a>
            </div>

            <div class="col-9  float-left">
                <table class="table col-12 table-bordered " style="text-align: center">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Time Create</th>
                        <th scope="col">Time Update</th>
                        <th colspan="2">Action</th>
                    </tr>
                    </thead>
                    <?php foreach ($categories as $key => $category): ?>
                        <tbody style="text-align: center">
                        <tr>
                            <th scope="row"><?php echo ++$key ?></th>
                            <td><?php echo mb_strtoupper($category->getName()) ?></td>
                            <td><?php echo mb_strtoupper($category->getTimeCreate()) ?></td>
                            <td><?php echo mb_strtoupper($category->getTimeUpdate()) ?></td>
                            <td><a href="homepage.php?page=deleteCategories&id=<?php echo $category->getId() ?>"
                                   type="button" class="btn btn-outline-danger"
                                   onclick="return confirm('Bạn có chắc chắn muốn xóa')">DELETE</a>
                            </td>
                            <td><a href="homepage.php?page=editCategories&id=<?php echo $category->getId() ?>"
                                   type="button" class="ml-4 btn btn-outline-primary">EDIT</a></td>
                        </tr>
                        </tbody>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>
