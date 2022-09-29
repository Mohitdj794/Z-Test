<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Z-TEST ADMIN</title>
    <link rel="stylesheet" href="../style/fistOut.css">
    <link href="../img/download.png" rel="icon">
</head>
<body>

<div class="topnav" id="myTopnav">
<a href="#" class="active">Z-TEST</a>
<a href="#about" class="home">Home</a>
  
  
  <a class="l" href="adminLogout.php">Log Out</a>

  
</div>

<div class="box">
 

<div class="form-div-wrap">
<form action='Search.php' method="get">
<button id='bton' style='background-color:gray'>SEARCH</button>
   <input type="text" name="search" required> 
</form>

<form action='Insert_test.php' class="button-form">
<button class='btn' style='background-color:gray'>Create New Test</button>
</form>
</div>

<table>
<tr>
    <th>Test Name</th>
    <th>Duration </th>
    <th></th>
    <th>Action</th>
    <th></th>

  </tr>
<?php
    require_once "../Class/Query.php";
   $objc = new Query();
   echo $objc->displayThis();
?>


</table>

</div>
</body>
</html>