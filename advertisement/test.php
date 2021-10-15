<?php include 'header.php';?>
<script>
$(document).ready(function(){
	
	var pic =1;
		function slider()
		{
		if(pic > $("#slider .item").length)
		{
		pic=1;
		}	
		if(pic < 1 )
		{
		pic=$("#slider .item").length;
		}	
		$("#slider").find(".item").hide();
		$("#slider").find(".item").eq(pic - 1).fadeIn(500);
		pic++;
		}

		setInterval(slider,2000);
});
</script>
<?php
include 'connect.php';
$sql="select * from agahi where code = ?";
$result=$connect->prepare($sql);
$result->bindValue(1,$_GET["agahiid"]);
$result->execute();
$tedad=$result->rowCount();
$data=$result->fetch(PDO::FETCH_OBJ)	;
if($tedad==0)
{
	echo '<div style="color:red;font-weight:bold;text-align:center"> متاسفانه آگهی مورد نظر یافت نشد !</div>';
}
else
{

	

?>
<div id="right-more-agahi">



	<div id="slider">
	<?php
	$sql2="select * from agahi_pic where code = ?";
	$result2=$connect->prepare($sql2);
	$result2->bindValue(1,$_GET["agahiid"]);
	$result2->execute();
	$rows=$result2->fetchAll(PDO::FETCH_ASSOC);
	foreach($rows as $row)
	{
		echo '<span class="item" ><img src='.$row["src"].' ></span>';
	}
	?>
		
	</div>
	
	
	
	
	<div id="title-more-agahi"><?= $data->title; ?></div>
	<div id="gheymat-more-agahi"><?= number_format($data->gheymat); ?> تومان</div>
	<div id="tozihat-more-agahi"><?= $data->description; ?></div>
	<div id="phone-more-agahi"> شماره تماس تایید شده :<span id="phonenumber"><?= $data->phone; ?>  (نمایش کامل)</span></div>
</div>



<div id="left-more-agahi">
	<div id="profile">
		<div align="center" style="padding: 15px 0;" ><img src="images/149452.png" width="80" height="80"></div>
		<div><button class="phonenumberbtn" id="btn"> تماس با <?= $data->phone?></button></div>
		<div><button class="phonenumberbtn"> ایمیل </button></div>
	</div>
	<div class="share"> پسندیدم</div>
	<div class="share"> اشتراک</div>
	
</div>
<?php }include 'footer.php'; ?>