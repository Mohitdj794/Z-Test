<?php
require_once "../Class/Query.php";
    $objd=new Query();
   $objd->DeleteThis($_GET['id']);

?>