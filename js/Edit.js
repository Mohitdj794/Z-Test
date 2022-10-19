function Add(data){
    this.AddTest=ko.observable(data);
    }
$(document).on("submit","#Edit",function(e){
    e.preventDefault();
    var formdata = new FormData(this);
    $.ajax({
        type: "post",
        url:"./UpdateTest.php", 
        async:false,
        global:false,       
        data:formdata,
        processData: false,
        contentType: false,
        dataType:"text",
        success: function (response) {
            Ajaxdata = response;
            console.log(parseInt(response));
            
            if(response=="The Answer is not matched to the Options"){
                ko.applyBindings(new Add(response));
               
            }
            else{
                window.location.href=`/Z-Test/View/view.php?id=${response}`;
            }
        },
        error: function (request, error) {
            console.log(arguments);
            console.log(error);
        }
    })

})