<?php  include 'header.php';
include '../connect.php';
$sql="select * from support WHERE id = ? ";
$result=$connect->prepare($sql);
$result->bindValue(1,$_GET["id"]);
$result->execute();
$data=$result->fetch(PDO::FETCH_OBJ);


?>
<script>
$(document).ready(function(e) {
    $("#btn").click(function(){
		var answer=$("#answer").val();
		var id = <?= $_GET["id"]?>;
		if(answer=="")
		{
			alert("لطفا متن پاسخگویی را وارد نمایید !");
			return false;
		}
		$.post("answer-support-check.php",{id:id,answer:answer},function(data){
			
			$("#msg").html(data);
			
			
			});
		
		});
});
</script>

<div style="width:400px;margin:10px auto;text-align:right;color:blue" ><?= $data->titr ?></div>
<div style="width:400px; margin:20px auto;text-align:right"><?= $data->tozihat ?></div>


<div style="width:400px;margin:10px auto;color:red;">پاسخ سوال : </div>
<br>

<?php
$sql2="SELECT * FROM `answer-support` WHERE `support-id` =? ";
$result2=$connect->prepare($sql2);
$result2->bindValue(1,$_GET["id"]);
$result2->execute();
$data2=$result2->fetch(PDO::FETCH_OBJ);

echo '<div style="width:400px;margin:5px auto;">'.$data2->answer.'</div>';

?>
<?php  include 'footer.php' ?>