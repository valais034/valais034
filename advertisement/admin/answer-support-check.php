<?php
include '../connect.php';
$query="INSERT INTO `sheypoor`.`answer-support` (`id`, `support-id`, `answer`) VALUES (NULL, ?, ?);";
$result=$connect->prepare($query);
$result->bindValue(1,$_POST["id"]);
$result->bindValue(2,$_POST["answer"]);
if($result->execute())
{
$query2="UPDATE `support` SET `state`=1 WHERE `id` = ?";
$result2=$connect->prepare($query2);
$result2->bindValue(1,$_POST["id"]);
if($result2->execute())
{
	echo 'Ok';
}
else
{
	echo 'Error';
}
}
else
{
	echo 'Error';
}
?>