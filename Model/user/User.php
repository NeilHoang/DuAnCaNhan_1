<?php

namespace Model\user;
class User
{
    private $id;
    private $name;
    private $email;
    private $password;
    private $avatar;
    
    function __construct($name, $email, $password,$avatar)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->avatar = $avatar;
    }
    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    
    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }
    
    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
    
    /**
     * @return mixed
     */
    public function getAvatar()
    {
        return $this->avatar;
    }
    
    /**
     * @param mixed $avatar
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }
}

?>