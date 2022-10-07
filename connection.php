<?php
/**
 * This require @require */ 
require '../vendor/autoload.php';
use Opis\Database\Database;
use Opis\Database\Connection;

class Conn
{
  private $serverName = "localhost";
  private $userName = "root";
  private $password = "Vignesh@21";
  private $database = "z_Test";
  protected $con;

  public function __construct() 
  {
        $connection = new Connection(
            "mysql:host=$this->serverName;dbname=$this->database", 
            "$this->userName", 
            "$this->password"
        );
        
        $this->con = new Database($connection);
  }
}




