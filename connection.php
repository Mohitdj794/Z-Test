<?php

class Connection
{
  private $serverName = "localhost";
  private $userName = "root";
  private $password = "Vignesh@21";
  private $database = "z_Test";
  protected $con;

  function __construct()
  {
    $this->con = new mysqli($this->serverName, $this->userName, $this->password, $this->database);

    if ($this->con->connect_error) {
      die("Connection failed: " . $this->con->connect_error);
    }
  }
}


