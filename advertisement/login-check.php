<?php
include 'connect.php';
if(isset($_POST["btn"]))
{
	$query="SELECT * FROM `users` WHERE `email` = ? AND `password` = ? and `state` = 1";
	$result=$connect->prepare($query);
	$result->bindValue(1,$_POST["email"]);
	$result->bindValue(2,$_POST["password"]);
	$result->execute();
	$tedad=$result->rowCount();
	if($tedad==1)
	{
			//header("location:user/user-panel.php");
			//exit;
		echo 'yes';
	}
	else
	{
		echo '<span style="color:red;">نام کاربری یا گذر واژه اشتباه است</span>';
	}
}






else
{
	header("location:index.php");
	exit;
}

?>