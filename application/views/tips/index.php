<div class="container" id="ibox_box">
	
	<?php foreach($tips as $item): ?>
		
	<div class="ibox_shadow">
	<div class="ibox bor_normal">
		<h2 class="title">	<?=$item->name?></h2>
		<div class="content">
				<?=$item->content?>
		</div>
		<div class="comments">
			<ul class="commentslist">
				<li>相关阅读:<a href="<?=$item->articleurl?>">《<?=$item->articletitle?>》</a></li>
				
			</ul>
		</div>
	
		<div class="bottom" id="<?=$item->vid?>">
			<span style="cursor:pointer;">收藏</span>
		</div>
	</div>
	</div><!--shadow-->
	<?php endforeach; ?>
	
	
	
	
	
	
	
	
	
</div><!--#container-->
<div class="container" style="text-align:center;padding:10px;">
	<input type="button" class="more" value="查看更多" />
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



$(document).ready(function(){
	$('.more').click(function(){
		var url = '<?=base_url()?>/tips/more';
		$.post(url, {},
			function(data){
				$('#ibox_box').append(data);
				start_box();
				bor_box();
			}
		);
	});
});

function warm_dialog(tag, msg){
	
	var left = $('body').width()/2-160;
	var t = document.documentElement.scrollTop || document.body.scrollTop;
	var top = $(window).height()/2-80;
	//top = parseInt(top) + parseInt(ｔ);

	$('body').append('<div id="warm_dialog" style="display:none;"><div class="box"><div id="t_content"><p></p></div></div></div>');
	$('#t_content').html(msg).addClass(tag);
	
	$('#warm_dialog').css({"left":left,"top":top+t});
	//move_dialog();
	$('#warm_dialog').fadeIn();
	
	setTimeout(hide_warm_dialog,3000);
}

function move_dialog(){
	$(document).mousemove(function(e){
		$('#warm_dialog').css({"left":e.pageX+20,"top":e.pageY+20});
	});
	
}

function hide_warm_dialog(){
	$('#warm_dialog').fadeOut();
	$('#warm_dialog').remove();
}
</script>
	
	