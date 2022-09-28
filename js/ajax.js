function ajax (url,data,method){
    var Ajaxdata;
    if(data !== ''){
    $.ajax({
        type: method,
        url:url, 
        async:false,
        global:false,       
        data:data,
        processData: false,
        contentType: false,
        dataType:"json",
        success: function (response) {
            Ajaxdata = response;
        },
        error: function (request, error) {
            console.log(arguments);
            console.log(error);
        }
    })
    return Ajaxdata;
    }
    else{
        $.ajax({
            async:false,
            global:false,
            type: method,
            url:url, 
            dataType:"json",
            success: function (response) {
                Ajaxdata = response;
            },
            error: function (request, error) {
                console.log(arguments);
                console.log(error);
            }
        })
        return Ajaxdata;
    }
}
export {ajax};