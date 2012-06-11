
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
					<span class="pl">身价
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
			<li class="find"><a href="<?=base_url() ?>user_space/uid/<?=$uid ?>">Ta的客厅</a></li>
		
						<li class="fav_lab"><a href="<?=base_url() ?>space/space_projectlist/prouid/<?=$uid ?>">Ta的项目</a></li>
			
				<li class="my_pro"><a href="<?=base_url() ?>space/space_projectlist/egguid/<?=$uid ?>">Ta的创意</a></li>
				<li class="home"><a href="<?=base_url() ?>/user_space">回我的书房</a></li>
			
		</ul>
		<ul class="lmenu" style="border-top:1px #e1e1e1 solid;">
				
				<li class="cc"><a href="<?=base_url() ?>help">申请认证</a></li>
			</ul>
	</div>
	
<script type="text/javascript">
$(document).ready(function(){
	var url = window.location.href;
	var reg_home = /user_space\/uid/;
	var reg_mypro = /prouid/;
	var reg_myegg = /egguid/;
	
	if(reg_home.test(url)){
		$('.find').removeClass('find').addClass('cur_find current');
	} else if(reg_mypro.test(url)) {
		$('.fav_lab').removeClass('fav_lab').addClass('cur_fav_lab current');
	} else if(reg_myegg.test(url)) {
		$('.my_pro').removeClass('my_pro').addClass('cur_my_pro current');
	}
});
</script>