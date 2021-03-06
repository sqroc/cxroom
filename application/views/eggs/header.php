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
<script src="<?=base_url()?>js/cx_common.js" type="text/javascript"></script>
<?php
if(isset($js)):
?>
<script src="js/<?=$js ?>" type="text/javascript"></script>
<?php endif; ?>
<script type="text/javascript">
var BASE_URL = '<?=base_url()?>';
var USER_NAME = '<?=$username ?>';
var USER_URL = '<?=base_url() ?>user_space';
var USER_PHOTO = '<img src=\"'+ '<?=base_url()?><?=$person_pic?>' +'\" />';
</script>
<script type="text/javascript">
$(document).ready(function(){
	$('.droptab').hover(function(){
		$(this).addClass('my_cur').children('ul').css('display','block');
		$('.warm_box').css('display', 'none');
	}, function(){
		$(this).removeClass('my_cur').children('ul').css('display','none');
		$('.warm_box').css('display', 'block');
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
		
			<li><a href="<?=base_url() ?>/eggs" title="创意街">创意街</a><br><span>让创意不再流浪</span></li>
			<li style="border-right:none;"><a href="<?=base_url() ?>/projects" title="创业园">创业园</a><br><span>为项目插上翅膀</span></li>
		</ul>
		<div class="mycount fr">
			
			<?php if (isset($username)): ?>
				<?php if($unreadmessage !=0 || $unreadnotice != 0):?>
					<div class="warm_box">
						<img src="<?=base_url()?>images/common/have_notice.gif" />
					</div>	
				<?php endif;?>
				<?php if (isset($person_pic)): ?>
				<img class="my_avatar" src="<?=base_url()?><?=$person_pic?>" /> 
				<?php else: ?>
					<img class="my_avatar" src="images/user_head/head_default.gif" /> 
				<?php endif; ?>
				<ul class="mymenu">
					<li class="droptab">菜单
						<ul class="dropmenu" style="display:none;">
							
							<li><a href="<?=base_url() ?>user_space">我的书房</a></li>
							<li><a href="<?=base_url() ?>space/space_projectlist/attentionProjectlist">关注的项目</a></li>
							<!--
							<li><a href="<?=base_url() ?>user_space">关注的Egg</a></li>
							-->
							<li class="divide"><a href="<?=base_url() ?>space/space_projectlist/attentionTiplist">收藏的词条</a></li>
							<li class="divide2"><a href="<?=base_url() ?>eggs/new_topic">发布创意</a></li>
							<li class="divide"><a href="<?=base_url() ?>space/objects_form">发布项目</a></li>
							<li class="divide2"><a href="<?=base_url() ?>user_info">修改资料</a></li>
							<li><a href="logout">注销登录</a></li>
							
						</ul>	
					</li>
					<li class="droptab">消息
						<ul class="dropmenu" style="display:none;">
							
							<li><a href="<?=base_url() ?>user_space">站内信(<?=$unreadmessage?>)</a></li>
							<li><a href="<?=base_url() ?>user_info">好友请求(<?=$unreadnotice?>)</a></li>
							
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
<div class="clear"></div>
<div class="container top_shadow">
	<div class="egg_good">
		
		<div class="good_box good_c0">
			<div class="angle"></div>
			<div class="egg_info">
				
				收录创意 <span><?=$eggnum?></span> 个<br /> 
				献计献策 <span><?=$eggcommentnum?></span> 条
			</div>
		</div>
		<div class="good_box good_c2">
			<div class="hot">
				<h3>焦<br/>点<br/>创<br/>意</h3>
				<p>
					在这个什么都要电的时代
？看看大家如何奇思妙想解决充电问题!
				</p>
			</div>
		</div>
		<div class="good_box good_c3">
			<ul class="hot_list">
				<li><a href="http://www.cxroom.com/eggs/topic/37">移动设备绿色充电</a></li>
				<li><a href="http://www.cxroom.com/eggs/topic/41">接蛋 移动设备绿色充电</a></li>
			</ul>
		</div>
		<div class="good_box good_c4">
			<div class="new_egg">
				<a href="<?=base_url()?>eggs/new_topic"> </a>
				<p class="new_intro">脑子越用越活，创意越说越多！</p>	
			</div>			
		</div>
		<div class="clear0"></div>
	</div>
</div>
