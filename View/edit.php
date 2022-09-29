<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update</title>
</head>
<style>
    body{
        background-color:darkgrey;
    }
    .form1{
        width:500px;
        height: 300px;
        background-color:blue;
        left:30%;
        position: relative;
        border-radius:20px;
    }
    input{
        padding:7px 25px;
        top:20px;
        position: relative;
    }
    label{
        color:white;
        font-size:20px;
        top:20px;
        position: relative;
    }
    .form2{
        left:10%;
        top:20%;
        position: relative;
    }
    .eml1{
        left:27px;
        position: relative;
    }
    button{
        padding: 10px 30px;
        left:40%;
        top:20px;
        position: relative;
    }
    </style>
<body>
<div class='form1'>
<?php
require_once "../connection.php";
class Query extends Connection{
public function editData($name){
    $sql = "SELECT * FROM userLogin where username='{$name}'";
    $result = $this->con->query($sql);
    $row = $result->fetch_assoc();
    echo "<form class='form2' action=\"update2.php\" method=\"post\"><label>firstname:</label><input type='text' class='first1' value='{$row['firstName']}' name='f1'><br/><br/>
          <label>lastname:</label><input type='text' class='last1' value='{$row['lastName']}' name='l1'><br/><br/>
          <label>username:</label><input type='text' class='usr1' value='{$row['username']}' name='un1' disabled><br/><br/>
          <label>email:</label><input type='email' class='eml1' value='{$row['email']}'  name='eml1' disabled><br><br><button type='submit'>update</button></form>";
   }
}
?>
<div>
</body>
</html>
