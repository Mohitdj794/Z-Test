import {ajax} from './ajax.js';

var id = location.search;
id = id.substring(4,id.length);
var dataID = new FormData();
dataID.append("id",id);
var data = ajax('responseFile/examTitleresponse.php',dataID,'POST');
var result = data;

function examPrevMV(data){

    var self = this;
    self.TestTitle = ko.observable(`Exam ${data.TestTitle}`);
    self.TestDuration = ko.observable(`Duration ${data.TestDuration}`);
    self.url = ko.observable(`startExam.html?id=${data.Test_id}`);
    self.details = ko.observable(`Start Exam`);
}
ko.applyBindings(new examPrevMV(result[0]));
// var str=`<div><h2 data-bind="text: TestTitle">Exam  ${result[0]['TestTitle']}</h2><h3data-bind="text: TestDuration">Duration ${result[0].TestDuration}</h3>
// <a href="startExam.html?id=${result[0].Test_id}">Start Exam</a></div>`;
// $(".examPrev-container").append(str);
