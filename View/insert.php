<?php
require_once "../connection.php";

class insertData extends Connection{
    function dataInsert($password){
        $hashed_password=password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO userLogin(username,email,pass_word,firstName,lastName)
        VALUES ('{$_POST['name1']}','{$_POST['mail1']}','{$hashed_password}','{$_POST['first']}','{$_POST['last']}')";
         if($this->con->query($sql)){
            header("Location:../homepage.html");
         }
         else{
            echo "error in inserting the data".$con->error;
         }
    }   
}
$conn3 = new insertData();
$conn3->dataInsert($_POST['psw1'])
?>