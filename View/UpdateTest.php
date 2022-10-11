<?php
    require_once "../Class/Query.php";
    echo "hi";
    $updateTest=new Query();
    $updateTest->updateTest($_POST["submit"],$_POST['Question'],$_POST['Answer'],$_POST['id']);