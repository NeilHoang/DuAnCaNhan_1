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
        $limit = 3;
        $current_page = isset($_GET['pageNumber']) ? $_GET['pageNumber'] : 1;
        $start = ($current_page - 1) * $limit;
        $total_records = $this->productDB->totalRecordsPage();
        $total_page = ceil($total_records[0]['total'] / $limit);
        if (isset($_POST['sortBy'])) {
            $sortBy = $_POST['sortBy'];
            $products = $this->productDB->sortBy($sortBy);
        } else {
            $products = $this->productDB->getAll($start, $limit);
            $user = $this->user->getUserById($_SESSION['id']);
    
        }
        include "../View/listProduct.php";
        include "../View/paginate.php";
    }
    
    
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $categories = $this->cate->getAll();
            include "../View/createProduct.php";
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $products = new \Model\product\Product($_POST['categories'], $_POST['name'], $_POST['price'],$_POST['time_create'],null);
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
            $product = new \Model\product\Product($_POST['id_categories'], $_POST['name'], $_POST['price'],$_POST['time_create'],$_POST['time_update']);
            $this->productDB->updateProduct($product_id, $product);
            header("Location:../View/homepage.php?page=listProduct");
        }
    }
}

?>