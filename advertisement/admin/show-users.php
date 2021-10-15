<?php  include 'header.php' ?>
<script>
$(document).ready(function(e) {
    $(".delete").click(function(){
		
		var id = $(this).attr("id");
		$.post("delete-user.php",{id:id},function(data){
			
			$("#jadval").html(data);
			});
		
		});
});

</script>
<div align="center" id="jadval">
<table border="1" width="700" style="text-align:center">
<tr>
<td>#</td>
<td width="300">نام و نام خانوادگی</td>
<td>شماره تماس</td>
<td>ایمیل </td>
<td>حذف</td>
</tr>
<?php
include '../connect.php';
$sql="select * from users WHERE `state` = 1";
$result=$connect->query($sql);
$rows=$result->fetchAll(PDO::FETCH_ASSOC);
$i=1;
foreach($rows as $row)
{
	echo '<tr>
	<td>'.$i.'</td>
	<td>'.$row["fname"].' '.$row["lname"].'</td>
	<td>'.$row["phone"].'</td>
	<td>'.$row["email"].'</td>
	<td><a href= "#" style="color:red;" class="delete" id='.$row["id"].'>حذف</a></td>
	
	</tr>';
}
?>
</table>
</div>
<?php  include 'footer.php' ?>