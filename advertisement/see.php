<?php
include 'connect.php';
$query="SELECT * FROM `see` WHERE `name` = ?";
$result=$connect->prepare($query);
$result->bindValue(1,$_GET["ostan"]);
$result->execute();
$tedad=$result->rowCount();
$data=$result->fetch(PDO::FETCH_OBJ);
if($tedad==0)
{
$query2="INSERT INTO `sheypoor`.`see` (`id`, `name`, `number`) VALUES (NULL, ?, '1');";
$result2=$connect->prepare($query2);
$result2->bindValue(1,$_GET["ostan"]);
if($result2->execute())
{
	header("location:ostan.php?ostan=".$_GET["ostan"]);
	exit;
}
}
else
{
$query2="UPDATE `sheypoor`.`see` SET `number` = ? WHERE `see`.`name` = ?;";
$result2=$connect->prepare($query2);
$result2->bindValue(1,$data->number+1);
$result2->bindValue(2,$_GET["ostan"]);
if($result2->execute())
{
	header("location:ostan.php?ostan=".$_GET["ostan"]);
	exit;
}
}
?>