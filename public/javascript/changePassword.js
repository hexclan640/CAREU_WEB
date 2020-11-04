$(document).ready(function(){
	$("#submit").click(function(event){
		event.preventDefault();

		var userName=document.getElementById("username").value;
		var password1=document.getElementById("password1").value;
		var password2=document.getElementById("password2").value;

		if(password1!="" && password2!="" && userName!="")
		{
			if(password1==password2)
			{
				var formData=$("#changePassword").serialize();
				$.post("php/changePassword.php",
					formData,
					function(data,status){
						if(data=="success" && status=="success")
						{
							console.log("hhghj");
							location.replace("index.php");
						}
						else
						{
							$("#error1").addClass("hidden");
							$("#error2").addClass("hidden");
							$("#error3").removeClass("hidden");
						}	
					});
			}
			else
			{
				$("#error2").addClass("hidden");
				$("#error3").addClass("hidden");
				$("#error1").removeClass("hidden");
			}
		}
		else
		{
			$("#error1").addClass("hidden");
			$("#error3").addClass("hidden");
			$("#error2").removeClass("hidden");
		}
	});
});