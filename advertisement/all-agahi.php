<?php include 'header.php'; ?>
<div id="search">
<form action="search.php" method="get">
<input type="text" name="searchtxt" placeholder="جست و جو ..." id="searchbox">	
<select name="group">
	<option>موبایل</option>
</select>
<select name="city">
	<option>مازندران</option>
</select>
<input type="submit" value="جست و جو" id="searchbtn">
</form>
</div>

<div id="cat">

	<div class="cat_part">
	<div class="cat_part_img"><img src="images/Mobile_Icon.png"></div>
	<div class="cat_part_txt">موبایل و تبلت و لوازم</div>
	</div>
	
	
	<div class="cat_part">
	<div class="cat_part_img"><img src="images/36.Watch-512.png"></div>
	<div class="cat_part_txt"> لوازم شخصی  </div>
	</div>
	
		<div class="cat_part">
	<div class="cat_part_img"><img src="images/Mobile_Icon.png"></div>
	<div class="cat_part_txt">موبایل و تبلت و لوازم</div>
	</div>
	
	
	<div class="cat_part">
	<div class="cat_part_img"><img src="images/36.Watch-512.png"></div>
	<div class="cat_part_txt"> لوازم شخصی  </div>
	</div>
	
		<div class="cat_part">
	<div class="cat_part_img"><img src="images/Mobile_Icon.png"></div>
	<div class="cat_part_txt">موبایل و تبلت و لوازم</div>
	</div>
	
	
	<div class="cat_part">
	<div class="cat_part_img"><img src="images/36.Watch-512.png"></div>
	<div class="cat_part_txt"> لوازم شخصی  </div>
	</div>
	
		<div class="cat_part">
	<div class="cat_part_img"><img src="images/Mobile_Icon.png"></div>
	<div class="cat_part_txt">موبایل و تبلت و لوازم</div>
	</div>
	
	
	<div class="cat_part">
	<div class="cat_part_img"><img src="images/36.Watch-512.png"></div>
	<div class="cat_part_txt"> لوازم شخصی  </div>
	</div>
	
	
	<div class="cat_part">
	<div class="cat_part_img"><img src="images/Mobile_Icon.png"></div>
	<div class="cat_part_txt">موبایل و تبلت و لوازم</div>
	</div>
	
	
	<div class="cat_part">
	<div class="cat_part_img"><img src="images/36.Watch-512.png"></div>
	<div class="cat_part_txt"> لوازم شخصی  </div>
	</div>
</div>


<div id="agahitxt">همه آگهی در استان مازندران</div>
<div id="agahi">

<?php
	include 'connect.php';
	
	if(!isset($_GET["page"]))
	{
		$_GET["page"]="0";
	}
	$query0="SELECT * FROM `agahi` ";
	$result0=$connect->query($query0);
	$tedad0=$result0->rowCount();
	
	
	
	$query="SELECT * FROM `agahi`  limit ".$_GET["page"]." , 3";
	$result=$connect->query($query);
	$tedad=$result->rowCount();
	if($tedad=="")
	{
		echo '<div style="color:red;font-weight:bold;font-size:20px;text-align:center">متاسفانه آگهی برای استان مورد نظر یافت نشد!</div>';
	}
	else
	{
	$record=$result->fetchAll(PDO::FETCH_ASSOC);
	foreach($record as $row)
	{
	$query2="SELECT * FROM `agahi_pic` WHERE `code` = ? limit 1";
	$result2=$connect->prepare($query2);
	$result2->bindValue(1,$row["code"]);
	$result2->execute();
	$record2=$result2->fetchAll(PDO::FETCH_ASSOC);
	foreach($record2 as $row2)
		echo '
		<a href="more-agahi.php?agahiid='.$row["code"].'"><div class="agahi_part">
		<div class="agahi_part_pic"><img src='.$row2["src"].' width=250 height=200></div>
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
			echo '<div class="agahi_like" id='.$row["code"].'><img src="images/unlike.png" width=70 height=70></div>';
		}
		else
		{
			echo '<div class="agahi_like" id='.$row["code"].'><img src="images/like.png" width=70 height=70></div>';
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
$number = ceil($tedad0/3);
for($i=0;$i<$number;$i++)
{
	$i2=$i+1;
	$startpagenumber=$i*3;
	echo '<a href=?page='.$startpagenumber.'>'.$i2.'</a>&nbsp;&nbsp;&nbsp;&nbsp;';
}

?>

</div>	
	
	
</div>

<script>
$(document).ready(function(e) {
    $(".agahi_like").click(function(){
		
		var code = $(this).attr("id");
		$.post("like.php",{id:code},function(data){
			$("#"+code).html(data);
			
			});
		return false;
		});
	
});
</script>

<?php include 'footer.php'; ?>