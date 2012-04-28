<div class="ibox_shadow">
<div class="ibox bor_normal">
	<h2 class="title"><?=$tip->name?></h2>
	<div class="content">
		<?=$tip->content?>
	</div>
	<div class="comments">
		<ul class="commentslist">
			<li>相关阅读:<a href="<?=$tip->articleurl?>">《<?=$tip->articletitle?>》</a></li>
			
		</ul>
	</div>

<script type="text/javascript">
$(document).ready(function(){
	$('.bottom').click(function(){
		var vid = $(this).attr('id');
		var url = "<?=base_url()?>tips/addvoattention";
		$.post(url, {
				vid : vid
				}, function(data) {
				if(data.state == 'ok'){
					warm_dialog('ok', '收藏成功！');
				}else{
					warm_dialog('no', '已经收藏过该词条！');
				}
		}, "json");
	});
});
</script>
	<div class="bottom" id="<?=$tip->vid?>">
		<span style="cursor:pointer;">收藏</span>
	</div>
</div>
</div>

