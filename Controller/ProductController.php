<?php
ob_start();
//
//include "../Model/product/ProductDB.php";
//include "../Model/product/Product.php";
//include "../Model/DBConnection.php";
session_start();

use Model\DB\DBConnection;

class ProductController
{
    protected $productDB;
    protected $cate;
    protected $user;
    
    public function __construct()
    {
        $db = new \Model\DB\DBConnection("mysql:host=127.0.0.1;dbname=Product_Management", "root", "password");
        $this->productDB = new ProductDB($db->connect());
        $this->cate = new CategoryDB($db->connect());
        $this->user = new UserDB($db->connect());
    }
    
    public function getListProduct()
    {
        $products = $this->productDB->getAll();
        $user = $this->user->getUserById($_SESSION['id']);
        include "../View/listProduct.php";
    }
    
    
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $categories = $this->cate->getAll();
            include "../View/createProduct.php";
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $products = new \Model\product\Product($_POST['categories'], $_POST['name'], $_POST['price']);
            $this->productDB->addProduct($products);
            header("Location:../View/homepage.php?page=listProduct");
        }
    }
    
    public function deleteProduct()
    {
        $product_id = $_GET['id'];
        $this->productDB->delete($product_id);
        header("Location:../View/homepage.php?page=listProduct");
    }
    
    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $categories = $this->cate->getAll();
            $product = $this->productDB->getByProduct($_GET['id']);
            include_once "../View/editProduct.php";
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $product_id = $_GET['id'];
            $product = new \Model\product\Product($_POST['id_categories'], $_POST['name'], $_POST['price']);
            $this->productDB->updateProduct($product_id, $product);
            header("Location:../View/homepage.php?page=listProduct");
        }
    }
}

?>