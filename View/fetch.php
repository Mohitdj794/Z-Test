<?php
session_start();
require "../connection.php";

class checkpass extends Conn{
    public function fetchdata($log_mail,$log_password){
        $result = $this->con->from('userLogin')
        ->where('email')->is($log_mail)
        ->select()
        ->all();
        if($result){
         $row = json_decode(json_encode($result),true);
            if(password_verify($log_password,$row[0]['pass_word'])){
                    $_SESSION['name']= $row[0]['username'];
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
$conn2-> fetchdata("{$_POST['mail']}","{$_POST['psw']}");
?>