import { dataRender } from "./startExam.js";
import {showSingleQuestion} from './nextPrevButton.js';
import { renderFormSubmit } from "./finshExam.js";
import { ajax } from "./ajax.js";
var dataRenderExam = Aajax();
function Aajax(){
    var data;
    var today = new Date();
    if(localStorage.getItem("startTime") == undefined){
    const startTime = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    localStorage.setItem("startTime",startTime);
    }
    data = ajax('sam.json','',"GET");
    return data;
}

console.log(dataRenderExam)
dataRender(dataRenderExam);
showSingleQuestion(dataRenderExam.length);
renderFormSubmit(dataRenderExam);

