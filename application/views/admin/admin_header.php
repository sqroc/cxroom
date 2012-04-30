<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title>Administrator</title>
<base href="<?=base_url()?>"/>
<link href="style/admin.css" rel="stylesheet" type="text/css" />
<script src="<?=base_url()?>js/jquery.js" type="text/javascript"></script> 
<script type="text/javascript">
function add_br(str){
	var reg = new RegExp("\n","g"); 
	str = str.replace(reg,"<br />");
	return str; 
}	
</script>
<?php
if(isset($js)):
?>
<script src="js/<?=$js ?>" type="text/javascript"></script>
<?php endif; ?>

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
	<div id="topmenu">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="admin/cx_admin/logout">注销登录</a> | <a href="<?=base_url() ?>" target="_blank">网站首页</a>
	</div>
</div>
<!--menu-->
<div class="admin_menu">
	<div class="menu_box">
		<h2><a href="<?=base_url()?>admin/cx_admin/home">后台首页</a></h2>
		
	</div>
	<div class="menu_box">
		<h2>会员模块</h2>
		<ul>
			
			<li class="bornone"><a href="<?=base_url()?>admin/cx_admin/user_list">会员管理</a></li>
			
		
		</ul>
	</div>
	<div class="menu_box">
		<h2>项目模块</h2>
		<ul>
			
			<li class="bornone"><a href="<?=base_url()?>admin/cx_admin/project_list">项目管理</a></li>
			
		
		</ul>
	</div>
	
	<div class="menu_box">
		<h2>词条模块</h2>
		<ul>
			
			<li><a href="<?=base_url()?>admin/cx_admin/lab">词条管理</a></li>
			<li class="bornone"><a href="<?=base_url()?>admin/cx_admin/lab_add">添加新词条</a></li>
			
		
		</ul>
	</div>
	
	<div class="menu_box">
		<h2>文档模块</h2>
		<ul>
			
			<li><a href="<?=base_url()?>admin/cx_admin/article_list">文档管理</a></li>
			<li class="bornone"><a href="<?=base_url()?>admin/cx_admin/article_add">发布新文档</a></li>
			
		
		</ul>
	</div>
	
	<div class="menu_box">
		<h2>其他模块</h2>
		<ul>
			
			<li class="bornone"><a href="<?=base_url()?>admin/cx_admin/code_list">邀请码管理</a>
		
		</ul>
	</div>
	
</div>
<!--#menu-->