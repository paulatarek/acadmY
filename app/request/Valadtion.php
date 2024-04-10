<?php 

include __DIR__.'\..\database\config.php';
class valadton{

    private $name ; 
    private $value ;
    
    public function __construct($name,$value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    public function Requier(){

        if(empty($this->value)){

            return "$this->name.isrequiere";
        }else{
            '';
        }
    }

    public function rgex($patern){

        return (preg_match($patern,$this->value)) ? '' : "$this->name . is invalid";

    }

    public function unique($table)
    {

        $query = "SELECT * FROM '$table' WHERE '$this->name' = '$this->value' ";
      

        $config = new config();
        // die($quwery);

        $result = $config->runDql($query);
        // print_r($result );
        // die();

        return (empty($result)) ? "" : "this $this->name is already exits ";

    }

    public function confirmation($valueconform)
    {

        return ($this->value == $valueconform ) ? '':"this $this->name not conform ";
    }
}



?>