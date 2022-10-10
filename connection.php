<?php
/**
 * This ths main connection ton database
 * 
 * PHP version 7.4.3
 * 
 * @category  PHP
 * @package   Connection
 * @author    vignesh <vignesh@ziffity.com>
 * @copyright 2014 Ziffity
 * @license   git@github.com:Mohitdj794/Z-Test.git git
 * @link      git@github.com:Mohitdj794/Z-Test.git
 */
require '../vendor/autoload.php';
use Opis\Database\Database;
use Opis\Database\Connection;
/**
 * Class create a connection on construct
 * 
 * PHP version 7.4.3
 * 
 * @category  PHP
 * @package   Connection
 * @author    vignesh <vignesh@ziffity.com>
 * @copyright 2014 Ziffity
 * @license   git@github.com:Mohitdj794/Z-Test.git git
 * @link      git@github.com:Mohitdj794/Z-Test.git
 */
class Conn
{
  private $serverName = "localhost";
  private $userName = "root";
  private $password = "Viratkohli18@";
  private $database = "z_Test";
  protected $con;

    /**
     * Construct create connection
     */
    public function __construct() 
    {
        $connection = new Connection(
            "mysql:host=$this->_serverName;dbname=$this->_database", 
            "$this->_userName", 
            "$this->_password"
        );
        
        $this->con = new Database($connection);
    }
}




