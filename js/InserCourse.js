import { ajax } from './ajax.js';
$(document).on("submit","#insert1",function(e){
    e.preventDefault();
    var formdata = new FormData(this);
   
 var inputData=ajax("../responseFile/InsertCourse.php",formdata,"POST");
inputData=JSON.parse(inputData);
if(inputData["result"]==="Sucess"){
    window.location= "/Z-Test/View/ViewCourse.php";
}
 $("#val").html(inputData["result"]);

})