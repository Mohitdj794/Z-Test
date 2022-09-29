$.validator.addMethod('mypass',function(value,element) {
    return this.optional(element) || /(?=^.{8,}$)(?=.*\d)(?=.*[!@#$%^&*]+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/.test(value);
});
$(document).ready(function () {
    $("#Form2").validate({
        rules:{
        first:{
            required:true,
        },
        last:{
            required:true,
        },
        name1:{
            required:true,
        },
        mail1:{
            required:true,
            email:true,
           
        },
        psw1:{
            required:true,
            minlength:8,
            mypass:true,
            
        },
        cpsw:{
             required:true,
             equalTo:"#exampleInputPassword1"
        }
    },
        messages:{
            first:{
                required:"please enter your firstname",
            },
            last:{
                required:"please enter your lastname",
            },
            name1:{
                required:"Please enter your name",
            },
            mail1:{
                required:"please enter your email id",
                email:"please enter valide email"

            },
            psw1:{
                required:"please enter your password",
                minlength:"password length must be 8",
                mypass:"Password must contain one uppercase one lowercase one number and special charecter",
            },
            cpsw:{
                required:"please match your password",
                equalTo:"password doesnt match"
            }
        }, 
        submitHandler: function(form) {
            form.submit();
        },
        
        highlight: function(element) {
            $(element).css('background', '#ffdddd');
        },
        
        unhighlight: function(element) {
            $(element).css('background', '#ffffff');
        }
    });
});
