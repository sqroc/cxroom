<div class="header_shadow"></div>
<div class="container" id="main_box">
	<div class="left_box" style="background:#fff;">
		
		
	
		<div class="box_tab" id="box_tab_news" style="display:<?php if($projectmessage == NULL){echo 'none';}else{echo 'block';} ?>;">
			
			<ul class="newslist">
				<?php foreach($projectmessage as $item): ?>
				<li id="<?=$item->promid?>">
					<div class="author_pic">
						<img src="<?=base_url()?><?=$item->person_pic?>" />
					</div>
					<div class="msg_box">
						<div class="new">
							<span class="name"><a href="<?= base_url() ?>/user_space/uid/<?=$item->uid?>"><?=$item->username?></a> : </span>
							<?=$item->pmcontent?>
					
						</div>
						<div class="new_info">
							<span class="date"><? $nowtime = time();echo ceil(($nowtime-$item->pmdate)/(60*60*24));?>天前</span>
							<span class="reply write_reply" id="<?=$item->promid?>"><a href="javascript:void(0)">评论(<?=$item->replynum?>)</a></span>
							
						</div>
					
					</div>
				</li>
				<?php endforeach; ?>			
			</ul>
			<div class="pages">
					<?php echo $this->pagination->create_links();?>
			</div>
		</div>
	
		
		
	</div>
	<div class="right_box">
		
		<img src="<?=base_url()?>images/common/blog.gif" style="margin:30px 0 0 15px;"/>
		
	</div><!--rightbox-->
</div>
<script type="text/javascript">
			$(document).ready(function(){
				send_reply();
			});
			
			function send_reply(){
				$('.sendpm').click(function(){
					
					//ajax
					var pmrecontent  =  add_br( $("#reply_content").attr("value") );
					
					var promid  = $(this).attr('id');
					var url = "<?=base_url()?>projects/addProjectmessage_reply";
					$.post(url, {
					pmrecontent : pmrecontent,
					promid : promid
					},
					function(data) {
						if(data.state == 'ok') {
							warm_dialog('ok', '评论成功!');
						} else {
							warm_dialog('no', "回复评论失败，请检查网络后重试！");
						}
					}, "json");
				});
			}
		</script>	
