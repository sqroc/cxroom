<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title><?=$title ?></title>
<meta name='keywords' content='创新空间,创新,空间,创新学院' />
<meta name='description' content='成为首批用户，敲响梦想之门，欢迎入住创新空间。' />
<link href="<?=base_url()?>style/common.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>style/<?=$css ?>" rel="stylesheet" type="text/css" />
<script src="<?=base_url()?>js/jquery.js" type="text/javascript"></script>
<?php
if(isset($js)):
?>
<script src="<?=base_url()?>js/<?=$js ?>" type="text/javascript"></script>
<?php endif; ?>
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
		<h1><a href="<?=base_url() ?>" title="返回首页"><img src="<?=base_url()?>images/logo.gif" /></a></h1>
		<ul id="menu">
		
			<li><a href="<?=base_url() ?>/projects">项目中心</a><br><span>为项目插上翅膀</span></li>
			<li style="border-right:none;"><a href="<?=base_url() ?>/eggs">Eggs</a><br><span>让创意不再流浪</span></li>
			
		</ul>
		<div class="mycount fr">
			
			<?php if ($username!=NULL): ?>
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
							
							<li><a href="<?=base_url()?>space/messages/letters">站内信(<?=$unreadmessage?>)</a></li>
							<li><a href="<?=base_url()?>space/messages/notices">好友请求(<?=$unreadnotice?>)</a></li>
							
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

