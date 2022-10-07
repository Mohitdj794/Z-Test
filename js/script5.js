// $(document).ready(function(){
//   $(document).on("submit","#Form2",function(e){
//       e.preventDefault();
//       var data = new FormData(this);
//           $.ajax({
//           url:"./View/insert.php",
//           type:"POST",
//           dataType:"json",
//           data:data,
//           processData:false,
//           contentType:false,
//           beforeSend:function(){
//               console.log("wait...");
//           },
//           success:function(response){
                
//                 console.log(response)
//           },
//           error:function(request,error){
//               console.log(arguments);
//               console.log(error);
//           }
//           })
//   })
// })