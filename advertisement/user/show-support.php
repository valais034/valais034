<?php session_start();
 include 'header.php' ?>
 <script>
 $(document).ready(function(e) {
    $(".delete").click(function(){
		var id = $(this).attr("id");
		$.post("delete-support-check.php",{id:id},function(data){
			$("#jadval").html(data);
			
			});
		});
});
 </script>
<div align="center" id="jadval">
<table border="1" width="700" style="text-align:center" >
<tr>
<td>#</td>
<td width="450">موضوع</td>
<td>وضعیت</td>
<td>نمایش</td>
<td>حذف</td>
</tr>
<?php
include '../connect.php';
$sql1="select * from users where `email` = ?  and `state` = 1";
$result1=$connect->prepare($sql1);
$result1->bindValue(1,$_SESSION["useremail"]);
$result1->execute();
$data1=$result1->fetch(PDO::FETCH_OBJ);



$sql="select * from support WHERE user = ?";
$result=$connect->prepare($sql);
$result->bindValue(1,$data1->id);
$result->execute();
$rows=$result->fetchAll(PDO::FETCH_ASSOC);
$i=1;
foreach($rows as $row)
{
	echo '<tr>
	<td>'.$i.'</td>
	<td>'.$row["titr"].'</td>
	<td>';
	if($row["state"]=="0")
	{
		echo 'در حال بررسی';
	}
	else
	{
		echo 'پاسخ داده شده';
	}
	
	echo '</td>
	<td><a href= "show-answer-support.php?id='.$row["id"].'" style="color:green;">نمایش</a></td>
	<td><a href= "#" style="color:red;" class="delete" id='.$row["id"].'>حذف</a></td>
	
	</tr>';
	$i++;
}
?>
</table>

</div>

<?php include 'footer.php' ?>