<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Questions</title>
    <link rel="stylesheet" href="../style/Addq.css">
    <link href="/Z-Test/assets/img/download.png" rel="icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src = "https://ajax.aspnetcdn.com/ajax/knockout/knockout-3.1.0.js"    
      type = "text/javascript"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout-validation/2.0.4/knockout.validation.min.js"></script>
      
    
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.5.1/knockout-latest.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/knockout-validation/2.0.4/knockout.validation.min.js"></script>

<form data-bind="submit:handleSubmit" id="Add" method="post">
<p class="question"> <label>Question</label></p>
   <textarea data-bind="value:Question,valueUpdate:'afterkeydown'" name="name" class="Que" rows="10" cols="70"></textarea> <br>
      
   <div class="Ans">
     <!-- ko foreach: ViewModel.values -->
     <div class="fname" >
        Option: <input id="opt"  name=Option[] data-bind="value: $data.value" placeholder="Option" contenteditable/>
     </div>
     <!-- /ko -->
      
     <div class="addBtn">
     <button id="inc"  data-bind="click: ViewModel.addValue">+</button>
     <button id="dec" data-bind="click: ViewModel.RemoveValue">-</button>
   </div>
   </div>

  <div class="Ans">
   <label class="Ans1">Answer:</label></td>
   <input   data-bind="value:Answer,valueUpdate:'afterkeydown'" id="Ans2"type="text" name="Ans"  size="20"><br>
   <span data-bind="text:Insert " id="error"></span>
   </div>
   </div>

<input type="submit" name="submit" class="sub">
<input type="hidden" value="<?= $_GET["id"] ?>" name = "id">
</form>

<script>


function CreateAccountViewModel(){

    var self=this;

       self.ViewModel = {
        values: ko.observableArray([
            {value: ko.observable('initial value')}
        ]),
        addValue: function(){
            self.ViewModel.values.push({ value: ko.observable('')});
           
        },
        RemoveValue:function(){
            self.ViewModel.values.pop();
        }
    }
    
    self.Question = ko.observable("").extend({
        required:true,
        minLength:5,
    });
 
    self.Answer = ko.observable("").extend({
        required:true,
        minLength:1,
       
    });

    self.ConfirmPassword = ko.observable().extend({areSame:{params:self.ViewModel.values, message: "Confirm password must match with the above password" }});;

    self.handleSubmit = function(){
        var errors = ko.validation.group(self);
        if(errors().length > 0){
            errors.showAllMessages();
            return false;
        }
        var payload = {
            firstname : self.firstName(),
        }
        console.log(payload);
        
    }   
};

ko.validation.rules['areSame'] = {
    getValue: function (o) {
        return (typeof o === 'function' ? o() : o);
    },
    validator: function (val, otherField) {
        return val === this.getValue(otherField);
    },
    message: 'The fields must have the same value'
};

$(document).ready(function () {
    ko.validation.registerExtenders();
    ko.applyBindings(new CreateAccountViewModel());
});

  </script>

<script src="../js/AddTest.js"></script>


</body>
</html>
