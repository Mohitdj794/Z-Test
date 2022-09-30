<?php
    require_once "../Class/Query.php";
    echo "hi";
    $updateTest=new Query();
    $updateTest->UpdateTest($_POST["submit"],$_POST['Question'],$_POST['Answer'],$_POST['id']);