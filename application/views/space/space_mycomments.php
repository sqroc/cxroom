	<div class="mid fl">
		
			
		<div class="spacecol">
			<h3>全部留言<span><?php if($commentNumber>0):?>[<?=$commentNumber?>条]<?php endif; ?></span></h3>
			
				<ul class="comments">
					<?php foreach($comment as $item): ?>
					<li>
						
						<div class="comment_box">
							<div class="avatar">
								<img src="<?=base_url()?><?=$item->person_pic?>" />
							</div>
							<div class="reply w600">
								<span><a href="<?= base_url() ?>/user_space/uid/<?=$item->uid?>"><?=$item->username?></a></span><span class="date"><? $nowtime = time();echo ceil(($nowtime-$item->comment_date)/(60*60*24));?>天前</span><span class="reply_button" id="<?=$item->scommentid?>">回复</span><br>
								<p><?=$item->comment_content?></p>
							</div>
						</div>
						<div class="clear10_comment"></div>
							<!--回复开始--><?php foreach($commentReply as $itemReply): ?>
								<?php if($item->scommentid == $itemReply->comment_parent):?>
							<div class="comment_box comment_reply">
								<div class="avatar2">
									<img src="<?=base_url()?><?=$itemReply->person_pic?>" />
								</div>
								<div class="reply w540">
									<span><a href="<?= base_url() ?>/user_space/uid/<?=$itemReply->uid?>"><?=$itemReply->username?></a></span><span class="date"><? $nowtime = time();echo ceil(($nowtime-$itemReply->comment_date)/(60*60*24));?>天前</span><br>
									<p><?=$itemReply->comment_content?></p>
								</div>
								<div class="clear_comment"></div>
							</div>
							<?php endif; ?>
							<?php endforeach; ?>
						
							<!--回复结束-->
						
							<div class="clear_comment"></div>
					</li>
					<?php endforeach; ?>
					
					
					
				</ul>
				<div class="pages">
			<?php echo $this->pagination->create_links();?>
		</div>
				
			
			
		</div>
		
	</div><!--#mid-->

<script type="text/javascript">
//发送回复
$(document).ready(function() {
	$('#send_reply').click(function() {
		if(check_content('reply')) {
			$(this).val('正在发送');
			//ajax
			var comment_content  =  add_br( $("#reply_content").attr("value") );
			var uid  =  $("#reply_uid").attr("value");
			var comment_id  =  $("#reply_comment_id").attr("value");
			var replyspace  =  $("#reply_replyspace").attr("value");
			var url = "<?=base_url()?>user_space/replycomment";
			$.post(url, {
			comment_content : comment_content,
			uid : uid,
			comment_id : comment_id,
			replyspace : replyspace
			},
			function(data) {
				if(data.state == 'ok') {
					$('#t_dialog').fadeOut();
					$('#reply_content').removeClass('warm');
					add_comment('reply', comment_content);
					$('#send_reply').val('提交回复');
					auto_height();
				} else {
					warm_dialog('no', '回复失败，请检查网络后重试！');
					$('#send_reply').val('提交回复');
				}
			}, "json");

			
		} else {
			$('#reply_content').addClass('warm');
		}
	});
});

</script>
