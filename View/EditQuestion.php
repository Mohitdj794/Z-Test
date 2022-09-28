<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="UpdateTest.php" method="post">
        <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
    <?php
    require_once "../Class/Query.php";

      $edit=new Query();
      $edit->EditTest($_GET['id']);

    ?>
    <input type="submit" name=" submit" value= "submit">
    </form>
</body>
</html>