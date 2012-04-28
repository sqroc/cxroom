<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title>后台登录</title>
<base href="<?=base_url()?>"/>
<link href="style/common.css" rel="stylesheet" type="text/css" />
<style>
.loginbox{width:960px;margin-top:100px;text-align:center;}
	.saying{float:left;width:600px;font-size:22px;text-align:left;border-right:1px #EEE solid;color:#85CF28;}
	.saying p{margin:0 20px;line-height:58px;}
	.saying span{color:#999;padding:40px 0 0 0;}
	.login{float:right;width:340px;height:300px;}
	.login h3{line-height:50px;height:50px;padding:0 0 0 20px;}
	.login .input{line-height:30px;width:220px;height:30px;padding:0 10px 0 10px;}
	.login .label{line-height:32px;height:30px;float:left;}
	.login .submit{float:left;margin-left:66px;background:#85CF28;border:1px #8CAF4B solid;width:100px;height:40px;;color:#fff;}
	.name,.psd,.check{margin:20px;line-height:30px;}
</style>
<script type="text/javascript">
function show_saying(){
	var n;
		n = Math.floor(Math.random()*10/3);
	var saying = new Array(
		"当人们说，能说的都已经说了，能做的都已经做了，实际上许多事情只是说了，还没有做<br><span>When all is said and done a lot more will have been said than done.</span>",
		"如果只是一直坐着，你在时间的沙滩上留下的不是脚印，而是屁股印！<br><span>You can't leave footprints in the sands of time if you are sitting on your butt,And who wants to leave buttprints in the sands of time.</span>",
		"\"我不能\"从来都不会带来成功<br>\"我试试看\"常常创造奇迹！<br><span>\"I can\'t\" never accomplished anything.<br>\"I will try\" has worked wonders!</span>",
		"这里，由你来书写！<br><span>It is your time!</span>"
	);
	document.write(saying[n]);
}
</script>
</head>
<body>
<div class="container">
	<div class="loginbox">
		<div class="saying">
			<p>
			<script type="text/javascript">
				show_saying();
			</script>
			</p>
		</div>
		<div class="login">
			<form name="login" method="post" action="admin/cx_admin/login" id="loginform">
			<h3>管理员登录</h3>
			<div class="name">
				<span class="label">用户名</span>
				<input class="input" type="text" name="name"/>
			</div>
			<div class="psd">
				<span class="label">密 码</span>
				<input class="input" type="password" name="password"/>
			</div>
			<!--<div class="check">
				<input type="checkbox" value="1"/>
				<label>一周内自动登录</label>
			</div>-->
			<input class="submit" type="submit" value="登 录"/>
			</form>
			
		</div>
	</div>
</div>
</body>
</html>
