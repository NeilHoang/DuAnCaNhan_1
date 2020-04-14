<?php

use Model\category\Category;
use Model\DB\DBConnection;
class CategoryDB
{
    protected $CategoryConnect;
    
    public function __construct($CategoryConnect)
    {
        $this->CategoryConnect = $CategoryConnect;
    }
    
    public function getAll()
    {
        $sql = "SELECT * FROM categories";
        $stmt = $this->CategoryConnect->query($sql);
        $result = $stmt->fetchAll();
        $arr = [];
        foreach ($result as $item) {
            $category = new Category($item['name']);
            $category->setId($item['id']);
            array_push($arr, $category);
        }
        return $arr;
    }
    
    public function delete($categories_id)
    {
        $sql = "DELETE FROM categories WHERE id = $categories_id";
        $stmt = $this->CategoryConnect->query($sql);
        $stmt->execute();
    }
    
    public function updateCategory($categories_id,$category)
    {
        $name = $category->getName();
        $sql = "UPDATE categories SET name = '$name' WHERE id = '$categories_id'";
        $stmt = $this->CategoryConnect->prepare($sql);
        $stmt->bindparam(':name', $name);
        $stmt->execute();
    }
    
    public function getByCategory($id)
    {
        $sql = "SELECT * FROM categories WHERE id = '$id'";
        $stmt = $this->CategoryConnect->query($sql);
        $result = $stmt->fetch();
        $category = new Category($result['name']);
        return $category;
    }
    
    public function addCategory($category)
    {
        
        $sql = "INSERT INTO categories(name) VALUES (?)";
        $stmt = $this->CategoryConnect->prepare($sql);
        $name = $category->getName();
        $stmt->bindParam(1, $name);
        $stmt->execute();
    }
    
}

?>