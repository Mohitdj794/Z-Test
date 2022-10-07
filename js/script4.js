$(document).ready(function(){
    $(document).on("submit","#FormLogin",function(e){
        e.preventDefault();
        var data = new FormData(this);
        if( data.get("mail") == "ziffity123@gmail.com" && data.get("psw") == "Ztest123"){
            window.location= "/Z-Test/View/ViewCourse.php";
        }
        else {
            $.ajax({
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
                console.log(response);
                if(response.charAt(0)=="[" && response.charAt(response.length-1)=="]"){
                    result = JSON.parse(response);  
                    
                    window.location= `/Z-Test/View/sample.php?id=${result[0]["username"]}`;
                }else{
                    $("#errorMissMatch").html(response);
                }
            },
            error:function(request,error){
                console.log(arguments);
                console.log(error);
            }
            })
        }
    })
})