<?php
ob_start();
session_start();

//include "../Model/DBConnection.php";
use Model\DB\DBConnection;

class imageController
{
    protected $imageDB;
    public $user;
    
    
    public function __construct()
    {
        $db = new DBConnection("mysql:host=127.0.0.1;dbname=Product_Management", "root", "password");
        $this->imageDB = new ImageDB($db->connect());
        $this->user = new UserDB($db->connect());
        
    }
    
    public function createImages()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include "../View/image/index.php";
            include "../View/createProduct.php";
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['submit'])) {
                $fileCount = count($_FILES['image']['name']);
                for ($i = 0; $i < $fileCount; $i++) {
                    $fileName = $_FILES['image']['name'][$i];
                    $file_tmp = $_FILES['image']['tmp_name'][$i];
                    $file_type = $_FILES['image']['type'][$i];
                    $array = explode('.', $_FILES['image']['name'][$i]);
                    $file_ext = strtolower(end($array));
                    $ext = ["jpg", "png", "jpeg"];
                    if (in_array($file_ext, $ext)) {
                        move_uploaded_file($file_tmp, "../images/image/" . $fileName);
                    } else {
                        return $fileName;
                    }
                    $images = new \Model\image\Image($fileName);
                    $this->imageDB->createImages($images);
                }
            }
            header("Location:../View/homepage.php?page=getListImage");
        }
    }
    
    public function getImage()
    {
        $images = $this->imageDB->getAll();
        $user = $this->user->getUserById($_SESSION['id']);
        include "../View/listImage.php";
    }
    
    public function deleteImage()
    {
        $image_id = $_GET['id'];
        $this->imageDB->delete($image_id);
        header("Location:../View/homepage.php?page=getListImage");
    }
}

