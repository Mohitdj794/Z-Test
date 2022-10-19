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

