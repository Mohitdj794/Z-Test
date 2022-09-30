import { ajax } from './ajax.js';
import { $TIMER } from './Timer.js';
function renderFormSubmit(result){
    $(document).on("submit","#renderForm",function(e){
        var response;
        var formdata;
        var showResult='';  
        var confirmTimer = false;
        var $result='';
        e.preventDefault();
        function test(){
            return confirm("Confirm to submit");
        }
        if ($TIMER !== 0){
           var confirmTimer = test();
        }
        if(confirmTimer == true || $TIMER == 0){
        formdata = new FormData(this);
        var count=1;
        for (var i = 0;i<result.length; i++ ){
            formdata.append(`Qu${count}`, `${result[i]["Question_id"]}`);
            formdata.append(`Ans${count}`, `${result[i]["Answer"]}`);
            count++;
        }   
        formdata.append('startTime',`${localStorage.getItem("startTime")}`)
        formdata.append('examTitle',result[0]["TestTitle"]);
        response = ajax('./responseFile/examResult.php',formdata,"POST");
        // console.log(typeof JSON.parse(response));
        if(response["result"] == "pass"){ $result = "Congratulations" }
        else { $result = "Oops Better luck next time" }
        showResult = `<div class="showResultContainer"><h3>${$result}</h3> <h4>Your score ${response["score"]}%</h4><a id="userPage" href="View/sample.php">Go to home</a></div>`
        $(".container").hide();
        $(".showResult").show();
        $(".showResult").html(showResult);
        localStorage.clear();
        // localStorage.setItem("userid",response["name"]+result[0]["TestTitle"])
        }
      })
    }

    export {renderFormSubmit};
