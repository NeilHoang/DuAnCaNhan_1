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
                <a href="?page=createImage" class="btn btn-outline-info">CREATE</a>
            </div>

            <div class="col-9  float-left">
                <table class="table col-12 table-bordered " style="text-align: center">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                    </tr>
                    </thead>
                    <?php foreach ($images as $key => $image): ?>
                        <tbody style="text-align: center">
                        <tr>
                            <th scope="row"><?php echo ++$key ?></th>
                            <td><img src="../images/image/<?php echo $image->getImages() ?>" class="card-img-top"
                                     alt="..."
                                     style="length 100px;width: 100px"></td>
                            <td><a href="homepage.php?page=deleteImage&id=<?php echo $image->getImageId() ?>"
                                   type="button" class="btn btn-outline-primary"
                                   onclick="return confirm('Bạn có chắc muốn xóa ?')">DELETE</a></td>

                        </tr>
                        </tbody>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>
