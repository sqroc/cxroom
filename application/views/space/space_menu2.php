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
			<li class="find"><a href="<?=base_url() ?>user_space/uid/<?=$uid ?>">他的客厅</a></li>
		
						<li class="fav_lab"><a href="<?=base_url() ?>space/space_projectlist/prouid/<?=$uid ?>">他的项目</a></li>
			
				<li class="my_pro"><a href="<?=base_url() ?>space/space_projectlist/egguid/<?=$uid ?>">他的创意</a></li>
				<li class="home"><a href="<?=base_url() ?>/user_space">回我的书房</a></li>
			
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