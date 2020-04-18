<?php

use Model\DB\DBConnection;

ob_start();
session_start();

//include "../Model/user/User.php";
//include "../Model/user/UserDB.php";
//include "../Model/DBConnection.php";
class UserController
{
    private $userDB;
    
    public function __construct()
    {
        $db = new DBConnection("mysql:host=127.0.0.1;dbname=Product_Management", "root", "password");
        $this->userDB = new UserDB($db->connect());
    }
    
    
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $users = $this->userDB->getListUsers();
            $email = $_POST['email'];
            $password = $_POST['password'];
            foreach ($users as $item) {
                if ($email == $item->getEmail() && $password == $item->getPassword()) {
                    $_SESSION["id"] = $item->getId();
                    $_SESSION["name"] = $item->getName();
                    $_SESSION["email"] = $item->getEmail();
                    $name = $item->getName();
                    header("Location:View/homepage.php?name=$name");
                    break;
                }
            }
            return false;
        }
        
    }
    
    public function logout()
    {
        session_destroy();
        header("Location:../index.php");
    }
    
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include "../View/register.php";
        } else {
            $users = $this->userDB->getListUsers();
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $avatar = $this->userDB->upload();
            $user = new \Model\user\User($name, $email, $password, $avatar);
            foreach ($users as $item) {
                if ($name === $item->getName() || $email === $item->getEmail()) {
                    echo "<span style='color: red'>Tài khoản đã tồn tại</span>";
                    return false;
                }
            }
            $this->userDB->createUser($user);
        }
    }
    
    
    public function getUser()
    {
        $name = $_GET['name'];
        $user =  $this->userDB->getName($name);
        include "../View/homepage.php";
    }
    
    public function getProfile()
    {
        $name = $_GET['name'];
        $user = $this->userDB->getName($name);
        include "../View/profile.php";
    }
    
    
    public function editUser()
    {
        $name = $_SESSION['name'];
        $userByName = $this->userDB->getName($name);
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include_once "../View/editUser.php";
        } else {
            if ($_FILES['avatar']['name']) {
                unlink("../../images/" . $userByName->getAvatar());
                $avatar = $this->userDB->upload();
                $_SESSION['avatar'] = $avatar;
            } else {
                $avatar = $userByName->getAvatar();
            }
            $users = new \Model\user\User($_POST['name'], $_POST['email'], null, $avatar);
            var_dump($_POST);
            $this->userDB->updateUser($users);
            header("Location:homepage.php?name=$name");
            
        }
    }
}

?>