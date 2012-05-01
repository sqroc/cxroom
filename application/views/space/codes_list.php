	<div class="mid fl">
		
		
		<div class="spacecol" style="padding:0;">		
				<h3>可使用的邀请码<span>已使用<?=$usedcodenumber?>个</span></h3>	
				
				<ul class="notice">		
					<?php foreach($codes as $item): ?>	
					<li>	
						<div class="n_box">
							<h4 class="n_title"><?=$item->code?><span class="date"></span></h4>
							
						</div>
					</li>	
					<?php endforeach; ?>		
				</ul>
				
		</div><!--#space_col-->
		
		
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
