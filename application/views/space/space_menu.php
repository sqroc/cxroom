<div class="container" style="margin-top:20px;">
	<div class="space_shadow_top"></div>
</div>
<!--第二行 主体-->
<div class="container" id="space_container" style="overflow:hidden;">
	<div class="menubox fl">
		<div class="my_avatar">
			<?php if (isset($person_pic)): ?>
			<img src="<?=base_url()?><?=$person_pic?>" /> 
			<?php else: ?>
				<img src="images/user_head/head_default.gif" /> 
			<?php endif; ?>
		</div>
		<ul class="lmenu">
			<li class="home"><a href="<?=base_url() ?>/user_space">我的客厅</a></li>
		
			<li class="my_pro"><a href="<?=base_url() ?>/space/space_projectlist">我的项目</a><span><?=$myprojectnumber?></span></li>
			
				<li class="fav_pro"><a href="<?=base_url() ?>/space/space_projectlist/attentionProjectlist">收藏项目</a><span><?=$myattentionprojectnumber?></span></li>
				
				<li class="fav_lab"><a href="<?=base_url() ?>/space/space_projectlist/attentionTiplist">词条收藏</a></li>
			
			<li class="myfriends"><a href="<?=base_url() ?>/space/space_userlist/myuserlist">我的好友</a><span><?=$myfriendnumber?></span></li>
			
			<li class="find"><a href="<?=base_url() ?>/space/space_userlist/userlist">朋友天下</a></li>
			<li class="func"><a href="<?=base_url() ?>/user_info">修改资料</a></li>
			<li style="border-bottom:none;"><a href="<?=base_url() ?>/space/space_codelist">我的邀请码</a></li>
		</ul>
	</div>