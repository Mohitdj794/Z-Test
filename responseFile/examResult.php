<?php 
session_start();
     require_once '../Class/Query.php';
     $objToAddData = new Query();
     $do = $_REQUEST;
    $arrOption=$arrOp=$arrAns=[];
    $count=1;
    foreach ($do as $key => $value) {
          if(substr($key,0,-1) == "option"){
               $arrOption[$do["Qu$count"]] = $value;
               array_push($arrOp,$value);
               $count++;
          }
          if (substr($key,0,-1) == "Ans"){
               array_push($arrAns,$value);
          }
          
    }

    // count Question length 
    $countQuestion = count($arrAns);
 
    // Start Time;
    $startTime = $do["startTime"];

    $correctAnswer =0;
    for ($i=0;$i<$countQuestion;$i++){
          if($arrOp[$i] == $arrAns[$i]){
               $correctAnswer++;
          }
    }

    // score calculation  and result assign
    $FindScore = ($correctAnswer/$countQuestion)*100;
     $result = "pass";
    if ($FindScore < 70){
     $result = "fail";
    }
    // annser choosed for user given of array into string;
    $answerChoosed = json_encode($arrOption);

    // prepare all data into insert formate;
    $name_user = $_SESSION['name'];
    $prepareTable1Date = [
          "answerChoosed"=>$answerChoosed,
          "examTitle"=>$do["examTitle"],
          "userName"=>$name_user
    ];   
    
    if(!empty($prepareTable1Date)){

     //insert data into data base to get last id
     $lastID =  $objToAddData->addExamResult("examMaintain",$prepareTable1Date);

     //prepare data for last table 
     $prepareTable2Date = [
          "result"=>$result,
          "score"=>$FindScore,
          "startTime"=>$startTime,
          "endTime"=>date("H:i:s"),
          "date"=>date("Y-m-d"),
          "examMaintain_id"=>$lastID
     ];

    $lastID1 = $objToAddData->addExamResult("result",$prepareTable2Date);

    $result = $objToAddData->singleRowDataFromResult("result","id",$lastID1);
    $result["name"] = $_SESSION['name'];
     $result = json_encode($result);
     echo $result;                                
     exit();
    }

