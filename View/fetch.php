<?php
session_start();
require "../connection.php";

class checkpass extends Conn{
    public function fetchdata($log_mail,$log_password){
        $result = $this->con->from('userLogin')
        ->select()
        ->all()
        ->where('email')->is($log_mail);
        if($result){
        $row = $result->fetch_assoc();
            if(password_verify($log_password,$row['pass_word'])){
                    $_SESSION['name']= $row['username'];
                echo json_encode($row);
            }
            else{
                    echo "password mismatch";
                    exit();
                };
         }
        else{
            echo "please enter valid email and password";
            exit();
        }
    }
}
$conn2 = new checkpass();
$conn2-> fetchdata($_POST['mail'],$_POST['psw']);
?>

<!-- 
$result = $this->con->from('userLogin')
             ->select()
             ->all()
             ->where('email')->'{$log_mail}' -->