<?php
 require "../vendor/autoload.php";
 use Opis\Database\Database;
 use Opis\Database\Connection;
class Conn
{
  
  

  function __construct()
  {
    $connection = new Connection(
      'mysql:host=localhost;dbname=z_Test',
      'root',
      'Ziffity@123'
  );
  $this->con = new Database($connection);  
  }
}




