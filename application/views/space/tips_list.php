	<div class="mid fl">
		
		<div class="space_tabs">
			<ul>
				<li><a href="<?=base_url()?>space/space_projectlist/attentionProjectlist">收藏的项目</a></li>
				<li><a href="<?=base_url()?>space/space_projectlist/attentionegglist">收藏的创意蛋</a></li>
				<li class="current_tab">收藏的词条</li>
			</ul>
		</div>
		<div class="spacecol" style="padding:0;">		
				
				<ul class="notice">		
					<?php foreach($tips as $item): ?>	
					<li>	
						<div class="n_box">
							<h4 class="n_title"><?=$item->name?><span class="date"></span></h4>
							<div class="n_content" style="display:none;">
								<p><?=$item->content?></p>
								<span class="">相关阅读:<a href="<?=$item->articleurl?>">《<?=$item->articletitle?>》</a></span>
							</div>
						</div>
					</li>	
					<?php endforeach; ?>		
				</ul>
				
		</div><!--#space_col-->
		
		<div class="pages">
			<?php echo $this->pagination->create_links();?>
		</div>
	</div><!--#mid-->
<script type="text/javascript">
	$(document).ready(function(){
	$('.n_box').mouseover(function(){
		$(this).css('background','#f9f9f9');
	});
	$('.n_box').mouseout(function(){
		$(this).css('background','#fff');
	});
	$('.n_title').click(function(){
		$(this).next().toggle(300);
		var noticeid  =  $(this).attr('id');
		var url = "<?=base_url()?>space/messages/updatenoticeread";
			$.post(url, {
			noticeid : noticeid,
			},
			function(data) {
				if(data.state == 'ok') {
					
				} else {
					
				}
			}, "json");
	});
	
	
});
</script>
