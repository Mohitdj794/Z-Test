<?php

require './Class/Query.php';
$obj = new Query();
// $obj->addExamResult("examMaintain",array(
//     "answerChoosed" => '{"66":"Ai","67":"2","68":"4"}',
//     "examTitle"=>"Maths",
//     "userName" => "krish"
// ));
// $obj->singleRowDataFromResult("examMaintain","ID",104);

$obj->fetchDataFromExamDetail(1);