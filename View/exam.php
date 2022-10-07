<!DOCTYPE html>
<html lang="en">
<head>
    <title>Exam</title>
    <link href="/Z-Test/assets/img/download.png" rel="icon">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</head>
<style>
body{
  background-color:grey;
}
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 1000px;
  top: 50px;
  left: 80px;
  position: relative;
}
h1{
  text-align: center;
  margin: 30px;
}
#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 14px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
.btn{
    background-color:  rgba(45, 53, 69, 0.907);
  color: white;
  padding: 7px 15px ;
  text-align: center;
  text-decoration: none;
  border-radius: 10px;
  font-size: 20px;
}
.btn:hover{
    background-color:red;
}
</style>
<body>
<table id="customers">
  <tr>
    <th>S:NO</th>
    <th>TestTitle</th>
    <th>Duration</th>
    <th>Action</th>
  </tr>
<?php
session_start();
require_once '../Class/Query.php';

$fetchExamDetail = new Query();
$examDetail = $fetchExamDetail->testTitleData();
$resultDetail = $fetchExamDetail->fetchUserDetailFromExamDetail($_SESSION['name']);

$resultTitle = [];
for ($i=0; $i < count($resultDetail); $i++) { 
        $resultTitle[]=$resultDetail[$i]["examTitle"];
}
$count = 1;
$testAlreadyTaken=0;
$resultarr=0;
$stringdata='';
for ($j=0; $j < count($examDetail); $j++) { 
       $stringdata.= "<tr><td>{$count}<br/></td>
        <td>{$examDetail[$j]['TestTitle']}<br/></td>
        <td>{$examDetail[$j]['TestDuration']}<br/></td>
        ";
        for ($k=0; $k < count($resultTitle); $k++) { 
            if ($examDetail[$j]['TestTitle'] == $resultTitle[$k]) {
            $testAlreadyTaken = 1;
            $stringdata .=  "<td>Test Already Attended<br/></td></tr>";
            break;
            }
        }
        if ($testAlreadyTaken==0){
      
                $stringdata .=  "<td><a class='btn' href='../examPrev.html?id={$examDetail[$j]['Test_id']}'>Start Test</a></td></tr>";
  
        }
        $testAlreadyTaken=0;
        $count++;
    }
        
       echo $stringdata;

?>
</table>
</body>
</html>