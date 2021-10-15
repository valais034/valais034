<?php
session_start();
include '../connect.php';

$sql40="select * from users where `email` = ?  and `state` = 1";
$result40=$connect->prepare($sql40);
$result40->bindValue(1,$_SESSION["useremail"]);
$result40->execute();
$data40=$result40->fetch(PDO::FETCH_OBJ);




$query="DELETE FROM `sheypoor`.`agahi` WHERE `agahi`.`code` = ?";
$result=$connect->prepare($query);
$result->bindValue(1,$_POST["id"]);
if($result->execute())
{
	
$query50="select * from `agahi_pic` where `code` = ?";
$result50=$connect->prepare($query50);
$result50->bindValue(1,$_POST["id"]);
$result50->execute();
$rows50=$result50->fetchAll(PDO::FETCH_ASSOC);
foreach($rows50 as $row50)
{
	unlink("../".$row50["src"]);
}
$query2="DELETE FROM `sheypoor`.`agahi_pic` WHERE `agahi_pic`.`code` = ?";
$result2=$connect->prepare($query2);
$result2->bindValue(1,$_POST["id"]);
if($result2->execute())
{
	
?>


<?php
	
	
	if(!isset($_GET["page"]))
	{
		$_GET["page"]="0";
	}
	$query0="SELECT * FROM `agahi`  WHERE `phone` = ?";
	$result0=$connect->prepare($query0);
	$result0->bindValue(1,$data40->phone);
	$result0->execute();
	$tedad0=$result0->rowCount();
	
	
	
	
	$query10="SELECT * FROM `agahi`  WHERE `phone` = ? limit ".$_GET["page"]." , 2 ";
	$result10=$connect->prepare($query10);
	$result10->bindValue(1,$data40->phone);
	$result10->execute();
	$tedad10=$result10->rowCount();
	if($tedad10==0)
	{
		echo '<div style="color:red;font-weight:bold;font-size:20px;text-align:center">شما هیچ آگهی درج نکرده اید       !</div>';
	}
	else
	{
	$record10=$result10->fetchAll(PDO::FETCH_ASSOC);
	foreach($record10 as $row)
	{
	$query30="SELECT * FROM `agahi_pic` WHERE `code` = ? limit 1";
	$result30=$connect->prepare($query30);
	$result30->bindValue(1,$row["code"]);
	$result30->execute();
	$record30=$result30->fetchAll(PDO::FETCH_ASSOC);
	foreach($record30 as $row30)
		echo '
		<a href="more-agahi.php?agahiid='.$row["code"].'"><div class="agahi_part">
		<div class="agahi_part_pic"><img src=../'.$row30["src"].' width=250 height=200></div>
		<div class="agahi_part_txt">
			<span class="agahi_titr">'.$row["title"].'</span>
			<br>
			<span class="address">'.$row["city"].'</span>
			<br><br><br><br>
			<span class="gheymat">'.$row["gheymat"].'</span>	
			<span class="address">تومان</span>	
			
		</div>
		<div class="agahi_part_like">';
		
		$query3="select * from favorite where user = ? and agahi = ?";
		$result3=$connect->prepare($query3);
		$result3->bindValue(1,$_SERVER["REMOTE_ADDR"]);
		$result3->bindValue(2,$row["code"]);
		$result3->execute();
		$tedad3=$result3->rowCount();
		if($tedad3==0)
		{
			echo '<div class="agahi_like" id='.$row["code"].'><img src="../images/unlike.png" width=70 height=70></div>
			<div class="delete" id="'.$row["code"].'" style="color:red;">حذف</div>
			';
		}
		else
		{
			echo '<div class="agahi_like" id='.$row["code"].'><img src="../images/like.png" width=70 height=70></div>
			<div class="delete" id="'.$row["code"].'" style="color:red;">حذف</div>			';
		}
		
		echo'
			
			<div class="agahi_time address">لحظاتی پیش</div>
			
		</div>
	</div></a>
		
		
		';
	}
}
	?>

	
	
	
<div align="center">
<?php

$number = ceil($tedad0/2);
for($i=0;$i<$number;$i++)
{
	$i2=$i+1;
	$startpagenumber=$i*2;
	echo '<a href=?page='.$startpagenumber.' style="color:red;">'.$i2.'</a>&nbsp;&nbsp;&nbsp;&nbsp;';
}

?>

</div>	




<?php
}
else
{
	echo '<span style="color:red">خطا در حذف تصاویر آگهی</span>';
}
}
else
{
	echo '<span style="color:red">خطا در حذف آگهی</span>';
}

?>