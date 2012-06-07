<div class="clear"></div>
<div class="container top_shadow">
	<div class="egg_good">
		
		<div class="good_box good_c0">
			<div class="angle"></div>
			<div class="egg_info">
				
				收录创意 <span><?=$eggnum?></span> 个<br /> 
				献计献策 <span><?=$eggcommentnum?></span> 条
			</div>
		</div>
		<div class="good_box good_c2">
			<div class="hot">
				<h3>焦<br/>点<br/>创<br/>意</h3>
				<p>
					在这个什么都要电的时代
？看看大家如何奇思妙想解决充电问题!
				</p>
			</div>
		</div>
		<div class="good_box good_c3">
			<ul class="hot_list">
				<li><a href="http://www.cxroom.com/eggs/topic/37">移动设备绿色充电</a></li>
				<li><a href="http://www.cxroom.com/eggs/topic/41">接蛋 移动设备绿色充电</a></li>
			</ul>
		</div>
		<div class="good_box good_c4">
			<div class="new_egg">
				<a href="<?=base_url()?>eggs/new_topic"> </a>
				<p class="new_intro">脑子越用越活，创意越说越多！</p>	
			</div>			
		</div>
		<div class="clear0"></div>
	</div>
</div>
<div>
	分类：<a href="<?=base_url()?>eggs/">全部</a> || <a href="<?=base_url()?>eggs/classid/1">分享</a> || <a href="<?=base_url()?>eggs/classid/2">原创</a>
	
</div>
<div class="container" id="ibox_box">
	<?php foreach($ideas as $item):$n=1; ?>
	<div class="ibox_shadow">
	<div class="ibox">
		<!--封面图片-->
		<?php if($item->coverimage!=NULL):?>
		<div class="faceimg">
			<img src="<?=base_url()?><?=$item->coverimage?>"  />
		</div>
			<?php endif; ?>
		<h2 class="title"><a href="<?=base_url()?>eggs/topic/<?=$item->ideaid?>"><?=$item->ideaname?></a></h2>
		<div class="content">
			<?=$item->ideaintro?>
		</div>
		<div class="author">
			<img class="avatar user_hover" id="<?=$item->uid?>" src="<?=base_url()?><?=$item->person_pic?>"/><a class="user_hover" id="<?=$item->uid?>" href="<?= base_url() ?>/user_space/uid/<?=$item->uid?>"><?=$item->username?></a>
							<?php if($item->ctype == 1):?>
									<img src="<?=base_url()?>images/c/c_personal_little.gif" />
								<?php elseif($item->ctype == 2):?>
									<img src="<?=base_url()?>images/c/c_team_little.gif" />
								<?php else:?>
									
								<?php endif;?>
			<br><? $nowtime = time();echo ceil(($nowtime-$item->ideaadddate)/(60*60*24));?>天前
		</div>
		<div class="comments">
			<ul class="commentslist">
				<?php foreach($ideascomment as $commentitem): ?>
					<?php if(($commentitem->icommentideaid == $item->ideaid) && ($n < 5)):$n++;?>
				<li><a class="user_hover" id="<?=$commentitem->uid?>" href="<?= base_url() ?>/user_space/uid/<?=$commentitem->uid?>"><strong><?=$commentitem->username?></strong></a>
					<?php if($commentitem->ctype == 1):?>
									<img src="<?=base_url()?>images/c/c_personal_little.gif" />
								<?php elseif($commentitem->ctype == 2):?>
									<img src="<?=base_url()?>images/c/c_team_little.gif" />
								<?php else:?>
									
								<?php endif;?>
					:<?php echo mb_strimwidth(strip_tags($commentitem->comment_content), 0, 70, '....') ?></li>
				<?php endif; ?>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="bottom">
			<span>参与人数 <?=$item->commentnum?></span><span class="grey"><?=$item->supportnumber?> / <?=$item->criticizenumber?> / <?=$item->neutralnumber?></span>
		</div>
	</div>
	</div><!--#shadow-->
	<?php endforeach; ?>
	
	
</div><!--#container-->
<div class="container" style="text-align:center;padding:10px;">
	
	<div class="more">试试手气 ↓</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	$('.more').click(function(){
		$(this).html('<img src="<?=base_url()?>images/common/loading.gif" style="margin-top:10px;"/>');
		var url = '<?=base_url()?>/eggs/more';
		$.post(url, {},
			function(data){
				$('#ibox_box').append(data);
				start_box();
				bor_box();
				$('.more').html('试试手气 ↓');
			}
		);
	});
});
</script>
</body>
</html>
	
	