<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Questions</title>
    <link rel="stylesheet" href="../style/Addq.css">
    <link href="/Z-Test/assets/img/download.png" rel="icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
</head>
<body>

<div class="main">
      <div class="topnav" id="myTopnav">
      <a href="#" class="active">Z-TEST</a>
      <a class="l" href="#contact">ADD QUESTIONS</a>

</div>

<div class="structure">
<?php
include "connection.php";
?>
<script>

jQuery(function($) {
  var $traceContainer = $('#traces');
  $('#add-button').click(function() {
    var $div = $traceContainer.find('.trace:last').clone()
    $div.find(`input[name='Option']`).val("");
    $traceContainer.append($div);
  });
  
 
  
});

jQuery(function($) {
  var $traceContainer = $('#traces');

  $('#rm-button').click(function() {
    var $div = $traceContainer.find('.trace:last').remove()
 
  });
  
  
});
  
  
  console.log(Option);

</script>

<form id="Add" method="post">
<p class="question"> <label>Question</label></p>
<textarea  name="name" class="Que" rows="10" cols="70"></textarea> <br>

<button type="button" id="add-button" class="btn">+</button>
<div id="traces">
  <div class="trace">
    
      <table>
        <tbody>
          <tr>
            <td><label>Option:</label></td>
            <td><input for="ans" type="text" name="Option[]" class="Option" size="20">
            </td>
          </tr>
        </tbody>
      </table>
  </div>
</div>
<button type="button" id="rm-button" class="btn">-</button>

  <div class="Ans">
   <label class="Ans1">Answer:</label></td>
   <input type="text" name="Ans"  size="20"><br>
   <span id="error"></span>
   </div>
   </div>

<input type="submit" name="submit" class="sub">
<input type="hidden" value="<?= $_GET["id"] ?>" name = "id">
</form>


<script src="../js/AddTest.js"></script>


</body>
</html>
