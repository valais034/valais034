<?php
include 'header.php';
?>
/*  hi esi */
<!------START OF NYAZ------->
<div id="nyaz">
	<div id="nyaz_titr">نیازمندیهای رایگان شیپور</div>
	<div id="nyaz_txt">روزانه هزاران نفر از نیازمندیهای رایگان شیپور برای خرید و فروش هر چه که فکر میکنید از جمله خودرو، املاک، آپارتمان، گوشی موبایل و تبلت، لوازم خانگی، لوازم دست دوم، استخدام و... استفاده می کنند.</div>
	<div id="nyaz_footer">ثبت آگهی در شیپور سریع، آسان و %100 مجانی است.</div>
    <div>
    استان های پربازدید : &nbsp;&nbsp;
    <?php
	include 'connect.php';
	$query="SELECT * FROM `see` ORDER BY `number` DESC LIMIT 5;";
	$result=$connect->query($query);
	$rows=$result->fetchAll(PDO::FETCH_ASSOC);
	foreach($rows as $row)
	{
		echo '<span style="color:red;">'.$row["name"].' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> ';
	}
	?>
    </div>

</div>
<!------END OF NYAZ------->
<!------START OF MAP------->
<div id="map">
<div id="map_img">
	<img src="images/map.png" alt="" usemap="#Map" />
<map name="Map" id="Map">
   
   
    <area alt="" title="" href="see.php?ostan=مازندران" shape="poly" class="map" id="mazandaran" coords="248,118,241,114,241,111,235,110,230,108,222,110,202,114,190,116,183,114,171,112,164,106,161,113,162,117,168,119,174,122,178,125,182,128,190,130,196,133,199,138,208,131,216,134,225,134,232,134" />
    
    <area alt="" title="" href="see.php?ostan=خراسان " shape="poly" class="map" id="khorasan" coords="409,115,390,114,384,104,375,101,368,93,367,88,359,85,353,84,349,84,341,84,343,92,345,101,343,107,338,110,333,116,325,112,316,106,309,104,302,110,310,113,309,119,308,127,311,134,316,140,318,144,313,153,305,158,296,166,302,167,323,161,328,165,329,171,330,176,333,182,339,183,351,184,358,184,368,184,373,184,382,187,389,187,395,185,401,179,404,169,408,155,411,144" />
    
    <area alt="" title="" href="see.php?ostan=یزد" shape="poly" class="map" id="yazd" coords="276,206,268,213,261,220,243,225,228,227,219,230,218,244,220,252,227,257,231,265,235,273,239,284,243,289,248,297,253,302,257,301,257,288,254,279,254,274,264,270,272,269,278,269,283,264,284,255,294,251,304,245,296,229" />
  
  
</map>
	
</div>
<div id="map_name">

<div class="mapname_part">
	<div class="azarbayjan">آذربایجان شرقی</div>
	<div class="mazandaran">مازندران</div>
	<div class="alborz">البرز</div>
	<div class="tehran">تهران</div>
	<div>سمنان</div>
	<div class="khorasan">خراسان</div>
	<div>گیلان</div>
	<div>گلستان</div>
	<div>کردستان</div>
	<div class="yazd">یزد</div>
	<div>کرمان</div>
</div>
	
<div class="mapname_part">
	<div class="azarbayjan"> اردبیل</div>
	<div class="mazandaran">لرستان</div>
	<div class="alborz">مرکزی</div>
	<div class="tehran">قم</div>
	<div>کرمانشاه</div>
	<div class="khorasan">هرمزگان</div>
	<div>همدان</div>
	<div>رشت</div>
	<div>زنجان</div>
	<div class="yazd">قزوین</div>
	<div>سیستان و بلوچستان</div>
</div>
	
</div>
		</div>
<!------END OF MAP------->
<?php
include 'footer.php';
?>

</body>
</html>