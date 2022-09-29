$(document).ready(function () {        
    $("#Form").validate({
        rules: {
            mail: {
                required: true,
                email: true,
            },
            psw:{
                required:true,
                minlength:8,
            }
        },
        messages:{
            mail:{
                required:"please enter your email id",
                email:"please enter valide email"
    
            },
            psw:{
                required:"please enter your password",
                minlength:"password length must be 8",
            }
        },
        submitHandler: function(form) {
            form.submit();
        },
        
        highlight: function(error) {
            $(error).css('background', '#ffdddd');
        },
        
        unhighlight: function(error) {
            $(error).css('background', '#ffffff');
        }
    });
});