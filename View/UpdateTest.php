<?php
    require_once "../Class/Query.php";
    $updateTest=new Query();
    $updateTest->updateTest($_POST['Question'],$_POST['Answer'],$_POST['id']);