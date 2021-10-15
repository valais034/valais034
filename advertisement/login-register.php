<?php include 'header.php'?>
<script>
$(document).ready(function(){
	$("#password").hide();
	$("#loginregisterbtn2").hide();
	$("#email").css({"background":"#fff","border":"1px solid #BDBDBD"});
	$("#msg").hide();
	$("#loginregisterbtn").click(function(){
		
		var email = $("#email").val();
		if(email =="")
			{
				$("#email").css({"background":"pink","border":"1px solid #BDBDBD"});
				return false;
			}
		$.post("login-register-check.php",{email:email,btn:true},function(data){

			if(data=="login")
			{
			$("#password").show();
			$("#loginregisterbtn2").show();
			$("#loginregisterbtn").hide();
				return false;
			}
			
			$("#msg").show();
			$("#msg").html(data);

		});
		
	});
	
	$("#loginregisterbtn2").click(function(){
		var email = $("#email").val();
		var password = $("#password").val();
		if(email == "")
			{
				$("#email").css({"background":"pink","border":"1px solid #BDBDBD"});
				return false;
			}
			if(password == "")
			{
				$("#password").css({"background":"pink","border":"1px solid #BDBDBD"});
				return false;
			}
		$.post("login-check.php",{email:email,password:password,btn:true},function(data2){
			if(data2=="yes")
				{
					window.location.replace("user/user-login-check.php?email="+email+"&pass="+password);
					return false;
				}
		$("#msg").show();
		$("#msg").html(data2);
		
		});	
		
	});
	
});
</script>
<div id="loginregister">
	
	
	<div class="login-register-titr">
		
		ورود / ثبت نام


	</div>
	
	
	<div class="login-register-txt">
		
		لطفا برای ورود یا ثبت نام   آدرس پست الکترونیکی خود را وارد کنید.


	</div>
	
	
	<div class="login-register-email">
		<input type="text" placeholder="آدرس پست الکترونیک ..." id="email">
		
	</div>
	
	<div class="login-register-email">
		<input type="text" placeholder="گذرواژه ..." id="password">
		
	</div>
	
	<p align="center" id="msg"></p>
	
	<div class="login-register-btn">
		<input type="button" value="ورود یا ثبت نام در شیپور" id="loginregisterbtn">
		
	</div>
	<div class="login-register-btn">
		<input type="button" value="ورود در شیپور" id="loginregisterbtn2">
		
	</div>
<div align="center" style="margin:10px 0;" ><a href="forget-pass.php" style="color:red">رمز عبور خود را فراموش کرده ام !</a></div>
	
	
	
	
	
	
</div>


<?php include 'footer.php'?>