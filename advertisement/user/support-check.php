<?php
session_start();
include '../connect.php';

$sql0="select * from users where `email` = ?  and `state` = 1";
$result0=$connect->prepare($sql0);
$result0->bindValue(1,$_SESSION["useremail"]);
$result0->execute();
$data0=$result0->fetch(PDO::FETCH_OBJ);


$query="INSERT INTO `sheypoor`.`support` (`id`, `user`, `titr`, `tozihat`, `state`) VALUES (NULL, ?, ?, ?, '0');";
$result=$connect->prepare($query);
$result->bindValue(1,$data0->id);
$result->bindValue(2,$_POST["titr"]);
$result->bindValue(3,$_POST["tozihat"]);
if($result->execute())
{
	echo '<span style="color:green;font-size:18px;">درخواست پشتیبانی شما ثبت شد</span>';
}
else
{
	echo '<span style="color:red;font-size:18px;">خطا در ثبت پشتیانی لطفا مجددا اقدام نمایید</span>';
}

?>