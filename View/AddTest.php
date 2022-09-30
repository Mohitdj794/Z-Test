<?php
require_once "../Class/Query.php";
$objA=new Query();
$objA->AddTest($_POST["submit"],$_POST['name'],$_POST["id"],$_POST["Option"],$_POST['Ans']);
?>