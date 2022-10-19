import {koTimer,$hrs,$mins,$secs} from './koTimer.js';
import {questionOptionMV} from './ko_QO.js';
function dataRender(result){
    var Durations;
    const TestTitle = result[0]["TestTitle"];
   
    let Duration = result[0]["TestDuration"];
    let examName = localStorage.getItem("exam");
    if (examName !== null){
        if(examName.includes(TestTitle) && examName.includes(result["name"])){
        localStorage.clear();
        localStorage.setItem("exam",examName);    
        window.location= "./View/sample.php";
        process.exit();
        }
    }
    if (result["name"] == null || undefined){
        localStorage.clear();
        window.location= "./homepage.html";
    }
    if (localStorage.getItem('Duration') == undefined){
        Durations = new Date().getTime() + Duration * 60 * 1000;
        localStorage.setItem('Duration',Durations);
        koTimer(Durations);
    }
    else{
        koTimer(localStorage.getItem('Duration'));
    }
    
    ko.applyBindings(new questionOptionMV(result),document.querySelector('.container'));
}
export {dataRender};