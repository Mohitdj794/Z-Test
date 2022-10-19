
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

                function Add1(data){
                this.Insert=ko.observable(data);

               }
                ko.applyBindings(new Add1(response),document.getElementById("error"));
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
})

