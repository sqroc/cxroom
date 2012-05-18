	<div class="mid fl">
		<div class="space_tabs">
			<ul>
				<li class="current_tab">朋友天下</li>
				<li><a href="<?=base_url() ?>/space/space_userlist/myuserlist">我的好友</a></li>
			
			</ul>
		</div>
		<?php foreach($newuser as $item): ?>
		<div class="user_list_intro">
			<div class="avatar">
				<?php if (isset($item->person_pic)): ?>
					<img src="<?=base_url()?><?=$item->person_pic?>" /> 
				<?php else: ?>
				<img src="images/user_head/head_default.gif" />
				<?php endif; ?>	
			</div>
			<div class="user_list_info">
				<span class="name"><a href="<?=base_url()?>user_space/uid/<?=$item->uid?>"><?=$item->username?></a></span>
				
				
				<div class="short_intro" style="margin:20px 0 0 0;">
					<div class="j"></div>
					<?php if (isset($item->intro) && $item->intro!=''): ?><?=$item->intro ?>
					<?php else: ?>这家伙很懒，什么也没写。<?php endif; ?>
				</div>
			</div>
			
		</div>
		<?php endforeach; ?>
		<div class="pages">
			<?php echo $this->pagination->create_links();?>
		</div>
	</div><!--#mid-->