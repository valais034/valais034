<?php
session_start();
include '../connect.php';
$query="DELETE FROM `sheypoor`.`support` WHERE `support`.`id` = ?";
$result=$connect->prepare($query);
$result->bindValue(1,$_POST["id"]);
if($result->execute())
{
$query2="DELETE FROM `sheypoor`.`answer-support` WHERE `answer-support`.`support-id` = ?";
$result2=$connect->prepare($query2);
$result2->bindValue(1,$_POST["id"]);

if($result2->execute())
{
	?>
    <table border="1" width="700" style="text-align:center" >
<tr>
<td>#</td>
<td width="450">موضوع</td>
<td>وضعیت</td>
<td>نمایش</td>
<td>حذف</td>
</tr>
<?php
$sql1="select * from users where `email` = ?  and `state` = 1";
$result1=$connect->prepare($sql1);
$result1->bindValue(1,$_SESSION["useremail"]);
$result1->execute();
$data1=$result1->fetch(PDO::FETCH_OBJ);



$sql3="select * from support WHERE user = ?";
$result3=$connect->prepare($sql3);
$result3->bindValue(1,$data1->id);
$result3->execute();
$rows3=$result->fetchAll(PDO::FETCH_ASSOC);
$i=1;
foreach($rows3 as $row3)
{
	echo '<tr>
	<td>'.$i.'</td>
	<td>'.$row3["titr"].'</td>
	<td>';
	if($row3["state"]=="0")
	{
		echo 'در حال بررسی';
	}
	else
	{
		echo 'پاسخ داده شده';
	}
	
	echo '</td>
	<td><a href= "show-answer-support.php?id='.$row3["id"].'" style="color:green;">نمایش</a></td>
	<td><a href= "#" style="color:red;" class="delete" id='.$row3["id"].'>حذف</a></td>
	
	</tr>';
	$i++;
}
?>
</table>
    
    <?php
}
else
{
}



}
else
{
}

?>