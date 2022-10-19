var element=document.getElementById("FormLogin");
function userViewModel(){
    var self = this;
    self.pranoy = ko.observable();
    self.mail = ko.observable();
    self.password = ko.observable();
    self.loginSubmit = function(){
        var d1 = dataSubmit(self.mail(),self.password());
        console.log(d1);
        d1=d1.trim();
        if(d1.charAt(0)=="[" && d1.charAt(d1.length-1)=="]"){
                    result = JSON.parse(d1);  
                    window.location= `/Z-Test/View/sample.php?id=${result[0]["username"]}`;
                }
                else{
                   self.pranoy(d1)
                }
    }
}

ko.applyBindings(new userViewModel(),element);
function dataSubmit(mail,password){
    var pay;
    console.log(mail);
    console.log(password);
        var data = new FormData();
        data.append("mail",mail);
        data.append("psw",password);
        if( data.get("mail") == "ziffity123@gmail.com" && data.get("psw") == "Ztest123"){
            window.location= "/Z-Test/View/ViewCourse.php";
        }
        else {
            $.ajax({
            async:false,
            url:"View/fetch.php",
            type:"POST",
            dataType:"text",
            data:data,
            processData:false,
            contentType:false,
            beforeSend:function(){
                console.log("wait...");
            },
            success:function(response){
                pay = response;
            },
            error:function(request,error){
                console.log(arguments);
                console.log(error);
            }
            })
        }
return pay;
}