<?php
session_start();
include '../connect.php';
$sql="UPDATE `sheypoor`.`users` SET `fname` = ?, `lname` = ?, `phone` = ?, `ostan` = ?, `city` = ?, `password` = ? WHERE `users`.`email` = ?;";
$result=$connect->prepare($sql);
$result->bindValue(1,$_POST["fname"]);
$result->bindValue(2,$_POST["lname"]);
$result->bindValue(3,$_POST["phone"]);
$result->bindValue(4,$_POST["ostan"]);
$result->bindValue(5,$_POST["city"]);
$result->bindValue(6,$_POST["password"]);
$result->bindValue(7,$_SESSION["useremail"]);
if($result->execute())
{
	echo '<span style="color:green">مشخصات حساب شما با موفقیت تغییر کرد</span>';
}
else
{
	echo '<span style="color:red;">خطا در تغییر مشخصات حساب</span>';
}
?>