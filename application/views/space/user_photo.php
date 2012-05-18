<div class="userinfo fl">
	<ul class="tablist">
		<li>
			<a href="user_info">基本信息</a>
		</li>
		<li>
			<a href="user_info/skills">个人技能</a>
		</li>
		<li class="current">
			个人头像
		</li>
		<li>
			<a href="user_info/contact">联系方式</a>
		</li>
		<li><a href="user_info/nineask">九 问</a></li>
	</ul>
	<div class="info_notice">
			<span>建议上传真实头像，这样可以获得更多人关注</span>
	</div>
	
	<div id="photo">
		<?php if (isset($person_pic)):
		?><img class="space_photo" src="<?=base_url()?><?=$person_pic?>" />
		<?php else:?><img id="user_photo" src="images/user_head/head_default.gif" />
		<?php endif;?>
		
	</div>
	<div class="pic_form">
		<script src="<?=base_url() ?>js/check_info.js" type="text/javascript"></script>
		<form method="post" name="photoform" action="<?=site_url('user_info/do_upload_pic')?>" enctype="multipart/form-data" onsubmit="return photo_check()">
			<input type="file" name="userfile" id="userfile" class="select" id="photofile" onChange="check_photo('photofile')"/>
			<input name="email" type="hidden"  value="<?=$email ?>"/>
			<input type="submit" value="上传头像" class="small_button" />
		</form>
	</div>
	
</div><!--#infobox-->
<!--include user_sidebar.php-->