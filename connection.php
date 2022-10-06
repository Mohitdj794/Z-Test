<?php
 require "../vendor/autoload.php";
 use Opis\Database\Database;
 use Opis\Database\Connection;
class Conn
{
  private $serverName = "localhost";
  private $userName = "root";
  private $password = "Viratkohli18@";
  private $database = "z_Test";
  protected $con;

  function __construct()
  {
    $connection = new Connection(
      'mysql:host=localhost;dbname=z_Test',
      'root',
      'Viratkohli18@'
  );
  $this->con = new Database($connection);  
  }
}




