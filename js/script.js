$(document).ready(function() {
   /* $(".addtocartbtn").click(function() {
        $(".modalopenbtn").click();
    });

   */

$(".addtocartbtn").click(function(){
	  
		var productId=$(this).attr("data-id");
		var isInCart=$(this).attr("data-isInCart");
		
		var fd = new FormData();
		fd.append('productId',productId);
		fd.append('isInCart',isInCart);
		fd.append('action',"update");
		
		var isLogin=$("#isLogin").val();
		
		if(isLogin!="0"){
        $.ajax({
            url: 'php_files/addorRemoveItem.php',
            type: 'post',
            data: fd,
			error: function(xhr, status, error) {
				console.log(error);
			},
            contentType: false,
            processData: false,
            success: function(response){
				if(parseInt(response)>0){
				   if(isInCart=="1")
					swal("product removed successfully");
				   else
				   swal("Product added successfully");
				   window.location="index.php";
				}
				else{
					swal("something went wrong");
				}
                
			},
		});
		}else{
		 $(".modalopenbtn").click();
		}
		
	});
	
	
	 $("#logout").click(function(){
		 $.ajax({
					url:'php_files/getLoginData.php',
					type:'post',
					error: function(xhr, status, error) {
						console.log(error);
			},
					data:{action:"logout"},
					success:function(response){
					console.log(response);
						var msg = "";
						if(response == 1){
							window.location = "index.php";
							}else{
							//msg = "वापरकर्ता किव्हा पासवर्ड  योग्य  प्रविस्ट करा !";
							swal("something went wrong");
						}
						//$("#message").html(msg);
					}
				});
	 });
	 
	 
	 $("#login1").click(function(){
		 $(".modalopenbtn").click();
	 });
	
         $("#login").click(function(){
			var username = $("#username").val().trim();
			var password = $("#password").val().trim();
			if(username == ""){
				swal({
					title: "error!",
					text: "please enter username!",
					icon: "warning",
				});
				
				}else if(password == ""){
				swal({
					title: "error !",
					text: "please enter password!",
					icon: "warning",
				});
				
			}
			else if(username != "" && password != "" ){
				$.ajax({
					url:'php_files/getLoginData.php',
					type:'post',
					error: function(xhr, status, error) {
				console.log(error);
			},
					data:{username:username,password:password,action:"login"},
					success:function(response){
					console.log(response);
						var msg = "";
						if(response == 1){
							window.location = "index.php";
							}else{
							//msg = "वापरकर्ता किव्हा पासवर्ड  योग्य  प्रविस्ट करा !";
							swal("username or password is wrong");
						}
						//$("#message").html(msg);
					}
				});
			}
		});
	
	
});