<?php
session_start();
require_once '../Class/Query.php';
// print_r($_REQUEST);
$objExamTitle = new Query();
$result = $objExamTitle->singleRowDataFromResult("Test_Title","Test_id",$_POST["id"]);
print_r(json_encode($result));

