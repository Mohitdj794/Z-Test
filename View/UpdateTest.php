<?php
    require_once "../Class/Query.php";
    $updateTest=new Query();
    $updateTest->UpdateTest($_POST["submit"],$_POST['Question'],$_POST['Answer'],$_POST['id']);