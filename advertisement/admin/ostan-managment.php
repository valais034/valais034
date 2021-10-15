<?php include 'header.php';?>
<script>
$(document).ready(function(e) {
    $("#btn").click(function(){
		var ostan=$("#ostan").val();
		if(ostan=="")
		{
			alert("لطفا نام استان را وارد نمایید !");
			return false;
		}
		$.post("add-ostan.php",{ostan:ostan},function(data){
			$("#jadval").html(data);
			
			});
		
		});
		$(".delete").click(function(){
			
			var id= $(this).attr("id");
				$.post("delete-ostan.php",{id:id},function(data){
			$("#jadval").html(data);
			
			});
			
			});
});

</script>

<div align="center">
<div id="msg"></div>
<input type="text" placeholder="نام استان" id="ostan">
<input type="button" value="درج استان " id="btn">
<div id="jadval">
<table border="1" width="700">
<tr>
<td>#</td>
<td width="500">استان</td>
<td>حذف</td>
</tr>
<?php
include '../connect.php';
$sql="select * from ostan ";
$result=$connect->query($sql);
$rows=$result->fetchAll(PDO::FETCH_ASSOC);
$i=1;
foreach($rows as $row)
{
	echo '<tr>
	<td>'.$i.'</td>
	<td>'.$row["name"].'</td>
	<td><a href= "#" style="color:red;" class="delete" id='.$row["id"].'>حذف</a></td>
	
	</tr>';
	$i++;
}
?>

</table>
</div>
</div>
<?php include 'footer.php';?>