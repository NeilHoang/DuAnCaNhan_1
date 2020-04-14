<?php
namespace Model\category;
class Category
{
    protected $id;
    protected $name;
    
    public function __construct($name,$id = null)
    {
        $this->name = $name;
        $this->id = $id;
    }
    
   
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }
    
    
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }
}


?>