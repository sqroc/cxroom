<div class="ibox_shadow">
	<div class="ibox">
		<!--封面图片-->
		<?php if($idea->coverimage!=NULL):?>
		<div class="faceimg">
			<img src="<?=base_url()?><?=$idea->coverimage?>"  />
		</div>
			<?php endif; ?>
		<h2 class="title"><a href="<?=base_url()?>eggs/topic/<?=$idea->ideaid?>"><?=$idea->ideaname?></a></h2>
		<div class="content">
			<?=$idea->ideaintro?>
		</div>
		<div class="author">
				<img class="avatar user_hover" id="<?=$idea->uid?>" src="<?=base_url()?><?=$idea->person_pic?>"/><a class="user_hover" id="<?=$idea->uid?>" href="<?= base_url() ?>/user_space/uid/<?=$idea->uid?>"><?=$idea->username?></a>
				<?php if($idea->ctype == 1):?>
									<img src="<?=base_url()?>images/c/c_personal_little.gif" />
								<?php elseif($idea->ctype == 2):?>
									<img src="<?=base_url()?>images/c/c_team_little.gif" />
								<?php else:?>
									
								<?php endif;?>
				<br><? $nowtime = time();echo ceil(($nowtime-$idea->ideaadddate)/(60*60*24));?>天前
		</div>
		<div class="comments">
			<ul class="commentslist">
			<?php $n=0;foreach($ideacomment as $commentitem):$n++; ?>
					<?php if($n<4): ?>
				<li><a class="user_hover" id="<?=$commentitem->uid?>" href="<?= base_url() ?>/user_space/uid/<?=$commentitem->uid?>"><?=$commentitem->username?></a>
					<?php if($commentitem->ctype == 1):?>
									<img src="<?=base_url()?>images/c/c_personal_little.gif" />
								<?php elseif($commentitem->ctype == 2):?>
									<img src="<?=base_url()?>images/c/c_team_little.gif" />
								<?php else:?>
									
								<?php endif;?>
					 :<?php echo mb_strimwidth($commentitem->comment_content, 0, 100, '....') ?></li>
				    <?php endif;?>
				<?php endforeach; ?>
				</ul>
		</div>
		<div class="bottom">
			<span>参与人数 <?=$idea->commentnum?></span><span class="grey"><?=$idea->supportnumber?> / <?=$idea->criticizenumber?> / <?=$idea->neutralnumber?></span>
		</div>
	</div>
</div><!--#shadow-->
	
	
	
	
	

	