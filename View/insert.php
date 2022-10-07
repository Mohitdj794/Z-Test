<?php
require_once "../connection.php";
class insertData extends Conn{
    function dataInsert($password,$username,$email,$first,$last){
      try{  
      $hashed_password=password_hash($password, PASSWORD_BCRYPT);
        $result = $this->con->insert(array(
         'username' => "{$username}",
         'email' => "{$email}",
         'pass_word' => "{$hashed_password}",
         'firstName' => "{$first}",
         'lastName' => "{$last}"
     ))
     ->into('userLogin');
     if($result){
      header("Location:/Z-Test/homepage.html");
     }
     }
    catch(PDOException $e){
         echo "<script>var a = confirm('email already exist')
         if(a==true){
          window.location = '/Z-Test/homepage.html';
         }
         else{
          window.location = '/Z-Test/homepage.html';
         }
         </script>";
    }
     }
}
$conn3 = new insertData();
$conn3->dataInsert($_POST['psw1'],$_POST['name1'],$_POST['mail1'],$_POST['first'],$_POST['last']);
?>