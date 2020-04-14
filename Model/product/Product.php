<?php
namespace Model\product;
class Product
{
    protected $id;
    protected $id_categories;
    protected $name;
    protected $price;
    protected $categories;
    
    public function __construct($id_categories, $name, $price)
    {
        $this->id_categories = $id_categories;
        $this->name = $name;
        $this->price = $price;
    }
    
   
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }
    
    
    public function setIdCategories($id_categories)
    {
        $this->id_categories = $id_categories;
    }
    public function getIdCategories()
    {
        return $this->id_categories;
    }
    
    
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }
    
   
    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function getPrice()
    {
        return $this->price;
    }
    
   
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }
    public function getCategories()
    {
        return $this->categories;
    }
}

?>