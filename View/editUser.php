<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="tel" class="form-control" name="name" value="<?php echo $userByName->getName()?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Email</label>
        <input type="email" class="form-control" name="email" value="<?php echo $userByName->getEmail()?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Avatar</label>
        <div>
            <img src="../images/<?php echo $userByName->getAvatar()?>" alt="" style="width: 100px">
            <input type="file" class="form-control" name="avatar">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>