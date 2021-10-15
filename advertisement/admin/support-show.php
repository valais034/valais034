<?php  include 'header.php' ?>
<div align="center">
<table border="1" width="700">
<tr>
<td>#</td>
<td width="500">موضوع</td>
<td>پاسخگویی</td>
<td>حذف</td>
</tr>
<?php
include '../connect.php';
$sql="select * from support WHERE `state` = 0";
$result=$connect->query($sql);
$rows=$result->fetchAll(PDO::FETCH_ASSOC);
$i=1;
foreach($rows as $row)
{
	echo '<tr>
	<td>'.$i.'</td>
	<td>'.$row["titr"].'</td>
	<td><a href ="answer-support.php?id='.$row["id"].'" style="color:blue">پاسخگویی</a></td>
	<td><a href= "#" style="color:red;">حذف</a></td>
	
	</tr>';
}
?>
</table>
</div>
<?php  include 'footer.php' ?>