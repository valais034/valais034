<link href="css/style.css" rel="stylesheet" type="text/css">
<script src="js/jquery.js"></script>
<script>
$(document).ready(function(){
	
	var i = 7;
	function timer()
	{
		$(".number").html(i);
		i--;
		if(i == -2)
			{
				window.location.replace('login-register.php');
			}
	}
	setInterval(timer,1000);
	
});
</script>
<?php
include 'connect.php';
if(isset($_GET["mail"]))
{
	$query="select * from users where email = ? and state= 0";
	$result=$connect->prepare($query);
	$result->bindValue(1,$_GET["mail"]);
	$result->execute();
	$tedad=$result->rowCount();
	if($tedad==1)
	{
		$query2="UPDATE `users` SET `state`=1 WHERE email = ? and state = 0";
		$result2=$connect->prepare($query2);
		$result2->bindValue(1,$_GET["mail"]);
		if($result2->execute())
		{
			echo '
			<div id="timer">
			<p align="center" style="color:#27ae60;margin-top:20px;"> حساب شما با موفقیت فعال شد</p>
			<p align="center" style="color:#27ae60;margin-top:20px;"> شما تا <span class="number"></span> ثانیه دیگر وارد صفحه ی ورود می شوید.</p>
			
			</div>
			
			';
		}
		else
		{
			echo 'خطا در فعال سازی حساب';
		}
	}
	else
	{
			header("location:index.php");
			exit;
	}
}

else
{
	header("location:index.php");
	exit;
}
?>