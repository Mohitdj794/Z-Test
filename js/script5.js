function checkEmail() {
    jQuery.ajax({
      url: "/View/insert.php",
      data:'email='+$("#exampleInputEmail1").val(),
      type: "POST",
      success:function(data){
  $("#emailExists").html(data);
  },
  error:function (){}
  });
  }