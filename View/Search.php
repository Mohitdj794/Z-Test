<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Z-TEST ADMIN</title>
    <link rel="stylesheet" href="../style/fistOut.css">
    <link href="../img/download.png" rel="icon">
</head>
<body>

<div class="topnav" id="myTopnav">
<a href="#" class="active">Z-TEST</a>
<a href="#about">Home</a>
  
  
  <a class="l" href="#contact">Log Out</a>

</div>

<div class="box">
 

<div class="form-div-wrap">
<form action='ViewCourse.php' method="post">
   <input type="text" value="<?= $_GET["search"] ?>" name="search" > 
   <button id='bton' style='background-color:gray'>X</button>
</form>

<form action='Insert_test.php' class="button-form">
<button class='btn' style='background-color:gray'>Create New Test</button>
</form>
</div>

<table >
<tr>
    <th>Test Name</th>
    <th>Duration </th>
    <th> </th>
    <th>Action </th>
    <th> </th>

  </tr>
<?php

    require_once "../Class/Query.php";
    $search1=new Query();
    echo $search1->searchCourse($_GET['search']);
    
    ?>
</table>

</body>
</html>


