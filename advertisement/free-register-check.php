<?php
include 'connect.php';
$rand=rand(1000000,999999999);
if($_POST["agahi_title"]==""||$_POST["mobile"]==""||$_POST["gheymat"]==""||$_POST["tozihat"]=="")
{
	echo '<span style="color:red"> لطفا تمام اطلاعات را وارد نمایید </span>';	
}
else
{
foreach($_FILES["pic"]["name"] as $key => $value)
{
	$picname=md5($_FILES["pic"]["name"][$key].microtime()).substr($_FILES["pic"]["name"][$key],-5,5);
	$src="agahi_pic/".$picname;
	$query="INSERT INTO `agahi_pic` (`id`, `src`, `code`) VALUES (NULL, ?, ?);";
	$result=$connect->prepare($query);
	$result->bindValue(1,$src);
	$result->bindValue(2,$rand);
	if($result->execute())
	{
		move_uploaded_file($_FILES["pic"]["tmp_name"][$key],$src);
	}



}
$query2 = "INSERT INTO `agahi` (`id`, `title`, `phone`, `gheymat`, `description`, `group`, `city`, `code`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?);";
$result2=$connect->prepare($query2);
$result2->bindValue(1,$_POST["agahi_title"]);
$result2->bindValue(2,$_POST["mobile"]);
$result2->bindValue(3,$_POST["gheymat"]);
$result2->bindValue(4,$_POST["tozihat"]);
$result2->bindValue(5,$_POST["group"]);
$result2->bindValue(6,$_POST["city"]);
$result2->bindValue(7,$rand);
if($result2->execute())
{
echo '<span style="color:green">آگهی شما با موفقیت درج شد</span>';	
}
else
{
echo '<span style="color:red"> متاسفانه آگهی شما درج نشد </span>';	
}
}
?>