<?php
ob_start();
session_start();

//include "../Model/DBConnection.php";
use Model\DB\DBConnection;

class imageController
{
    protected $imageDB;
    
    public function __construct()
    {
        $db = new DBConnection("mysql:host=127.0.0.1;dbname=Product_Management", "root", "password");
        $this->imageDB = new ImageDB($db->connect());
    }
    
    public function createImages()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include "../View/image/index.php";
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['submit'])) {
                $fileCount = count($_FILES['image']['name']);
                for ($i = 0; $i < $fileCount; $i++) {
                    $fileName =  date("H:i:s") .$_FILES['image']['name'][$i];
                    $file_tmp = $_FILES['image']['tmp_name'][$i];
                    $file_type = $_FILES['image']['type'];
                    $file_ext = strtolower(end(explode('/', $file_type)));
                    $ext = ["jpg", "png", "jpeg"];
                    $images = new \Model\image\Image($_POST[$fileName]);
                    $this->imageDB->createImages($images);
                    if (in_array($file_ext, $ext)) {
                        move_uploaded_file($file_tmp, "../images/image" . $fileName);
                        return $fileName;
                    }                }
            }
        }
        var_dump($images);
    }
}

