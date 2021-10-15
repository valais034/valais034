<script src="../js/jquery.js"></script>
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
<?php
include '../connect.php';
$query="DELETE FROM `sheypoor`.`ostan` WHERE `ostan`.`id` = ?";
$result=$connect->prepare($query);
$result->bindValue(1,$_POST["id"]);
if($result->execute())
{
	?>
    
   <table border="1" width="700">
<tr>
<td>#</td>
<td width="500">استان</td>
<td>حذف</td>
</tr>
<?php
$sql="select * from ostan ";
$result1=$connect->query($sql);
$rows=$result1->fetchAll(PDO::FETCH_ASSOC);
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
    
    
    <?php
}
else
{
}

?>