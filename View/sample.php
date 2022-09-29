<?php
session_start();
if(empty($_SESSION['name'])){
  header("location:../homepage.html");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>DashBoard</title>
    <link href="/Z-Test/assets/img/download.png" rel="icon">
</head>
<link href="../assets/css/style2.css" rel="stylesheet">
 <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<body>
<div class="div1" id="div1">
<header id="header1" class="header1">
      <h1 class="logo1"><a class="anc" href="sample.php">Z-TEST</a></h1>
      <nav id="navbar1" class="navbar1">
        <ul>
          <li><h2 class="logo2">Welcome <?php echo "{$_SESSION['name']}" ?></h2>
          <li><a  class="log" href="logout.php">Logout</a></li>
        </ul>
      </nav>
  </header>
  </div>
<div class="container">
   <a href="update.php" class="btn1">Edit-Profile</a><br>
   <a href="json.php" class="btn2">Test-History</a>
   <a href="exam.php" class="btn3">Test</a>
</div>
  <!-- <script src="./script4.js"></script> -->
</body>
</html>
