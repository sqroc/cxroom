<div class="ibox_shadow">
	<div class="ibox">
		<h2 class="title"><a href="<?=base_url()?>eggs/topic/<?=$idea->ideaid?>"><?=$idea->ideaname?></a></h2>
		<div class="content">
			<?=$idea->ideaintro?>
		</div>
		<div class="author">
				<img class="avatar" src="<?=base_url()?><?=$idea->person_pic?>"/><a href="<?= base_url() ?>/user_space/uid/<?=$idea->uid?>"><?=$idea->username?></a><br><? $nowtime = time();echo ceil(($nowtime-$idea->ideaadddate)/(60*60*24));?>天前
		</div>
		<div class="comments">
			<ul class="commentslist">
			<?php foreach($ideacomment as $commentitem): ?>
					
				<li><a href="<?= base_url() ?>/user_space/uid/<?=$commentitem->uid?>"><?=$commentitem->username?>:</a><?=$commentitem->comment_content?></li>
				
				<?php endforeach; ?>
				</ul>
		</div>
		<div class="bottom">
		<span><?=$idea->iattentionnumber?>人参与</span>
		</div>
	</div>
</div><!--#shadow-->
	
	
	
	
	

	