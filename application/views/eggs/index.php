<div class="container" id="ibox_box">
	<?php foreach($ideas as $item): ?>
	<div class="ibox_shadow">
	<div class="ibox">
		<h2 class="title"><a href="<?=base_url()?>eggs/topic/<?=$item->ideaid?>"><?=$item->ideaname?></a></h2>
		<div class="content">
			<?=$item->ideaintro?>
		</div>
		<div class="author">
			<img class="avatar" src="<?=base_url()?><?=$item->person_pic?>"/><a href="<?= base_url() ?>/user_space/uid/<?=$item->uid?>"><?=$item->username?></a><br><? $nowtime = time();echo ceil(($nowtime-$item->ideaadddate)/(60*60*24));?>天前
		</div>
		<div class="comments">
			<ul class="commentslist">
				<?php foreach($ideascomment as $commentitem): ?>
					<?php if($commentitem->icommentideaid == $item->ideaid):?>
				<li><a href="<?= base_url() ?>/user_space/uid/<?=$commentitem->uid?>"><?=$commentitem->username?>:</a><?=$commentitem->comment_content?></li>
				<?php endif; ?>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="bottom">
			<span><?=$item->iattentionnumber?>人参与</span>
		</div>
	</div>
	</div><!--#shadow-->
	<?php endforeach; ?>
	

</div><!--#container-->
<div class="container" style="text-align:center;padding:10px;">
	<input type="button" class="more" value="查看更多" />
</div>

<script type="text/javascript">
$(document).ready(function(){
	$('.more').click(function(){
		$(this).html('随机抽取中');
		var url = '<?=base_url()?>/eggs/more';
		$.post(url, {},
			function(data){
				$('#ibox_box').append(data);
				start_box();
				bor_box();
				$('.more').html('查看更多');
			}
		);
	});
});
</script>
	
	