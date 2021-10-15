<?php include 'header.php';?>

<?php
include '../connect.php';
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
<script>
	$(document).ready(function(){
		
		$("#phonebtn").click(function(){
			
			$(this).val(' تماس با 0'+<?=$data->phone?>);
			$("#phonenumber").html('0'+<?=$data->phone?>);
		});
			
			$("#phonenumber").click(function(){
			
			$("#phonebtn").val(' تماس با 0'+<?=$data->phone?>);
			$(this).html('0'+<?=$data->phone?>);
		});
				
		var pic =1;

			
		function slider()
		{
			
		if(pic > $("#slider .item").length)
		{
			pic=1;
		}
		if(pic < 1)
		{
		pic= $("#slider .item").length;		
		}
		$("#slider").find(".item").hide();
		$("#slider").find(".item").eq(pic-1).fadeIn(500);
		pic++;
		}
			$("#next").click(function(){
				
				slider();
			});
				
			$("#back").click(function(){
				pic-=2;
				slider();
			});
				
		slider();	
				$("#like").click(function(){
					var agahiid=<?= $_GET["agahiid"]?>;
						$.post("like.php",{id:agahiid},function(data){
						
						$("#like").html("");
						$("#like").html(data);
					});
				});
				
				function likenumber()
				{
					var id=<?= $_GET["agahiid"]?>;
					$.post("likenumber.php",{id:id},function(data){
						$("#likenumber").html(data);
						});
				}
				setInterval(likenumber,100);
				
				
		
	});
</script>
<div id="right-more-agahi">



	<div id="slider">	
	<span id="next"></span>
	<span id="back"></span>
	<?php
		$sql2="select * from agahi_pic where code = ?";
		$result2=$connect->prepare($sql2);
		$result2->bindValue(1,$_GET["agahiid"]);
		$result2->execute();
		$rows=$result2->fetchAll(PDO::FETCH_ASSOC);
		foreach($rows as $row)
		{
			echo '<span class=item><img src=../'.$row["src"].'></span>';
		}
		?>
	
	
	
	
	</div>
	
	
	
	
	<div id="title-more-agahi"><?= $data->title; ?></div>
	<div id="gheymat-more-agahi"><?= number_format($data->gheymat); ?> تومان</div>
	<div id="tozihat-more-agahi"><?= $data->description; ?></div>
	<div id="phone-more-agahi"> شماره تماس تایید شده :<span id="phonenumber"><?= substr($data->phone,0,4).'xxx'.substr($data->phone,7,4)?>  (نمایش کامل)</span></div>
<div style="color:red;margin:20px 0;font-size:20px;font-weight:bold;">    آگهی های مشابه</div>
    <div id="moshabeh">
    
    
    <?php
	$sql4="select * from agahi where `group` = ? AND `id` != ? ORDER BY `agahi`.`id` DESC limit 0 ,6 ";
	$result4=$connect->prepare($sql4);
	$result4->bindValue(1,$data->group);
	$result4->bindValue(2,$data->id);
	$result4->execute();
	$rows2=$result4->fetchAll(PDO::FETCH_ASSOC);
	foreach($rows2 as $row2)
	{
	$sql5="select * from agahi_pic where `code` = ?";
	$result5=$connect->prepare($sql5);
	$result5->bindValue(1,$row2["code"]);
	$result5->execute();
	$data2=$result5->fetch(PDO::FETCH_OBJ);
		
		
		echo '<a href=?agahiid='.$row2["code"].'><div class="moshabeh_part">
    <div class="moshabeh_part_pic" align="center"><img src=../'.$data2->src.' width="200" height="150"></div>
    <div class="moshabeh_part_name" align="center">'.$row2["title"].'</div>
    <div class="moshabeh_part_gheymat" align="center">'.number_format($row2["gheymat"]).' تومان</div>
    
    </div>';
	}
	
	?>
    



    </div>
</div>



<div id="left-more-agahi">
	<div id="profile">
		<div align="center" style="padding: 15px 0;" ><img src="../images/149452.png" width="80" height="80"></div>
		<div><input type="button" class="phonenumberbtn" id="phonebtn" value="تماس با <?= substr($data->phone,0,4).'xxx'.substr($data->phone,7,4)?>"> </div>
		<div><input type="button" class="phonenumberbtn" value="ایمیل"> </div>
	</div>
	<?php
	$sql3="select * from favorite where user = ? and agahi= ?"		;
	$result3=$connect->prepare($sql3);
	$result3->bindValue(1,$_SERVER["REMOTE_ADDR"]);
	$result3->bindValue(2,$_GET["agahiid"]);
	$result3->execute();
	$tedad3=$result3->rowCount();
	if($tedad3=="0")
	{
		echo '<div id="like" align=center style="margin:10px 0;"><img src=../images/unlike.png width=80 height=80></div>';
	}
	else
	{
		echo '<div id="like" align=center style="margin:10px 0"><img src=../images/like.png width=80 height=80></div>';
	}
			
	?>
    <div align="center" ><span id="likenumber"></span> لایک</div>
	<div class="share"> اشتراک</div>
	
</div>
<?php }include 'footer.php'; ?>