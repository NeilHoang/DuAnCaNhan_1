<div class="card col-12 ">
    <div class="row no-gutters">
        <div class="col-md-2">
            <img src="../images/<?php echo $user->getAvatar() ?>" class="card-img" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <p class="card-text"></p>
                <p style="color: #3aa2ff">Welcome to the admin page</p>
            </div>
            <h6  class="ml-4" style="color: black;"> Name :<?php echo $user->getName() ?></h6>
            <h6  class="ml-4" style="color: black;"> Email :<?php echo $user->getEmail() ?></h6>
            <div class="container" >
                <button type="button" class="btn btn-primary "
                        onclick="window.location.href ='homepage.php?page=editUser&name=<?php echo $user->getName()?>'">
                    Edit
                </button>
            </div>
        </div>
    </div>
</div>
