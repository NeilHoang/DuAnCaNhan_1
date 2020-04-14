<?php

class ProductDB
{
    protected $connect;
    
    public function __construct($connect)
    {
        $this->connect = $connect;
    }
    
    public function getAll()
    {
        $sql = "SELECT P.*, C.name as categories FROM product as P INNER JOIN categories as C ON P.id_categories = C.id";
        $stmt = $this->connect->query($sql);
        $result = $stmt->fetchAll();
        $arr = [];
        foreach ($result as $item) {
            $product = new \Model\product\Product($item['id_categories'], $item['name'], $item['price']);
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
    
    public function updateProduct($product_id,$product)
    {
        $categories_id = $product->getIdCategories();
        $name = $product->getName();
        $price = $product->getPrice();
        $id = $product->getId();
        $sql = "UPDATE product SET id_categories = ?, name = ?, price = ? WHERE id = '$product_id'";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindparam(1, $categories_id);
        $stmt->bindparam(2, $name);
        $stmt->bindparam(3, $price);
        $stmt->execute();
    }
    
    public function getByProduct($id)
    {
        $sql = "SELECT * FROM product WHERE id = '$id'";
        $stmt = $this->connect->query($sql);
        $result = $stmt->fetch();
        $product = new \Model\product\Product($result['id_categories'], $result['name'], $result['price']);
        return $product;
    }
    
    public function addProduct($product)
    {
        $sql = "INSERT INTO product (id_categories,name, price) VALUES (?, ?, ?)";
        $stmt = $this->connect->prepare($sql);
        $id_categories = $product->getIdCategories();
        $name = $product->getName();
        $price = $product->getPrice();
        $stmt->bindparam(1,$id_categories);
        $stmt->bindParam(2, $name);
        $stmt->bindParam(3, $price);
        $stmt->execute();
    }
}

?>