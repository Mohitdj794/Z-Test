<?php
session_start();
require_once "../connection.php";
class Query2 extends Conn{
    function updateData($first,$last){
        $result = $this->con->update('userLogin')
             ->where('username')->is($_SESSION['name'])
             ->set(array(
                'firstName' => "$first",
                'lastName' => "$last",
             ));
            header("Location:sample.php");
    }
}
$conn = new Query2();
$conn -> updateData("{$_POST['f1']}","{$_POST['l1']}")
?>