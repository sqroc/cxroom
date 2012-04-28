<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title>Administrator</title>
<base href="<?=base_url()?>"/>
<link href="style/common.css" rel="stylesheet" type="text/css" />
<?php
if(isset($js)):
?>
<script src="js/<?=$js ?>" type="text/javascript"></script>
<?php endif; ?>
<style>
#admin_header{width:100%;border-bottom:1px #ccc solid;height:40px;line-height:40px;text-align:left;padding-left:20px;background:#F2F2F2;}
	#admin_header h1{float:left;font-size:15px;}
.admin_menu{float:left;width:15%;border-right:1px #ccc solid;}
	.admin_menu ul{}
	.admin_menu ul li{line-height:60px;border-bottom:1px #ccc dotted;}
.admin_body{float:left;width:80%;}
	.admin_body p{margin:40px;text-align:left;}
	.admin_body .saying{font-size:28px;line-height:58px;}
	.admin_body span{font-size:14px;padding:20px 40px 20px 40px;border:1px #ccc dotted;}
	.admin_body .warm{border:1px #FF0000 dotted;color:#FF0000}
	.admin_body ul{padding:20px 0 0 40px;}
	.admin_body ul li{line-height:30px;text-align:left;font-size:14px;}
	.admin_pages{}
	.admin_pages .current_page{font-size:20px;}
	.admin_pages li{float:left;padding:20px;}
	.admin_pages li a{padding:10px;border:1px #ccc solid;display:block;}
	
#learn, #honor,#mymess, #skills, .spacecol{margin:20px 20px 0 20px;}
	#learn{border:1px #ccc solid;background:#F2F2F2;color:#999;position:relative;overflow:hidden;}
	#learn .shut{position:absolute;right:20px;top:10px;width:20px;height:20px;background:url(../images/space/bg_sharp.gif) no-repeat 8px 2px;}
	#learn h3{padding:10px;}
	#learn span{color:#85CF28;padding:0px;border:none;}
	#learn p{margin:0;padding:0 10px;text-align:left;line-height:22px;}
	#learn .mess{height:26px;padding:4px 10px;}
	#learn .mess span{float:left;margin-right:20px;}
	#learn .mess .author{background:url(../images/space/bg_sharp.gif) no-repeat 0 -18px;}
	#learn .mess .write{background:url(../images/space/bg_sharp.gif) no-repeat 0 -38px;}
	#learn .mess .catch{background:url(../images/space/bg_sharp.gif) no-repeat 0 -58px;}
	
.item{overflow:hidden;padding-bottom:15px;padding-top:15px;margin-left:20px;text-align:left;width:100%;border-bottom:1px #eee solid;}
	.item .label{width:80px;float:left;height:28px;line-height:30px;}
	.item .label span{color:#FF0000;border:none;}
	.item .item_info{width:680px;float:left;overflow:hidden;line-height:30px;}

	.item .item_info .w300{width:300px;}
	.item .item_info .help{color:#999;line-height:30px;text-align:left;padding:0;}
	.item .item_info span{border:none;padding:0;}
</style>
<script type="text/javascript">
function show_saying(){
	var n;
		n = Math.floor(Math.random()*10/3);
	var saying = new Array(
		"当人们说，能说的都已经说了，能做的都已经做了，实际上许多事情只是说了，还没有做<br>When all is said and done a lot more will have been said than done.",
		"如果只是一直坐着，你在时间的沙滩上留下的不是脚印，而是屁股印！<br>You can't leave footprints in the sands of time if you are sitting on your butt,And who wants to leave buttprints in the sands of time.",
		"\"我不能\"从来都不会带来成功<br>\"我试试看\"常常创造奇迹！<br>\"I can\'t\" never accomplished anything.<br>\"I will try\" has worked wonders!",
		"这里，由你来书写！<br>It is your time!"
	);
	document.write(saying[n]);
}
</script>
</head>
<body>
<div id="admin_header">
<h1>创新二场后台管理</h1>
&nbsp;&nbsp;&nbsp;&nbsp;<a href="admin/cx_admin/logout">注销登录</a> | <a href="<?=base_url() ?>" target="_blank">网站首页</a>
</div>
<!--menu-->
<div class="admin_menu">
	<ul>
		<li><a href="<?=base_url()?>admin/cx_admin/home">后台首页</a></li>
		<li><a href="<?=base_url()?>admin/cx_admin/user_list">会员模块</a></li>
		<li><a href="<?=base_url()?>admin/cx_admin/project_list">项目模块</a></li>
		<li><a href="<?=base_url()?>admin/cx_admin/lab">词条模块</a>
		<br><a href="<?=base_url()?>admin/cx_admin/lab_add">添加新词条</a>
		</li>
		<li><a href="<?=base_url()?>admin/cx_admin/article_list">文章模块</a>
		<br><a href="<?=base_url()?>admin/cx_admin/article_add">发布新文章</a>
		</li>
		
		<li><a href="<?=base_url()?>admin/cx_admin/code_list">邀请码管理</a>
		
		</li>
		
	</ul>
</div>
<!--#menu-->