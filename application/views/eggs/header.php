<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title><?=$title ?></title>
<base href="<?=base_url()?>"/>
<link href="style/eggs_common.css" rel="stylesheet" type="text/css" />

<?php if(isset($css)):?>
<link href="style/<?=$css ?>" rel="stylesheet" type="text/css" />
<?php endif; ?>

<script src="<?=base_url()?>js/jquery.js" type="text/javascript"></script>

<?php
if(isset($js)):
?>
<script src="js/<?=$js ?>" type="text/javascript"></script>
<?php endif; ?>
<script type="text/javascript">
var USER_NAME = '<?=$username ?>';
var USER_URL = 'TEST';
var USER_PHOTO = '<img src=\"'+ '<?=base_url()?><?=$person_pic?>' +'\" />';
</script>
<script type="text/javascript">
$(document).ready(function(){
	$('.droptab').hover(function(){
		$(this).addClass('my_cur').children('ul').css('display','block');
	}, function(){
		$(this).removeClass('my_cur').children('ul').css('display','none');
	});
});

</script>
</head>
<body>
<!--第二行 导航-->
<div class="header_bg">
	<div id="header">
		<h1><a href="<?=base_url() ?>" title="返回首页"><img src="<?=base_url()?>images/logo.png" /></a></h1>
		<ul id="menu">
		
			<li><a href="<?=base_url() ?>/projects">项目中心</a><br><span>为项目插上翅膀</span></li>
			<li style="border-right:none;"><a href="<?=base_url() ?>/eggs">Eggs</a><br><span>让创意不再流浪</span></li>
			
		</ul>
		<div class="mycount fr">
			
			<?php if (isset($username)): ?>
				<?php if (isset($person_pic)): ?>
				<img src="<?=base_url()?><?=$person_pic?>" /> 
				<?php else: ?>
					<img src="images/user_head/head_default.gif" /> 
				<?php endif; ?>
				<ul class="mymenu">
					<li class="droptab">菜单
						<ul class="dropmenu" style="display:none;">
							
							<li><a href="<?=base_url() ?>user_space">我的客厅</a></li>
							<li><a href="<?=base_url() ?>space/space_projectlist/attentionProjectlist">关注的项目</a></li>
							<!--
							<li><a href="<?=base_url() ?>user_space">关注的Egg</a></li>
							-->
							<li class="divide"><a href="<?=base_url() ?>space/space_projectlist/attentionTiplist">收藏的词条</a></li>
							<li class="divide2"><a href="<?=base_url() ?>eggs/new_topic">发布Egg</a></li>
							<li class="divide"><a href="<?=base_url() ?>space/objects_form">发布项目</a></li>
							<li class="divide2"><a href="<?=base_url() ?>user_info">修改资料</a></li>
							<li><a href="logout">注销登录</a></li>
							
						</ul>	
					</li>
					<li class="droptab">消息
						<ul class="dropmenu" style="display:none;">
							
							<li><a href="<?=base_url() ?>user_space">站内信(43)</a></li>
							<li><a href="<?=base_url() ?>user_info">好友请求</a></li>
							
						</ul>		
					</li>
					<li><a href="<?=base_url() ?>user_space" title="我的空间"><?=$username ?></a></li>
				</ul>
			<?php else: ?>
				<ul class="new_nav">
					<li><a href="<?=base_url() ?>register">注册</a></li>	
					<li><a href="<?=base_url() ?>login">登录</a></li>	
				</ul>
			<?php endif; ?>
			
		</div>
	</div>
</div><!--#header_bg-->
<div class="header_shadow"></div>

<div id="eheader">
	<div class="container ebg">
		<div class="eintro fl">
			<p>
				<span>更低的门槛：</span>只要你有梦想和创意就可以在这里发起，全世界都会来帮你。<br>
				<span>更低的风险：</span>试探市场和人气，条件成熟再入驻项目中心！规避风险，创业从此简单无忧。
			</p>
		</div>
		<div class="newone fr">
			<a href="<?=base_url()?>eggs/new_topic" title="发布一个新的创意"></a>
		</div>
	</div>
</div>