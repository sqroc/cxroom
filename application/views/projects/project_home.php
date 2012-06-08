<div class="header_shadow"></div> 

<div class="container p_header">
	<div class="help_button">
			<a id="whatsthis" href="javascript:void(0)">进度条代表了什么</a>
	</div>
	<div class="p_menu">
		<ul>
			<li><a href="<?=base_url()?>space/objects_form">发布一个项目</a></li>
			<li class="normal mypro" id="p1"><a href="javascript:void(0)">我参加的项目</a></li>
			<li class="normal mypro" id="p2"><a href="javascript:void(0)">我收藏的项目</a></li>
		</ul>
		<script type="text/javascript">
			var mypro = '<?php if($myjoinpro == NULL){echo "你没有参加项目";} foreach($myjoinpro as $item): ?><li><a href="<?=base_url() ?>/projects/home/<?=$item->pid?>" title="<?=$item->name?>"><?=$item->name?></a></li><?php endforeach; ?>';
			var myfavpro = '<?php if($myattentionpro == NULL){echo "你没有收藏项目";}foreach($myattentionpro as $item): ?><li><a href="<?=base_url() ?>/projects/home/<?=$item->pid?>" title="<?=$item->name?>"><?=$item->name?></a></li><?php endforeach; ?>';
		</script>
	</div>
</div>
<div class="container">
	<div id="help" style="display:none;">
		
	</div>
</div>
<div class="container p_container">
	<?php $n = 0;foreach ($projects as $item):?>
	<?php $n++;if($n >= 5){$n = 1;}?>
	<div class="p_box <?php if($n != 1){ echo "p_ml";}?>">
		<div class="p_logo">
			<a href="<?=base_url() ?>/projects/home/<?=$item->pid?>" title="<?=$item->name?>的主页" target="_blank">
				<img src="<?=$item->logopic?>" />
			</a>
			
			<span></span>
		</div>
		<div class="p_intro">
			<h3><?=$item->aimtitle?></h3>
			<p>
				<?=$item->aimcontent?>
			</p>
		</div>
		<?php $days = ceil(( time() - $item -> adddate) / (60 * 60 * 24)); ?>
		<div class="p_line">
			<div class="inside time<?php echo ceil($days/100);?>" style="width:<?php echo $days%100;?>%;"></div>
		</div>
		<div class="rule"></div>
		<div class="p_line hot_line">
			<div class="inside hot" style="width:<?php echo $item->applaudnumber / $days *100;?>%;"></div>
		</div>
		<!--
		<div class="p_more_info">
			<ul>
				
				<li>互联网络</li>
			</ul>
		</div>-->
		<div class="p_bottom">
			<!--获取更多信息-->
		</div>
	</div>
	
	<?php if($n == 4){echo "<div class=\"clear0\"></div>";}?>
	
	<?php endforeach;?>
</div><!--#container-->
