<?php
if(isset($_POST["btn"]))
{
include 'connect.php';
include 'PHPMailer/class.phpmailer.php';
$rand=rand(100000,999999);
$query="select * from users where email = ?";
$result=$connect->prepare($query);
$result->bindValue(1,$_POST["email"]);
$result->execute();
$tedad=$result->rowCount();
if($tedad==0)
{
	$mail=new PHPMailer(true);
	$mail->IsSMTP();
	$mail->Host='smtp.gmail.com';
	$mail->SMTPAuth=true;
	$mail->SMTPSecure="ssl";
	$mail->Port=465;
	$mail->Username="mre106.php@gmail.com";
	$mail->Password="AppleId123";
	$mail->AddAddress($_POST["email"]);
	$mail->SetFrom("mre106.php@gmail.com","دانشجویار") ;
	$mail->Subject='تائیدیه ثبت نام ';
	$mail->CharSet="UTF-8";
	$mail->ContentType="text/htm";
	$mail->MsgHTML('
	
	
	<p align="right">
	کاربر گرامی سلام
	<br><br>
	از اینکه در وب سایت ما ثبت نام کردید خرسندیم .
	<br><br>
	اطلاعات ورود شما به شرح زیر می باشد :
	<br><br>
	نام کاربری : '.$_POST["email"].'
	<br><br>
	گذرواژه : '.$rand.'
	<br><br>
	برای فعال سازی حسابتان روی لینک زیر کلیک کنید :
	<br><br>
	<a href="http://localhost/sheypoor/change-user-state.php?mail='.$_POST["email"].'">لینک فعال سازی</a>
	</p>
	
	
	');
	
	if($mail->Send())
	{
	$query2="INSERT INTO `users` (`id`, `fname`, `lname`, `phone`, `ostan`, `city`, `email`, `password`, `state`) VALUES (NULL, '', '', '', '', '', ?, ?, '0');";
	$result2=$connect->prepare($query2);
	$result2->bindValue(1,$_POST["email"]);
	$result2->bindValue(2,$rand);
	if($result2->execute())
	{
		echo '<span style="color:green;font-size:15px;">شما با موفقیت ثبت نام شدید . لطفا جهت فعال سازی حساب ایمیلتان را بررسی کنید.</span>';
	}
		
	}
	else
	{
		echo 'خطا در ارسال ایمیل';
	}
	
	
}
else
{
echo 'login';
}	
}





else
{
	header("location:index.php");
	exit;
}

?>