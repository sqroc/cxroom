<div id="eheader">
	<div class="container ebg">
		<div class="eintro fl">
			<p>
				<span>更低的门槛：</span>只要你有梦想和创意就可以在这里发起，全世界都会来帮你。<br>
				<span>更低的风险：</span>试探市场和人气，条件成熟再入驻项目中心！规避风险，创业从此简单无忧。
			</p>
		</div>
		<div class="newone fr">
			<a href="<?=base_url()?>eggs/new_topic" title="发布一个新的创意"></a>
		</div>
	</div>
</div>
<div class="container" id="ibox_box">
	<?php foreach($ideas as $item): ?>
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
			<span>支持 <?=$item->supportnumber?></span><span>吐槽 <?=$item->criticizenumber?></span><span>酱油 <?=$item->neutralnumber?></span>
		</div>
	</div>
	</div><!--#shadow-->
	<?php endforeach; ?>
	
	
</div><!--#container-->
<div class="container" style="text-align:center;padding:10px;">
	<input type="button" class="more" value="试试手气" />
</div>

<script type="text/javascript">
$(document).ready(function(){
	$('.more').click(function(){
		$(this).val('随机抽取中');
		var url = '<?=base_url()?>/eggs/more';
		$.post(url, {},
			function(data){
				$('#ibox_box').append(data);
				start_box();
				bor_box();
				$('.more').val('试试手气');
			}
		);
	});
});
</script>
</body>
</html>
	
	