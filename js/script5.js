$.ajax({
    url:"http://192.168.10.34/php_Assess/php_Assess/userDetail.php",
    type:"POST",
    mode:'no-cors',
    dataType:"json",
    sucess:function(data){
        console.log(data)
    },
    error:function(request,error){  console.log(error)}
})
