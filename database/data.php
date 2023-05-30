<?php
require_once("config/config.php");

class Database
{
    private $host=DB_HOST;
    private $username=DB_USER;
    private $pass=DB_PWD;
    private $dbname=DB_NAME; 

    private $connection;
    private $error;
    private $statement;
    private $dbconnected=false; //this line only changed a parameter to true

    
    
    function __construct()
    {
        $dsn='mysql:host='.$this->host.';dbname='.$this->dbname;

        $options=array(
            PDO::ATTR_PERSISTENT=>true,
            PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION
        );
        try{
            $this->connection=new PDO($dsn,$this->username,$this->pass,$options);
            $this->dbconnected=true;
        }
        catch(PDOException $e)
        {
            echo $e->getmessage();die;
            $this->error=$e->getmessage();
            $this->dbconnected=false;
        }
    }
    
    
   public function geterror()
    {
           return $this->error;
    }
    
        
   //checks the connection
   public function Isconnected()
    {
        return $this->dbconnected;
    }
    
    //statement prepare with query
    public function query($query)
    {
        $this->statement=$this->connection->prepare($query);
    } 
    
   //executes the value
    public function execute()
    {
        return $this->statement->execute();
    }
    
    //get result 
    public function resultset()
    {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }    
    
    //for row count
    public function getrowcount()
    {
        $this->statement->rowcount();
    }
   
   //fetching single value
    public function single()
    {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }
        
   //bindinng the values
    public function bind($parameter,$value,$type=null)
    {
        if(is_null($type))
        {
        switch (true)
        {
            case  is_int($value):
                $type=PDO::PARAM_INT;
                break;

            case  is_int($value):
                $type=PDO::PARAM_BOOL;
                break;    

            case  is_int($value):
                $type=PDO::PARAM_NULL;
                break;
            
            default:
                $type=PDO::PARAM_STR;
        }
    }


        $this->statement->bindvalue($parameter,$value);
}
}


?>
