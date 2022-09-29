<?php
session_start();
require_once "../connection.php";
class Query2 extends Connection{
    function updateData($first,$last){
        $sql = "UPDATE userLogin SET firstName='$first',lastName='$last' where username='{$_SESSION['name']}'";
        if($this->con->query($sql)){
            header("Location:sample.php");
          }
          else{
             echo "error in inserting the data".$con->error;
          }
    }
}
$conn = new Query2();
$conn -> updateData("{$_POST['f1']}","{$_POST['l1']}")
?>