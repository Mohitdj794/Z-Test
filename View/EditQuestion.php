<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../style/edit.css">
    <title>Edit</title>
    <link href="/Z-Test/assets/img/download.png" rel="icon">
</head>
<body>

<div class="main">
      <div class="topnav" id="myTopnav">
      <a href="#" class="active">Z-TEST</a>
      <a class="l" href="#contact">ADD QUESTIONS</a>

</div>

<div class="structure">
  
    <form action="UpdateTest.php" method="post">
        <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
    <?php
    require_once "../Class/Query.php";

      $edit=new Query();
      $edit->EditTest($_GET['id']);

    ?>
    <br><input type="submit" class="button" name=" submit" value= "submit">
    </form>

</div>


</body>
</html>