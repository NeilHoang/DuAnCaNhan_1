<?php

use Model\image\image;
use Model\DB\DBConnection;

class ImageDB
{
    protected $imgConnect;
    
    public function __construct($imgConnect)
    {
        $this->imgConnect = $imgConnect;
    }
    
    public function createImage(array $result)
    {
        $arr = [];
        foreach ($result as $item) {
            $user = new Image($item['images']);
            $user->setImageId($item['image_id']);
            array_push($arr, $user);
        }
        return $arr;
    }
    
    
    public function createImages($image)
    {
        $images = $image->getImages();
        $sql = "INSERT INTO images(images) VALUES ('$images')";
        $this->imgConnect->query($sql);
    }
    
    
    public function upload()
    {
        $fileCount = count($_FILES['image']['name']);
        for ($i = 0; $i < $fileCount; $i++) {
            $fileName = $_FILES['file']['name'][$i];
        }
    }
    
    public function getAll()
    {
        $query = "SELECT * FROM images ORDER BY image_id DESC";
        $statement = $this->imgConnect->prepare($query);
        if ($statement->execute()) {
            $result = $statement->fetchAll();
            return $this->createImage($result);
        }
    }
}