
<div class="container cate_tab">
	<ul>
		<li><a href="<?=base_url()?>eggs/">全 部</a></li>
		<li><a href="<?=base_url()?>eggs/classid/1">分 享</a></li>
		<li><a href="<?=base_url()?>eggs/classid/2">原 创</a></li>
		<li class="current">收 藏</li>
	</ul>
	
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
		
		
		<div class="bottom">
			<span>参与人数 <?=$item->commentnum?></span><span class="grey"><?=$item->supportnumber?> / <?=$item->criticizenumber?> / <?=$item->neutralnumber?></span>
		</div>
	</div>
	</div><!--#shadow-->
	<?php endforeach; ?>
	
	
</div><!--#container-->

</body>
</html>
	
	