<?php
 session_start();
 include 'header.php';
 ?>
 <?php
include '../connect.php';
$sql="select * from users where `email` = ?  and `state` = 1";
$result=$connect->prepare($sql);
$result->bindValue(1,$_SESSION["useremail"]);
$result->execute();
$data=$result->fetch(PDO::FETCH_OBJ);
?>
<script>
$(document).ready(function(e) {
	$("#ostan").val(<?= $data->ostan ?>);
	$("#city").val(<?= $data->city ?>);	
    $("#register").click(function(){
		
		var fname = $("#fname").val();
		var lname = $("#lname").val();
		var phone = $("#phone").val();				
		var ostan = $("#ostan").val();
		var city = $("#city").val();
		var password = $("#password").val();
		if(password =="")
		{
			alert("لطفا گذرواژه را وارد نمایید");
			return false;
		}
		if(phone =="")
		{
			alert("لطفا شماره تماس را وارد نمایید");
			return false;
		}
		$.post("change-user-account.php",{fname:fname,lname:lname,phone:phone,ostan:ostan,city:city,password:password},function(data){
			
			$("#msg").html(data);
			
			});					
		
		});
});
</script>


<div id="loginregister">
	
	
	<div class="login-register-titr">
		
		تنظیمات حساب کاربری


	</div>
	
	
	<div class="login-register-txt">
		
		

	</div>
	<div id="msg" align="center"></div>
		<div class="login-register-email">
		<input type="text" placeholder="نام  ..." id="fname" value="<?= $data->fname ?>">
	</div>
    
    <div class="login-register-email">
		<input type="text" placeholder="نام خانوادگی  ..." id="lname" value="<?= $data->lname ?>">
	</div>
    
    <div class="login-register-email">
		<input type="text" placeholder="شماره تماس  ..." id="phone" value="<?= $data->phone ?>">
	</div>
    
        <div class="login-register-email">
		<select style="width:91%;height:40px;margin-right:15px;margin-top:10px;" id="ostan">
        <option value="1">مازندران</option>
         <option value="2">گیلان</option>
        </select>
	</div>
    
        <div class="login-register-email">
			<select style="width:91%;height:40px;margin-right:15px;margin-top:20px;" id="city">
        <option value="1">بهشهر</option>
         <option value="2">ساری</option>
        </select>
	</div>
        <div class="login-register-email">
		<input type="text" placeholder="گذرواژه   ..." id="password" value="<?= $data->password ?>">
	</div>
	
	
	<div class="login-register-btn">
		<input type="button" value="ثبت اطلاعات کاربری" id="register">
		
	</div>
	

	
	
	
	
	
	
</div>

<?php include 'footer.php';?>