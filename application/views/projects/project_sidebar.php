	<!--siede bar-->
	<div class="sidebox fr borl">
		<div class="counter">
			<div class="span">发现</div>
			<div class="p"><?=$attentionmembertotal?>人在这里发现了自己喜欢的项目！</div>
		</div>
		<div class="counter">
			<div class="span">鼓掌</div>
			<div class="p"><?=$applaudmembertotal?>人在这里为他人加油喝彩！</div>
		</div>
		<div class="counter">
			<div class="span">搏击</div>
			<div class="p"><?=$promembermembertotal?>人在这里参与了项目！</div>
		</div>
		<div class="counter">
			<div class="span">丰收</div>
			<div class="p"><?=$projecttotal?>个项目成功孵化成工作室或者企业</div>
		</div>
		<div class="counter">
			<div class="span">共赢</div>
			<div class="p">0人在这里找到了工作</div>
		</div>
		
		<div class="cl30"></div>
		<h3 class="side_h3 myproject">
			我参加的项目
		</h3>
		<ul class="sidelist">
			<?php foreach($myjoinpro as $item): ?>
			<li><a href="<?=base_url() ?>/projects/home/<?=$item->pid?>" title="<?=$item->name?>"><?=$item->name?></a></li>
			<?php endforeach; ?>
			
		</ul>
		<h3 class="side_h3 mylove">
			我关注的项目
		</h3>
		<ul class="sidelist">
				<?php foreach($myattentionpro as $item): ?>
			<li><a href="<?=base_url() ?>/projects/home/<?=$item->pid?>" title="<?=$item->name?>"><?=$item->name?></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
</div><!--#container-->