<?php 
class config{

    private $hostname = 'localhost';
    private $username = 'root';
    private $password = '';
    private $databasename = 'e-comerce';
    private $coon;

    public function __construct()
    {
        $this->coon = new mysqli($this->hostname,$this->username,$this->password,$this->databasename);

        
    }


    public function runDml(string $query)  {

            $result = $this->coon->query($query);
            if($result){

                return true;

            }else{
                return false ;
            }



    }

    public function runDql(string $query)
     {

        $result = $this->coon->query($query);
        // print_r($result);

        if( !empty($result->num_rows) && $result->num_rows > 0){
            return $result;
        }
            return [];
    
        
    }

}



?>