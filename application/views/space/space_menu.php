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
		<div class="point">
			<ul>
				<li class="liner">
					<strong><?=$mypointall ?></strong>
					<span class="pl">价值
						<div class="point_list" style="display:none;">
							<ul>
								<li>贡献 <?=$mypoint->contributionnum ?></li>
								<li>活跃 <?=$mypoint->activenum ?></li>
								<li>创新 <?=$mypoint->creativitynum ?></li>
							</ul>
						</div>	
					</span>
				</li>
				<li class="linel">
					<strong><?=$clickdata->click?></strong>
					<span>人气</span>
					
				</li>
			</ul>
			
			
		</div>
		
				
		<ul class="lmenu">
			<li class="home"><a href="<?=base_url() ?>/user_space">我的书房</a></li>
		
			<li class="my_pro"><a href="<?=base_url() ?>/space/space_projectlist">我的发布</a><!--<span><?=$myprojectnumber?></span>--></li>
			
				<li class="fav_pro"><a href="<?=base_url() ?>/space/space_projectlist/attentionProjectlist">我的收藏</a><!--<span><?=$myattentionprojectnumber?></span>--></li>
				
				
			
			<li class="myfriends"><a href="<?=base_url() ?>/space/space_userlist/userlist">朋友天下</a><!--<span><?=$myfriendnumber?></span>--></li>
			
		
			<li class="func"><a href="<?=base_url() ?>/user_info">修改资料</a></li>
			<li class="codestyle" style="border-bottom:none;"><a href="<?=base_url() ?>/space/space_codelist">我的邀请码</a></li>
		</ul>
	</div>
	
<script type="text/javascript">
$(document).ready(function(){
	var url = window.location.href;
	var reg_home = /user_space/;
	var reg_favpro = /attention/;
	var reg_mypro = /projectlist/;
	var reg_myf = /userlist/;
	var reg_info = /user_info/;
	var reg_code = /codelist/;
	//var reg_tips = /Tiplist/;
	
	if(reg_home.test(url)){
		$('.home').removeClass('home').addClass('cur_home current');
	} else if(reg_favpro.test(url)) {
		$('.fav_pro').removeClass('fav_pro').addClass('cur_fav_pro current');
	} else if(reg_mypro.test(url)) {
		$('.my_pro').removeClass('my_pro').addClass('cur_my_pro current');
	} else if(reg_myf.test(url)) {
		$('.myfriends').removeClass('myfriends').addClass('cur_myfriends current');
	} else if(reg_info.test(url)) {
		$('.func').removeClass('func').addClass('cur_func current');
	} else if(reg_code.test(url)) {
		$('.codestyle').addClass('current').css('background','#fff');
	}
});
</script>