<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title>登录</title>
<base href="<?=base_url()?>"/>
<link href="style/common.css" rel="stylesheet" type="text/css" />
<style>
.login_header{padding:30px 0 40px 0;}
.login_shadow{border:2px #f2f2f2 solid;}
.loginbox{text-align:center;background:#fff;overflow:hidden;border:1px #e1e1e1 solid;}
	.saying{float:left;width:600px;height:340px;font-size:22px;text-align:left;border-right:1px #e1e1e1 solid;color:#85CF28;}
	.saying img{margin:5px;width:590px;height:330px;}
	
	.login{float:left;width:354px;height:340px;border-left:2px #f2f2f2 solid;border-top:1px #fff solid;background:#f9f9f9}
	.login h3{line-height:50px;height:50px;font-size:14px;padding:0 0 0 20px;border-bottom:1px #e1e1e1 solid;}
	.login .item{clear:both;}
	.login .item .input{width:220px;padding:8px 10px 8px 10px;}
	.login .item .label{line-height:32px;height:30px;float:left;}
	.login .item .reg{padding:20px 0 0 72px;text-align:left;line-height:26px;}
	
	.login .submit{padding:0;margin-left:72px;float:left;font-size:14px;background:url(<?=base_url()?>images/login_buttons.gif) no-repeat 0 0;border:none;width:176px;height:39px;line-height:42px;color:#fff;}
	.login .submit:hover{background:url(<?=base_url()?>images/login_buttons.gif) no-repeat 0 -50px;}
	.name,.psd,.check{margin:20px;line-height:30px;}
</style>
<script type="text/javascript">
function show_saying(){
	var n;
		n = Math.floor(Math.random()*10/4);
	var saying = new Array(
		'login_1.jpg',
		'login_2.gif',
		'login_3.jpg'
	);
	document.write('<img src=\"<?=base_url()?>images/banners/' + saying[n] + '\" />');
}
</script>
</head>
<body>
<div class="container">
	<div class="login_header">
		<h1><a href="<?=base_url()?>">
			<img src="<?=base_url()?>images/logo_login.gif" /></a></h1>
	</div>
</div>
<div class="container login_shadow">
	
	<div class="loginbox">
		<div class="saying">
			<script type="text/javascript">
				show_saying();
			</script>
		</div>
		<div class="login">
			<form name="login" method="post" action="<?=site_url('login/check')?>" id="loginform">
			<h3>通行证</h3>
			<div class="name item">
				<span class="label">邮 箱</span>
				<input class="input" type="text" name="email"/>
			</div>
			<div class="psd item">
				<span class="label">密 码</span>
				<input class="input" type="password" name="password"/>
			</div>
			<!--<div class="check">
				<input type="checkbox" value="1"/>
				<label>一周内自动登录</label>
			</div>-->
			<div class="item">
				<input class="submit" type="submit" value=""/>	
			</div>
			<div class="item">
				<p class="reg">
					还没有账号？<a href="<?=base_url()?>register">马上注册</a><br />
					也可以
					<a href="<?=base_url()?>">返回首页</a>
					
					或者去 <a href="http://lab.cxroom.com/">创新学院</a>
				</p>
				
			</div>
			
			</form>
			
		</div>
	</div>
</div>


	
<div class="container" id="footer" style="margin-top:20px;background:#f9f9f9;"> 
	<div class="fl"> 
		<a href="http://www.cxroom.com/articles/getarticle/17">关于我们</a> <a href="http://www.cxroom.com/articles/getarticle/18">关于创新空间</a> <a href="http://lab.cxroom.com/volunteers">贡献者计划</a> <a href="http://www.cxroom.com/articles/getarticle/11">项目服务条款</a> <a href="http://www.cxroom.com/articles/getarticle/12">EGG服务条款</a> 
		<a href="http://www.cxroom.com/articles/getarticle/15">用户协议</a> 
	</div> 
	<div class="fr"> 
		Copyright © 2012 创新空间 All Right Reserved. 浙ICP备12010459号
	</div> 
	<div class="clear0"></div> 
</div>	
		
	

</body>
</html>
