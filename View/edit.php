<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update</title>
    <link href="/Z-Test/assets/img/download.png" rel="icon">
</head>
<style>
    body{
        background-color:grey;
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
        border-radius:7px;
    }
    button:hover{
        background-color:red;
    }
    </style>
<body>
<div class='form1'>
<?php
require_once "../connection.php";
class Query extends Conn{
public function editData($name){
    $result =  $result = $this->con->from('userLogin')
    ->where('username')->is($name)
    ->select()
    ->all();
    $row = json_decode(json_encode($result),true);
    echo "<form class='form2' action=\"update2.php\" method=\"post\"><label>firstname:</label><input type='text' class='first1' value='{$row[0]['firstName']}' name='f1'><br/><br/>
          <label>lastname:</label><input type='text' class='last1' value='{$row[0]['lastName']}' name='l1'><br/><br/>
          <label>username:</label><input type='text' class='usr1' value='{$row[0]['username']}' name='un1' disabled><br/><br/>
          <label>email:</label><input type='email' class='eml1' value='{$row[0]['email']}'  name='eml1' disabled><br><br><button class='btn' 'type='submit'>Update</button></form>";
   }
}
?>
<div>
</body>
</html>
