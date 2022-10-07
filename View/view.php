<!DOCTYPE html>
<html lang="en">
<head>
    <title>View</title>
    <link href="/Z-Test/assets/img/download.png" rel="icon">
    <link rel="stylesheet" href="../style/view.css">
</head>
<body>
 
    <div class="view" >
        <a href="./ViewCourse.php" class="aTag">Go Back</a>
        <div class="data">
    <?php
    require_once "../Class/Query.php";

    $view=new Query();  
    $view->ViewTest($_GET['id']);

    
    
    ?>
    </div>
    </div>
</body>
</html>