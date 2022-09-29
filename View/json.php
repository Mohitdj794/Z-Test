<!DOCTYPE html>
<html lang="en">
<head>
    <title>Test-History</title>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <link href="/Z-Test/assets/img/download.png" rel="icon">
</head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 1000px;
  top: 50px;
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
</style>
<body>
<table id="customers">
  <tr>
    <th>TestTitle</th>
    <th>Result</th>
    <th>Score</th>
  </tr>
<?php
    session_start();
    require_once '../Class/Query.php';
    $UserExamDetail = new Query();
    $result = $UserExamDetail->fetchUserDetailFromExamDetail($_SESSION['name']);
    if ($result == []){
      echo "<script>$('table').hide() </script> <h1>You Didn't Attend Any Test<h1>";
    }
    for ($i=0; $i < count($result); $i++) { 
       echo "<tr><td>{$result[$i]['examTitle']} <br/></td>
        <td>{$result[$i]['result']}<br/></td>
        <td>{$result[$i]['score']}<br/></td>
        </tr>";
}

?>
</table>
</body>
</html>