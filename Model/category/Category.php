<?php

namespace Model\category;
class Category
{
    protected $id;
    protected $name;
    protected $time_create;
    protected $time_update;
    
    public function __construct($name, $time_create, $time_update)
    {
        $this->name = $name;
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
    
    
    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function getName()
    {
        return $this->name;
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