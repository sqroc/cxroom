<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title><?=$title ?></title>
<base href="<?=base_url()?>"/>
<link href="style/common.css" rel="stylesheet" type="text/css" />
<link href="style/<?=$css ?>" rel="stylesheet" type="text/css" />
<script src="<?=base_url()?>js/jquery.js" type="text/javascript"></script>
<script src="<?=base_url()?>js/cx_common.js" type="text/javascript"></script>
<script src="<?=base_url()?>js/space_common.js" type="text/javascript"></script>
<?php
if(isset($js)):
?>
<script src="js/<?=$js ?>" type="text/javascript"></script>
<?php endif; ?>
<script type="text/javascript">
	var BASE_URL = '<?=base_url()?>';
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
			
			<?php if (isset($username2) & $username2!=NULL): ?>
				<?php if($unreadmessage !=0 || $unreadnotice != 0):?>
					<div class="warm_box">
						<img src="<?=base_url()?>images/common/have_notice.gif" />
					</div>	
				<?php endif;?>
				<?php if (isset($person_pic2)): ?>
					<img class="my_avatar" src="<?=base_url()?><?=$person_pic2?>" /> 
				<?php else: ?>
					<img class="my_avatar"  src="images/user_head/head_default.gif" /> 
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
							
							<li><a href="<?=base_url()?>space/messages/letters">站内信(<?=$unreadmessage?>)</a></li>
							<li><a href="<?=base_url()?>space/messages/notices">好友请求(<?=$unreadnotice?>)</a></li>
							
						</ul>	
						
					</li>
					<li><a href="<?=base_url() ?>user_space" title="我的书房"><?=$username2 ?></a></li>
				</ul>
			<?php else: ?>
				<ul class="new_nav">
					<li><a href="register">注册</a></li>	
					<li><a href="login">登录</a></li>	
				</ul>
			<?php endif; ?>
			
		</div>
	</div>
</div><!--#header_bg-->
<div class="header_shadow"></div>
<div class="clear"></div>
<!--
<div class="container" id="hi">
	<div class="dear">
		<p style="float:left;">亲! 由于网站正在测试完善阶段，如发现bug或者有好的建议，请移步 <a href="http://www.cxroom.com/eggs/topic/33">创新空间捉虫虫</a> 反馈给我们，感谢支持！</p><span id="closebug" style="float:right;margin-right:10px;cursor:pointer;">关闭</span>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#closebug').click(function(){
			$('#hi').fadeOut();
		});
	});
	
</script>-->
	