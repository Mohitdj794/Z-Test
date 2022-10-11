<?php
require_once "../Class/Query.php";
    $objd=new Query();
    $objd->deleteThis($_GET['id']);
    
?>