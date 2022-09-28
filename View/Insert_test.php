<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/insert.css">
    <title>Document</title>
</head>
<body>
<div class="main">
<div class="topnav" id="myTopnav">
<a href="#" class="active">Z-TEST</a>
  <a class="l" href="#contact">CREATE COURSE</a>

</div>

<div class="insert">
    <form action="Insert_test.php" method="post">

    <div class="courseName">
        <lable>Course Name</lable>
         <input class="name" type="text" name="name" required><br>
    </div>


    <div class="duration">
         <lable>Course Duration</lable>
         <input class="time" type="number" name="time" required>in min<br>
    </div>

    <button class="button" type="submit" name="submit">Create Course</button>
</form>

</div>



<?php
require_once "../Class/Query.php";
$obji=new Query();
$obji->CreatCourse($_POST['submit'],$_POST['name'],$_POST['time']);


?>

</div>
</body>
</html>
