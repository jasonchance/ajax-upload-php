<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="description" content="使用php实现上传文件的功能" />
<meta name="description" content="张鑫旭的设计空间，张鑫旭的个人博客，张鑫旭的技术作品，张鑫旭的生活成长" />
<meta name="keywords" content="张鑫旭,鑫空间-鑫生活,个人博客,开发,web前端,JavaScript,css,php,MySQL" />
<meta name="author" content="张鑫旭,zhangxixnu" />
<title>使用php实现上传图片文件的功能</title>
<link rel="shortcut icon" href="http://www.zhangxinxu.com/zxx_ico.png" />
<style type="text/css">
body{font-size:84%;}
#uploadedName{list-style-type:none;}
</style>
</head>

<body>
<p id="errorRemind"></p>
<input id="unloadPic" type="button" value="上传图片" />
<ol id="uploadedName"></ol>

<script type="text/javascript" src="../js/ajaxupload.js"></script>
<script type="text/javascript">
window.onload = function(){
	var oBtn = document.getElementById("unloadPic");
	var oShow = document.getElementById("uploadedName");
	var oRemind = document.getElementById("errorRemind");	
	new AjaxUpload(oBtn,{
		action:"file_upload.php",
		name:"upload",
		onSubmit:function(file,ext){
			if(ext && /^(jpg|jpeg|png|gif)$/.test(ext)){
				//ext是后缀名
				oBtn.value = "正在上传…";
				oBtn.disabled = "disabled";
			}else{	
				oRemind.style.color = "#ff3300";
				oRemind.innerHTML = "不支持非图片格式！";
				return false;
			}
		},
		onComplete:function(file,response){
			oBtn.disabled = "";
			oBtn.value = "再上传一张图片";
			oRemind.innerHTML = "";
			var newChild =  document.createElement("li");
			newChild.innerHTML = '<img src="../../upload/' + file + '" />';
			oShow.appendChild(newChild);
		}
	})
};
</script>
</body>
</html>