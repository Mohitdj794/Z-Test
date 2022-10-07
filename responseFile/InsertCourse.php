<?php
require_once "../Class/Query.php";
try{
$obji=new Query();
$resp=$obji->CreatCourse($_POST['name'],$_POST['time']);


if($resp){
    
    $r=' {"result":"Sucess"} ';
    echo json_encode($r);
}
}
catch(PDOException $e){

//    $x= "{'result':'The course {$_POST['name']} is alredy Existed'} ";
$x=' {"result":"The Corse is alredy Existed please change the course name"} ';
   echo json_encode($x);
}


?>