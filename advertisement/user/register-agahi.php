<?php 
session_start();
include 'header.php';
include '../connect.php';
$query="select * from users where email = ? and state = 1";
$result=$connect->prepare($query);
$result->bindValue(1,$_SESSION["useremail"]);
$result->execute();
$data=$result->fetch(PDO::FETCH_OBJ);
?>
<style>
	.agahi_pic1
	{
		position: relative;
	}
	.agahi_pic2
	{
		position: relative;
	}
		.agahi_pic3
	{
		position: relative;
	}
		.agahi_pic4
	{
		position: relative;
	}
	#file1
	{
		width: 100%;
		height: 100%;
		background: red;
		position: absolute;
		top: 0;
		right: 0;
		opacity: 0;
	}
		#file2
	{
		width: 100%;
		height: 100%;
		background: red;
		position: absolute;
		top: 0;
		right: 0;
		opacity: 0;
	}
			#file3
	{
		width: 100%;
		height: 100%;
		background: red;
		position: absolute;
		top: 0;
		right: 0;
		opacity: 0;
	}
			#file4
	{
		width: 100%;
		height: 100%;
		background: red;
		position: absolute;
		top: 0;
		right: 0;
		opacity: 0;
	}
</style>
<script>
$(document).ready(function(){
	$("#ostan").val(<?= $data->ostan ?>);
	$("#agahi_pic2_content").hide();
	$("#agahi_pic3_content").hide();
	$("#agahi_pic4_content").hide();
	$("#file1").change(function(){
		$(".agahi_pic1").css({"background":"url(../images/123.jpg) no-repeat","background-size":"120px 100px","background-position":"center"});
		$("#agahi_pic_txt1").html("");
		$(".agahi_pic2").css({"border":"2px dashed #2980b9"});
		$(".agahi_pic2").hover(function(){$(this).css({"border":"2px dashed orange"})});
		$(".agahi_pic2").mouseout(function(){$(this).css({"border":"2px dashed #2980b9"})});
		$("#agahi_pic2_content").show();	
	});
		$("#file2").change(function(){
		$(".agahi_pic2").css({"background":"url(../images/123.jpg) no-repeat","background-size":"120px 100px","background-position":"center"});
		$("#agahi_pic_txt2").html("");
		$(".agahi_pic3").css({"border":"2px dashed #2980b9"});
		$(".agahi_pic3").hover(function(){$(this).css({"border":"2px dashed orange"})});
		$(".agahi_pic3").mouseout(function(){$(this).css({"border":"2px dashed #2980b9"})});
		$("#agahi_pic3_content").show();	
		
	});
	
		$("#file3").change(function(){
			$(".agahi_pic3").css({"background":"url(../images/123.jpg) no-repeat","background-size":"120px 100px","background-position":"center"});
		$("#agahi_pic_txt3").html("");
		$(".agahi_pic4").css({"border":"2px dashed #2980b9"});
		$(".agahi_pic4").hover(function(){$(this).css({"border":"2px dashed orange"});});
		$(".agahi_pic4").mouseout(function(){$(this).css({"border":"2px dashed #2980b9"})});
		$("#agahi_pic4_content").show();	
		
	});
		$("#file4").change(function(){

		$(".agahi_pic4").css({"background":"url(../images/123.jpg) no-repeat","background-size":"120px 100px","background-position":"center"});
		$("#agahi_pic_txt4").html("");
	});
	
	
	

////////////////////////////////////
	$("#form1").submit(function(){
		var file1=$("#file1").val();
		if(file1=="")
			{
				alert("???????? ???????? ???????? ?????? ???? ?????? ???????????? ????????????!");
				return false;
			}
		else
			{
		$("#form1").ajaxSubmit({target:"#msg"});
		return false;
			}
		
	});
	
//////////////////////////////////////////
});
</script>

<div id="register_body">



<form action="register-check.php" method="post" enctype="multipart/form-data" id="form1">

	<div id="register_body_1">
		<div class="agahi_register_txt">?????? ????????</div>
		<div>?????????? ????????</div>
		<div><input type="text" name="agahi_title"></div>
		<div> ?????????? ????????</div>
		<div><input type="text" name="mobile" value="<?= $data->phone ?>"></div>
		<div> ???????? </div>
		<div><input type="text" name="gheymat"></div>				
		<div>??????????????</div>
		<div><textarea name="tozihat"></textarea></div>
		<div>
		<select name="group">
		<option>????????</option>
		<option>????????</option>
		<option>??????????</option>
		<option>????????????</option>

		</select>
		</div>
		<div>
		<select name="city" id="ostan">
		<option value="1"> ????????????????</option>
		<option value="2">?????????? </option>
		</select>
		</div>
	</div>
	
	
	
	
	
	
	<div id="register_body_2">
		
		<div id="allpicture">
		
			<div style="font-size: 20px;font-weight: bold;margin: 10px;">?????? ????????</div>
			<div id="msg" align="center"></div>
			<div class="agahi_pic1" id="first_agahi_pic" ><span id="agahi_pic_txt1"><div >+</div><div>???????????? ??????</div></span><input type="file" id="file1" name="pic[]" accept=".jpg,.png,.jpeg" ></div>
			<div class="agahi_pic2"><span id="agahi_pic2_content"><span id="agahi_pic_txt2"><div>+</div><div>???????????? ??????</div></span><input type="file" id="file2" name="pic[]" accept=".jpg,.png,.jpeg" ></span></div>
			<div class="agahi_pic3"><span id="agahi_pic3_content"><span id="agahi_pic_txt3"><div>+</div><div>???????????? ??????</div></span><input type="file" id="file3" name="pic[]"  accept=".jpg,.png,.jpeg"></span></div>
			<div class="agahi_pic4"><span id="agahi_pic4_content"><span id="agahi_pic_txt4"><div>+</div><div>???????????? ??????</div></span><input type="file" id="file4" name="pic[]" accept=".jpg,.png,.jpeg"></span></div>
			<div id="agahi_txt">???? ?????????? ???????? ???? ???????? ????????. ???? ???????? ???????? ?????? ???????? ???????? ?????? ???????? ?????? ???? 5 ?????????? ????????</div>
			<div id="agahi_img"><img src="../images/2017-06-17_213817.png"></div>
		</div>
		
		<div class="agahi_txt">???? ???????? ?????? ???????? ?????????? ???????????? ?????? ???? ???? ???????????? ?? ?????????? ?????????????? ?????????? ?????????? ???? ????????.</div>
		<div id="btn_register"><input type="submit" class="btn_register" value="?????? ????????"></div>
	</div>
	</form>
</div>


<?php 
include 'footer.php';
?>