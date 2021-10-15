<?php
session_start();
include '../connect.php';
$query="select * from users where email= ? and password = ? and state=1";
$result=$connect->prepare($query);
$result->bindValue(1,$_GET["email"]);
$result->bindValue(2,$_GET["pass"]);
$result->execute();
$tedad=$result->rowCount();
if($tedad==1)
{
	$_SESSION["useremail"]=$_GET["email"];
	header("location:user-panel.php");
	exit;
}
else
{
	header("location:../index.php");
	exit;
}
?>