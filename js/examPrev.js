import {ajax} from './ajax.js';

var id = location.search;
id = id.substring(4,id.length);
var dataID = new FormData();
dataID.append("id",id);
var data = ajax('responseFile/examTitleresponse.php',dataID,'POST');
var result = data;
var str=`<div><h2>Exam  ${result['TestTitle']}</h2><h3>Duration ${result.TestDuration}</h3>
<a href="startExam.html?id=${result.Test_id}">Start Exam</a></div>`;
$(".examPrev-container").append(str);
