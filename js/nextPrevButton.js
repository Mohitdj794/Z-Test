import { addData } from './localstorageSaveData.js';
function showSingleQuestion(result) {
    if (result == 1) {
        $(`.question.${1}`).show();
        $('#prev').hide();
        $('#next').hide();
        $("#submit").show();
    } else {
        $(".showResult").hide();
        var num, methodHandle;
        if (localStorage.getItem("num") === null || undefined) {
            num = 1;
            $(`.question.${num}`).show();
            localStorage.setItem("num", num);
        }
        else {
            num = localStorage.getItem("num");
            $(`.question`).hide();
            $(`.question.${num}`).show();
            if (num == result) {
                $('#next').hide();
                $("#submit").show();
            }
        }
        if (num == 1)
            $('#prev').hide();
        else
            $('#prev').show();

        $("#next").click(function () {
            methodHandle = addData(num);
            if (methodHandle == true) {
                $('#prev').show();
                if (num == result - 1) {
                    $('#next').hide();
                    $("#submit").show();
                }
                $(`.question.${num}`).hide();
                num++;
                $(`.question.${num}`).show();
                localStorage.setItem("num", num);
            }

        })
        $("#prev").click(function () {
            $('#next').show();
            if (num == 2) {
                $('#prev').hide();
            }
            $(`.question.${num}`).hide();
            num--;
            $(`.question.${num}`).show();
            $("#submit").hide();
            localStorage.setItem("num", num);
        })
    }
}
export { showSingleQuestion };

