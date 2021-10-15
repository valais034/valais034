<?php include 'header.php'?>
<script>
$(document).ready(function(){
	$("#bazyabi").click(function(){
		var email = $("#email").val();
		$.post("check-forget-pass.php",{email:email},function(data){
			
			$("#msg").html(data);
			});
		
		});
});
</script>
<div id="loginregister">
	
	
	<div class="login-register-titr">
		
		بازیابی رمز عبور


	</div>
	
	
	<div class="login-register-txt">
		
		لطفا آدرس پست الکترونیک خود را وارد نمایید


	</div>
	<div id="msg" align="center"></div>
	
	<div class="login-register-email">
		<input type="text" placeholder="آدرس پست الکترونیک ..." id="email">
		
	</div>
	

	
	<p align="center" id="msg"></p>
	
	<div class="login-register-btn">
		<input type="button" value="بازیابی رمز عبور" id="bazyabi">
		
	</div>
	

	
	
	
	
	
	
</div>


<?php include 'footer.php'?>