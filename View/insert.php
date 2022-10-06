<?php
require_once "../connection.php";
class insertData extends Conn{
    function dataInsert($password){
        $hashed_password=password_hash($password, PASSWORD_BCRYPT);
        $result = $this->con->insert(array(
         'username' => "{$_POST['name1']}",
         'email' => "{$_POST['mail1']}",
         'pass_word' => "{$hashed_password}",
         'firstName' => "{$_POST['first']}",
         'lastName' => "{$_POST['last']}"
     ))
     ->into('userLogin');
     if($result){
      header("Location:/Z-Test/homepage.html");
     }
    else{
      echo "error inserting data $con->error";
    }
}
}
$conn3 = new insertData();
$conn3->dataInsert($_POST['psw1'])
?>