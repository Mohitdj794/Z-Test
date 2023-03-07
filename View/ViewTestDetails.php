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
    <h2 class="testheading">Exam </h2>

<div class="box">
 

<table>
  <thead align="left" style="display: table-header-group">
  <tr>
    <th>Id</th>
    <th>User Name</th>
    <th>Course Details  </th>
    <th>Test Completed Date and Time</th>
    <th>Result</th>
    <th>Score</th>
  </tr>
  </thead>
<tbody>
    <?php
    require_once "../Class/Query.php";
   $objc = new Query();
   $title=$_GET['testtitle'];
   $test= $objc->TestDetails($title);
   foreach($test as $tests){?>
  <tr class="item_row">
        <td><?php echo ++$total; ?></td>
        <td><?php echo $tests->userName; ?></td>
        <td> <?php echo $tests->examTitle; ?></td>
        <td> <?php echo date("d-m-Y", strtotime($tests->date))." / ".date("g:i a", strtotime($tests->endTime)); ?></td>
        <td> <?php echo $tests->result; ?></td>
        <td> <?php echo $tests->score; ?></td>
  </tr>
<?php
}
 ?>
</tbody>
</table>
</div>
</body>
</html>