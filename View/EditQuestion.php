<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../style/edit.css">
    <title>Edit</title>
    <link href="/Z-Test/assets/img/download.png" rel="icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.5.1/knockout-latest.js"></script>
</head>
<body>

<div class="main">
      <div class="topnav" id="myTopnav">
      <a href="#" class="active">Z-TEST</a>
      <a class="l" href="#contact">ADD QUESTIONS</a>

</div>

<div class="structure">
  
    <form id="Edit" method="post">
        <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
    <?php
    require_once "../Class/Query.php";

      $edit=new Query();
      $edit->editTest($_GET['id']);
    ?>
    
    <span data-bind="text:AddTest" id="error"></span><br>
    <br><input type="submit" class="button" name=" submit" value= "submit">
    
    </form>

</div>

<script src="../js/Edit.js"></script>
</body>
</html>