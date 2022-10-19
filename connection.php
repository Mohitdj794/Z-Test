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
define("_serverName", "localhost");
define("_userName", "root");
define("_password", "Vignesh@21");
define("_database", "z_Test");
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
    /**
     * Construct create connection
     */
    public function __construct() 
    {
        $connection = new Connection(
            "mysql:host="._serverName.";dbname="._database, 
            _userName, 
            _password
        );
        
        $this->con = new Database($connection);
    }
}




