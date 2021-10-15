<?php include 'header.php' ?>
<script>
$(document).ready(function(e) {
    $("#btn").click(function(){
		var titr = $("#titr").val();
		var tozihat = $("#tozihat").val();	

		if(titr=="")
		{
			alert("لطفا موضوع پشتیبانی  را وارد نمایید");
			return false;			
		}

		if(tozihat=="")
		{
			alert("لطفا توضیحات را وارد نمایید");
			return false;			
		}
		$.post("support-check.php",{titr:titr,tozihat:tozihat},function(data){
			
			$("#msg").html(data);
			$("#titr").val("");
			$("#tozihat").val("");
			});
		
		});
});

</script>
<div align="center">پشتیبانی شیپور</div>
<div id="msg" align="center"></div>
<div align="center" style="margin:20px 0;"><input type="text" id="titr" placeholder="موضوع" style="width:250px; height:30px;"></div>


<div align="center" style="margin:20px 0;"><textarea placeholder="توضیحات" id="tozihat" style="width:250px; height:200px;"></textarea></div>

<div align="center" style="margin:20px 0;"><input type="button" value="ثبت درخواست" style=" width:250px; line-height:40px;background:#4CAF50;border-radius:5px; border:none;font-size:18px; color:#fff;" id="btn"></div>

<?php include 'footer.php' ?>