<?php

namespace Model\image;
class Image
{
    protected $image_id;
    protected $images;
    
    public function __construct($images)
    {
        $this->images = $images;
    }
    
    
    public function getImageId()
    {
        return $this->image_id;
    }
    
    public function setImageId($image_id)
    {
        $this->image_id = $image_id;
    }
    
    
    public function getImages()
    {
        return $this->images;
    }
    
    
    public function setImages($images)
    {
        $this->images = $images;
    }
    
    
}