<?php
include 'connect.php';
$sql="select * from favorite where user = ? and agahi = ?";
$result=$connect->prepare($sql);
$result->bindValue(1,$_SERVER["REMOTE_ADDR"]);
$result->bindValue(2,$_POST["id"]);
$result->execute();
$tedad=$result->rowCount();
if($tedad==0)
{
	$sql2="INSERT INTO `favorite` (`id`, `user`, `agahi`) VALUES (NULL, ?, ?);";
	$result2=$connect->prepare($sql2);
	$result2->bindValue(1,$_SERVER["REMOTE_ADDR"]);
	$result2->bindValue(2,$_POST["id"]);
	if($result2->execute())
	{
		echo '<img src=images/like.png width=70 height=70>';
	}
	else
	{
		
	}
	
	
	
	
}
else
{
$sql2="DELETE FROM `favorite` WHERE `user`= ? AND `agahi` = ?";
		$result2=$connect->prepare($sql2);
		$result2->bindValue(1,$_SERVER["REMOTE_ADDR"]);
		$result2->bindValue(2,$_POST["id"]);
		if($result2->execute())
		{
			echo '<img src=images/unlike.png width=70 height=70>';
		}
		else
		{
			
		}
	
}
?>