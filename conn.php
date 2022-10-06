<?php
require "./vendor/autoload.php";
use Opis\Database\Database;
use Opis\Database\Connection;
use Opis\Database\Schema\CreateTable;

$connection = new Connection(
    'mysql:host=localhost;dbname=z_Test',
    'root',
    'Viratkohli18@'
);
$db = new Database($connection);

$schema = $db->schema();

$db->schema()->create('userLogin', function($table){
    $table->integer('id');
});


?>