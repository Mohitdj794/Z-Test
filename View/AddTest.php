<?php
require_once "../Class/Query.php";
$objA=new Query();
$objA->addTest($_POST['name'],$_POST["id"],$_POST["Option"],$_POST['Ans']);

?>



