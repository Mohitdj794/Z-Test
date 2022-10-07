<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/insert.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<div class="main">
<div class="topnav" id="myTopnav">
<a href="#" class="active">Z-TEST</a>
  <a class="l" href="#contact">CREATE COURSE</a>

</div>

<div class="insert">
    <form id="insert1"  method="post">

    <div class="courseName">
        <lable>Course Name</lable>
         <input class="name" type="text" name="name" required><br>
    </div>


    <div class="duration">
         <lable>Course Duration</lable>
         <input class="time" type="number" name="time" required> in min<br>
         <span id="val" style='color:red;left:20% ;margin-top: 20px'></span>
    </div>

    <button class="button" type="submit" name="submit">Create Course</button>
    
</form >

</div>

<script src="../js/InserCourse.js" type="module">
</script>

</div>
</body>
</html>
