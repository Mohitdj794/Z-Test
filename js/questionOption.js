import { dataRender } from "./startExam.js";
import {showSingleQuestion} from './nextPrevButton.js';
import { renderFormSubmit } from "./finshExam.js";
import { ajax } from "./ajax.js";
var dataRenderExam = Aajax();
function Aajax(){
    var data;
    var id = location.search;
    id = id.substring(4,id.length);
    var dataID = new FormData();
    dataID.append("id",id); 
    var today = new Date();
    if(localStorage.getItem("startTime") == undefined){
    const startTime = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    localStorage.setItem("startTime",startTime);
    }
    data = ajax('./responseFile/fetchExamData.php',dataID,"POST");
    return data;
}   
dataRender(dataRenderExam);
showSingleQuestion(Object.keys(dataRenderExam).length-1);
renderFormSubmit(dataRenderExam);