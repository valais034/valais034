<?php  include 'header.php';
include '../connect.php';
$sql="select * from support WHERE id = ? and state = 0";
$result=$connect->prepare($sql);
$result->bindValue(1,$_GET["id"]);
$result->execute();
$data=$result->fetch(PDO::FETCH_OBJ);


$sql1="select * from users WHERE id = ? and state = 1";
$result1=$connect->prepare($sql1);
$result1->bindValue(1,$data->user);
$result1->execute();
$data1=$result1->fetch(PDO::FETCH_OBJ);

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
<div align="center" style="font-size:14px;color:red;">از طرف کاربر : <?= $data1->fname .' '. $data1->lname ?></div>




<div align="center" id="msg"></div>


<div style="width:400px; margin:20px auto;text-align:right"><textarea id="answer" placeholder="جواب به درخواست پشتیبانی" style="width:400px;height:250px;"></textarea></div>
<div align="center"><input type="button" id="btn" value="پاسخگویی" style="width:400px;height:35px;background:#4CAF50;border:none;border-radius:3px; color:#FFF;font-size:18px;"></div>
<?php  include 'footer.php' ?>