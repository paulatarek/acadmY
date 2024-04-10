<?php

include __DIR__. '\..\database\config.php' ;
include __DIR__. '\..\database\opertion.php' ;

class User extends config implements opertion{

    private $id;
    private $first_name;
    private $last_name;
    private $email;
    private $phone;
    private $password;
    private $gender;
    private $img;
    private $code;
    private $statues;
    private $email_verfiy;
    private $created_at;
    private $ubdated_at;


public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of first_name
     */ 
    public function getFirst_name()
    {
        return $this->first_name;
    }

    /**
     * Set the value of first_name
     *
     * @return  self
     */ 
    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * Get the value of last_name
     */ 
    public function getLast_name()
    {
        return $this->last_name;
    }

    /**
     * Set the value of last_name
     *
     * @return  self
     */ 
    public function setLast_name($last_name)
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = sha1($password);

        return $this;
    }

    /**
     * Get the value of gender
     */ 
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     *
     * @return  self
     */ 
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get the value of img
     */ 
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set the value of img
     *
     * @return  self
     */ 
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get the value of statues
     */ 
    public function getStatues()
    {
        return $this->statues;
    }

    /**
     * Set the value of statues
     *
     * @return  self
     */ 
    public function setStatues($statues)
    {
        $this->statues = $statues;

        return $this;
    }

    /**
     * Get the value of email_verfiy
     */ 
    public function getEmail_verfiy()
    {
        return $this->email_verfiy;
    }

    /**
     * Set the value of email_verfiy
     *
     * @return  self
     */ 
    public function setEmail_verfiy($email_verfiy)
    {
        $this->email_verfiy = $email_verfiy;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of ubdated_at
     */ 
    public function getUbdated_at()
    {
        return $this->ubdated_at;
    }

    /**
     * Set the value of ubdated_at
     *
     * @return  self
     */ 
    public function setUbdated_at($ubdated_at)
    {
        $this->ubdated_at = $ubdated_at;

        return $this;
    }


public function create(){

    $Query = "INSERT INTO users (first_name,last_name,email,phone,password,gender,code)
     VALUES('$this->first_name','$this->last_name','$this->email','$this->phone',
     '$this->password','$this->gender','$this->code')";

     return $this->runDml($Query);

}

public function read(){
    
}

public function update(){

    $image = null ;

    if(isset($this->img)){
        $image  = ",img = '$this->img'";

        

    }

    $query = "UPDATE users SET first_name = '$this->first_name' , last_name = '$this->last_name' , 
    phone = '$this->phone' , gender = '$this->gender'  $image   WHERE email = '$this->email' ";

return $this->runDml($query);

    
}

public function delete(){
    
}


    /**
     * Get the value of id
     */ 
    

    /**
     * Get the value of code
     */ 
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */ 
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    public function cheak_code(){
        $Query = "SELECT * FROM `users` WHERE email ='$this->email' AND code=$this->code" ; 

        return $this->runDql($Query);
    }

    public function makeusersverfiy(){
 $Query = "UPDATE `users` SET `statues`=$this->statues,`email_verfiy`='$this->email_verfiy' WHERE email = '$this->email' ";
// die;
        return $this->runDml($Query);

    }

    public function login(){
        $Query =  " SELECT * FROM users WHERE email ='$this->email' AND password = '$this->password'";
   return $this->runDql($Query);
    }

    public function getuserbyemail(){
        $Query = "SELECT * FROM users WHERE email ='$this->email'";
        return $this->runDql($Query);
    }
}



?>