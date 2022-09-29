<?php
session_start();
require_once '../Class/Query.php';
$UserExamDetail = new Query();
$result = $UserExamDetail->fetchDataFromExamDetail($_POST["id"]);
// echo   $result[0]["TestTitle"];
print_r(json_encode($result));  
?>