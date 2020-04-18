<?php

namespace Model\product;
class Product
{
    protected $id;
    protected $id_categories;
    protected $name;
    protected $price;
    protected $time_create;
    protected $time_update;
    protected $categories;
    
    public function __construct($id_categories, $name, $price, $time_create, $time_update)
    {
        $this->id_categories = $id_categories;
        $this->name = $name;
        $this->price = $price;
        $this->time_create = $time_create;
        $this->time_update = $time_update;
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
    
    
    public function setTimeCreate($time_create)
    {
        $this->time_create = $time_create;
    }
    
    public function getTimeCreate()
    {
        return $this->time_create;
    }
    
    
    public function setTimeUpdate($time_update)
    {
        $this->time_update = $time_update;
    }
    
    public function getTimeUpdate()
    {
        return $this->time_update;
    }
}

?>