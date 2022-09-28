<?php
require_once '../Class/Query.php';
// $useName = $_POST["user"];
$UserExamDetail = new Query();
$result = $UserExamDetail->fetchDataFromExamDetail();
print_r(json_encode($result));
    
?>