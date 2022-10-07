import {Timer} from './Timer.js';
// import {addData} from './localstorageSaveData.js';
function dataRender(result){
    console.log(result)
    var options='',Durations;
    var localvalue,localVariable;
    let Duration = result[0]["TestDuration"];
    console.log(Duration);
    if (localStorage.getItem('Duration') == undefined){
        Durations = new Date().getTime() + Duration * 60 * 1000;
        localStorage.setItem('Duration',Durations);
        Timer(Durations);
    }
    else{
        Timer(localStorage.getItem('Duration'));
    }
    const TestTitle = result[0]["TestTitle"];
    let data=`<h3>${TestTitle}</h3>`;
    let count = 1,opt=1;
    for (let i=0; i<result.length;i++){
        console.log(typeof result[i]["Options"]);
            options =JSON.parse(result[i]["Options"]);
            data +=  `<div class="question ${count}"><p class="para">${count}. ${result[i]["Question"]}</p><br>`;
            localVariable = `option${opt}`;
            localvalue = localStorage.getItem(localVariable);
        if(localvalue == null){
            for (const key in options){
                data +=  `<input type="radio" name="option${opt}" value="${options[key]}"/>
                <label>${options[key]}</label><br>`;
            }
        }else{
            for (const key in options){
                if (localvalue == options[key]){
                    data +=  `<input type="radio" name="option${opt}" value="${options[key]}" checked >
                <label>${options[key]}</label><br>` 
                }else{
                data +=  `<input type="radio" name="option${opt}" value="${options[key]}"/>
                <label>${options[key]}</label><br>`;
                }
            }
        }
        data +=`</div>`;
        opt++;
        count++;
    }

    $("#renderForm").append(data);
    $(".question").hide();
    $("#submit").hide();
    // addData();
}
export {dataRender};