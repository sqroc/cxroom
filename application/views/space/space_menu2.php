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
			<li class="home"><a href="<?=base_url() ?>user_space/uid/<?=$uid ?>">他的客厅</a></li>
		
						<li class="my_pro"><a href="<?=base_url() ?>space/space_projectlist/prouid/<?=$uid ?>">他的项目</a></li>
			
				<li class="fav_pro"><a href="<?=base_url() ?>space/space_projectlist/egguid/<?=$uid ?>">他的创意</a></li>
				<li class="home"><a href="<?=base_url() ?>/user_space">回我的书房</a></li>
			
		</ul>
	</div>