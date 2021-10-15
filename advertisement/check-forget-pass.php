<?php
include 'connect.php';
include 'PHPMailer/class.phpmailer.php';
$sql="select * from users WHERE `email` = ? AND `state` = 1";
$result=$connect->prepare($sql);
$result->bindValue(1,$_POST["email"]);
$result->execute();
$tedad=$result->rowCount();
$data=$result->fetch(PDO::FETCH_OBJ);
if($tedad==0)
{
	echo '<span style="color:red;">ایمیل وارد شده معتبر نیست !</span>';
}
else
{
///////


	$mail=new PHPMailer(true);
	$mail->IsSMTP();
	$mail->Host='smtp.gmail.com';
	$mail->SMTPAuth=true;
	$mail->SMTPSecure="ssl";
	$mail->Port=465;
	$mail->Username="mre106.php@gmail.com";
	$mail->Password="09309426311";
	$mail->AddAddress($_POST["email"]);
	$mail->SetFrom("mre106.php@gmail.com","دانشجویار") ;
	$mail->Subject='بازیابی رمز عبور ';
	$mail->CharSet="UTF-8";
	$mail->ContentType="text/htm";
	$mail->MsgHTML('
	
	
	<p align="right">
	کاربر گرامی سلام
	<br><br>
اطلاعات حساب شما به شرح زیر است :
<br><br>
ایمیل :
<br>
'.$_POST["email"].'
<br><br>
گذرواژه : 
<br>
'.$data->password.'
<br><br>
لطفا در حفظ اطلاعات ورود خود مراقب باشید.
	</p>
	
	
	');
	
	if($mail->Send())
{
	echo '<span style="color:green;"> گذرواژه ی شما به پست الکترونیک شما ارسال شد</span>';
}




///////	
}

?>