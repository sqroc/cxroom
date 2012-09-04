<?php foreach($userlists as $item): ?>
	<div class="talent_info">
		<div class="avatar">
			<img class="photo" src="<?=base_url()?><?=$item->person_pic?>" />
			<p class="baseinfo"><span class="name"><a href="<?=base_url()?>user_space/uid/<?=$item->uid?>"><?=$item->username?></a></span><br/>
				<?php if ($item->role == 0): ?>从业者<?php elseif($item->role == 1): ?>在校生<?php elseif($item->role == 2): ?>创业者<?php elseif($item->role == 3): ?>投资人<?php endif; ?> · <?=$item->province?>-<?=$item->city?> <br/>
				<span class="grey"><?php if ($item->gender == 0): ?>女<?php else: ?>男<?php endif; ?> · 23岁</span>
			</p>
		</div>
		<div class="intro">
			<div class="intro_text">
				<div class="arrow"></div>
				<?php if (isset($item->intro) && $item->intro!=''): ?><?=$item->intro ?>
								<?php else: ?>这家伙很懒，什么也没写......<?php endif; ?>
			</div>
			<ul class="aims">
				<li class="ab1"><p style="display:none;">找 人<br/>才</p><i></i></li>
				<li class="ab2"><p style="display:none;">找 投<br/>资</p></li>
				<li class="ab3"><p style="display:none;">找 工<br/>作</p></li>
				<li class="ab4"><p style="display:none;">交 好<br/>友</p></li>
			</ul>
			
		</div>
		<ul class="skills">
			<li class="respect">开发</li>
			<?php if (isset($item->skills) && $item->skills!=NULL): ?>
			<?php foreach(($item->skills) as $skill): ?>
			<li class="skill">
				<?=$skill->skillname?>
			</li>
			<?php endforeach; ?>
			<?php else: ?><li class="skill">
				还未填写任何技能...
			</li><?php endif; ?>
		</ul>
		<div class="more" style="display:none;">
			<a href="">详细资料</a> | <a href="">联系我</a> | <a href="">加为好友</a>
		</div>
	</div>
<?php endforeach; ?>