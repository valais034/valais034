<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<script src="js/jquery.js"></script>
<script src="js/jquery.form.js"></script>
<script>
	$(document).ready(function(){
		
		$(".map").mouseenter(function(){
		var id=$(this).attr("id");
			$("."+id).css("color","#DF7206")
		});
		
		$(".map").mouseout(function(){
		var id=$(this).attr("id");
			$("."+id).css("color","#0078C1")
		});
		
	});

</script>
</head>
<body>
<!-------START OF HEADER----->
<div id="header">
	<div id="logo">
		<img src="images/logo.png">
	</div>
	<div id="login">

		<ul id="login_ul">
			<li><a href="all-agahi.php">همه آگهی ها</a></li>
			<li id="myaccount">حساب من
			
			<ul id="myaccountul">
				<li><a href="mylike.php">پسندیده ها</a></li>
				<li><a href="login-register.php">ورود / ثبت نام</a></li>
			</ul>
			
			</li>
		</ul>
		
			
	</div>
	<div id="sabt">
		پشتیبانی
		<span id="suporttxt"></span>
		<a href="free-register.php"><input type="submit" id="sabt_btn" value="+ ثبت آگهی رایگان"></a>
	</div>
</div>
<!------END OF HEADER------->