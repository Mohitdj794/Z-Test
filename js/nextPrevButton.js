import {addData} from './localstorageSaveData.js';
function showSingleQuestion(result){
   
    $(".showResult").hide();
            var num=1,methodHandle;
            $('#prev').hide();
                $("#next").click(function(){
                    methodHandle = addData(num);
                    if (methodHandle==true ){
                            $('#prev').show();
                            if (num == result-1)    {
                            $('#next').hide();
                            $("#submit").show();
                            }   
                            $(`.question.${num}`).hide();
                            num++;
                            $(`.question.${num}`).show();
                }
                
                })
                $("#prev").click(function(){
                    $('#next').show();
                    if(num == 2){
                    $('#prev').hide();
                    }
                    $(`.question.${num}`).hide();
                    num--;
                    $(`.question.${num}`).show();
                    $("#submit").hide();
                })
        }
        export {showSingleQuestion};

