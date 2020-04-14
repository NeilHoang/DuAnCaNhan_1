<?php

use Model\user\User;

use Model\DB\DBConnection;

class UserDB
{
    private $userDBConnect;
    
    public function __construct($userDBConnect)
    {
        $this->userDBConnect = $userDBConnect;
    }
    
    public function getName($name)
    {
        $sql = "SELECT * FROM users WHERE name = '$name'";
        $stmt = $this->userDBConnect->query($sql);
        $result = $stmt->fetch();
        $user = new User($result['name'], $result['email'], $result['password'], $result['avatar']);
        $user->setId($result['id']);
        return $user;
    }
    
    public function updateUser($user)
    {
        $name = $user->getName();
        $email = $user->getEmail();
        $avatar = $user->getAvatar();
        $sql = "UPDATE users SET email = ?, avatar = ? WHERE name = ?";
        $stmt = $this->userDBConnect->prepare($sql);
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $avatar);
        $stmt->bindParam(3, $name);
        $stmt->execute();
        
    }
    
    public function getListUsers()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->userDBConnect->query($sql);
        $result = $stmt->fetchAll();
        $arr = [];
        foreach ($result as $item) {
            $user = new User($item['name'], $item['email'], $item['password'], $item['avatar']);
            $user->setId($item['id']);
            array_push($arr, $user);
        }
        return $arr;
    }
    
    public function createUser($user)
    {
        $name = $user->getName();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $avatar = $user->getAvatar();
        $sql = "INSERT INTO users(name,email,password, avatar) VALUES ('$name','$email','$password','$avatar')";
        $this->userDBConnect->query($sql);
    }
    
    public function upload()
    {
        $file_name = date("H:i:s") . $_FILES['avatar']['name'];
        $file_tmp = $_FILES['avatar']['tmp_name'];
        $file_type = $_FILES['avatar']['type'];
        $file_ext = strtolower(end(explode('/', $file_type)));
        $ext = ["jpg", "png", "jpeg"];
        if (in_array($file_ext, $ext)) {
            move_uploaded_file($file_tmp, "../images/" . $file_name);
            return $file_name;
        }
    }
    
    public function getUserById($id){
        $sql = "SELECT * FROM users WHERE id = '$id'";
        $stmt = $this->userDBConnect->query($sql);
        $result = $stmt->fetch();
        $user = new User($result['name'], $result['email'], $result['password'], $result['avatar']);
        return $user;
    }
}

?>