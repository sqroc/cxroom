	<div class="mid fl">
		<ul class="listmenu">
			<li><a href="<?=base_url()?>space/space_userlist/userlist">最新市民</a></li>
			<li class="current">我的好友</li>
			<li><a href="">相同爱好</a></li>
		</ul>
		<?php foreach($newuser as $item): ?>
		<div class="user_list_intro">
			<div class="avatar">
				<?php if (isset($item->person_pic)): ?>
					<img src="<?=base_url()?><?=$item->person_pic?>" /> 
				<?php else: ?>
				<img src="images/user_head/head_default.gif" />
				<?php endif; ?>
				<p class="short_tags"><?=$item->username?><br>
					群组<span>0</span>个,项目<span>0</span>个,掌握词条<span>0</span>条
				</p>
				<div class="visit">
					<a href="user_space/uid/<?=$item->uid?>">访问客厅</a> | <a href="">交个朋友</a>
				</div>
			</div>
			<p>
				<?=$item->intro?>
			</p>
		</div>
		<?php endforeach; ?>
		<div class="pages">
			<?php echo $this->pagination->create_links();?>
		</div>
	</div><!--#mid-->