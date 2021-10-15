<?php
include 'connect.php';
$sql="select * from favorite where agahi = ?";
$result=$connect->prepare($sql);
$result->bindValue(1,$_POST["id"]);
$result->execute();
$tedad=$result->rowCount();
echo $tedad;


?>