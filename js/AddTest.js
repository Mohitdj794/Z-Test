let AddTest;
function Add1(data){
   return this.Insert=ko.observable(data);

    }
$(document).on("submit","#Add",function(e){
    e.preventDefault();
    var formdata = new FormData(this);
    $.ajax({
        type: "post",
        url:"./AddTest.php", 
        async:false,
        global:false,       
        data:formdata,
        processData: false,
        contentType: false,
        dataType:"text",
        success: function (response) {
            Ajaxdata = response;
            console.log(response);
            if(response!=="inserted sucessfully"){
                $("#error").html(response);
                // ko.applyBindings(new Add1(response));
            }
            else{
                window.location.href="/Z-Test/View/ViewCourse.php";
            }
        },
        error: function (request, error) {
            console.log(arguments);
            console.log(error);
        }
    })
    ko.applyBindings(new Add1(response));
})

