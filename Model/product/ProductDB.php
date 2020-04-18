<?php

class ProductDB
{
    protected $connect;
    
    public function __construct($connect)
    {
        $this->connect = $connect;
    }
    
    public function getAll($start, $limit)
    {
        $sql = "SELECT P.*, C.name as categories FROM product as P INNER JOIN categories as C ON P.id_categories = C.id LIMIT $start, $limit";
        $stmt = $this->connect->query($sql);
        $result = $stmt->fetchAll();
        $arr = [];
        foreach ($result as $item) {
            $product = new \Model\product\Product($item['id_categories'], $item['name'], $item['price'], $item['time_create'], $item['time_update']);
            $product->setId($item['id']);
            $product->setCategories($item['categories']);
            array_push($arr, $product);
        }
        return $arr;
    }
    
    public function delete($product_id)
    {
        $sql = "DELETE FROM product WHERE id = $product_id";
        $stmt = $this->connect->query($sql);
        $stmt->execute();
    }
    
    public function updateProduct($product_id, $product)
    {
        $categories_id = $product->getIdCategories();
        $name = $product->getName();
        $price = $product->getPrice();
        $time_update = $product->getTimeUpdate();
        $id = $product->getId();
        $sql = "UPDATE product SET id_categories = ?, name = ?, price = ?, time_update = ? WHERE id = '$product_id'";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindparam(1, $categories_id);
        $stmt->bindparam(2, $name);
        $stmt->bindparam(3, $price);
        $stmt->bindparam(4, $time_update);
        $stmt->execute();
    }
    
    public function getByProduct($id)
    {
        $sql = "SELECT * FROM product WHERE id = '$id'";
        $stmt = $this->connect->query($sql);
        $result = $stmt->fetch();
        $product = new \Model\product\Product($result['id_categories'], $result['name'], $result['price'], $result['time_create'], $result['time_update']);
        return $product;
    }
    
    public function addProduct($product)
    {
        $sql = "INSERT INTO product (id_categories,name, price,time_create,time_update) VALUES (?, ?, ?, ?, ? )";
        $stmt = $this->connect->prepare($sql);
        $id_categories = $product->getIdCategories();
        $name = $product->getName();
        $price = $product->getPrice();
        $time_create = $product->getTimeCreate();
        $time_update = $product->getTimeUpdate();
        $stmt->bindparam(1, $id_categories);
        $stmt->bindParam(2, $name);
        $stmt->bindParam(3, $price);
        $stmt->bindParam(4, $time_create);
        $stmt->bindParam(5, $time_update);
        $stmt->execute();
    }
    
    public function totalRecordsPage()
    {
        $sql = "SELECT COUNT(id) as total FROM `product`";
        $stmt = $this->connect->query($sql);
        return $stmt->fetchAll();
    }
    
    public function sortBy($sortBy)
    {
        $sql = "SELECT * FROM product ORDER BY price $sortBy";
        $stmt = $this->connect->query($sql);
        $result = $stmt->fetchAll();
        return $this->createProductFromData($result);
    }
    
}

?>