<?php
session_start();
require '../Class/Query.php';
$UserExamDetail = new Query();
$result = $UserExamDetail->fetchDataFromExamDetail($_POST['id']);
$result["name"] = $_SESSION["name"];
print_r(json_encode($result));