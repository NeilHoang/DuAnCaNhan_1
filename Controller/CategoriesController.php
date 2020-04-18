<?php
ob_start();
session_start();
include "../Model/DBConnection.php";

use Model\DB\DBConnection;

class CategoriesController
{
    private $categoriesDB;
    public $user;
    
    public function __construct()
    {
        $db = new DBConnection("mysql:host=127.0.0.1;dbname=Product_Management", "root", "password");
        $this->categoriesDB = new CategoryDB($db->connect());
        $this->user = new UserDB($db->connect());
    }
    
    public function getListCategory()
    {
        $categories = $this->categoriesDB->getAll();
        $user = $this->user->getUserById($_SESSION['id']);
        include "../View/listCate.php";
    }
    
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include "../View/createCate.php";
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $category = new \Model\category\Category($_POST['name'],$_POST['time_create'],null);
            $this->categoriesDB->addCategory($category);
            header("Location:../View/homepage.php?page=listCategories");
        }
    }
    
    public function deleteCategory()
    {
        $categories_id = $_GET['id'];
        $this->categoriesDB->delete($categories_id);
        header("Location:../View/homepage.php?page=listCategories");
    }
    
    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $category = $this->categoriesDB->getByCategory($_GET['id']);
            include_once "../View/editCate.php";
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $categories_id = $_GET['id'];
            $categories = new \Model\category\Category($_POST['name'],$_POST['time_create'],$_POST['time_update']);
            $this->categoriesDB->updateCategory($categories_id,$categories);
            header("Location:../View/homepage.php?page=listCategories");
        }
    }
}

?>