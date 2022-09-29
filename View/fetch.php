<?php
session_start();
require "../connection.php";
class checkpass extends Connection{
    public function fetchdata($log_mail,$log_password){
        $result = $this->con->query("SELECT * FROM userLogin where email='{$log_mail}'");
        if($result->num_rows > 0){
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
