<?php

use Model\user\User;
use Model\DB\DBConnection;

session_start();
include "../Controller/UserController.php";
include "../Model/user/User.php";
include "../Model/user/UserDB.php";
include "../Model/DBConnection.php";

$userController = new UserController();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/css.css">

</head>
<body>
<div class="login-container">
    <form class="form-login" method="POST" enctype="multipart/form-data">
        <ul class="login-nav">
            <li class="login-nav__item active">
                <a href="../index.php">Sign In</a>
            </li>
            <li class="login-nav__item">
                <a href="../View/register.php">Sign Up</a>
            </li>
        </ul>
        <label for="login-input-user" class="login__label">
            Name
        </label>
        <input id="login-input-user" class="login__input" type="text" name="name" required/>
        <label for="login-input-user" class="login__label">
            Email
        </label>
        <input id="login-input-user" class="login__input" type="text" name="email" required/>
        <label for="login-input-password" class="login__label">
            Password
        </label>
        <input id="login-input-password" class="login__input" type="password" name="password" required/>
        <label class="login__label">
            Avatar
        </label>
        <input id="login-input-user" class="login__input" type="file" name="avatar[]" multiple required/>
        <span style="color: red; margin-left: 15%;"><?php $userController->register(); ?></span>
        <button type="submit" class="login__submit">Create</button>
    </form>
</div>
</body>
</html>
