<?php
use Model\user\User;
use Model\DB\DBConnection;
session_start();
include "Controller/UserController.php";
include "Model/user/User.php";
include "Model/user/UserDB.php";
include "Model/DBConnection.php";

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
    <link rel="stylesheet" type="text/css" href="css/css.css">
    
</head>
<body>
<div class="login-container">
    <form class="form-login" method="POST">
        <ul class="login-nav">
            <li class="login-nav__item active">
                <a href="#">Sign In</a>
            </li>
            <li class="login-nav__item">
                <a href="View/register.php">Sign Up</a>
            </li>
        </ul>
        <label for="login-input-user" class="login__label">
            Email
        </label>
        <input id="login-input-user" class="login__input" type="text" name="email" required/>
        <label for="login-input-password" class="login__label">
            Password
        </label>
        <input id="login-input-password" class="login__input" type="password" name="password" required/>
        <span style="color: red; margin-left: 15%;"><?php $userController->login(); ?></span>
        <label for="login-sign-up" class="login__label--checkbox">
            <input id="login-sign-up" type="checkbox" class="login__input--checkbox"/>
            Keep me Signed in
        </label>
        <button type="submit" class="login__submit">Sign in</button>
    </form>
    <a href="#" class="login__forgot">Forgot Password?</a>
</div>
</body>
</html>
