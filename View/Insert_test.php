<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>



<form action="Insert_test.php" method="post">
Test Name:<input type="text" name="name"><br>
Time Duration:<input type="number" name="time">in min<br>
<input type="submit" name=>
</form>


<?php
require_once "../Class/Query.php";
$obji=new Query();
$obji->CreatCourse($_POST['name'],$_POST['time']);


?>


</body>
</html>
