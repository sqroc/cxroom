	<div class="mid fl">
		
		<script type="text/javascript">
			var user_photo = '<img src=\"'+ '<?=base_url()?><?=$userreply->person_pic?>' +'\" />';
			var space_url = '<?= base_url() ?>/user_space/uid/<?=$userreply->uid?>';
			var user_name = '<?=$userreply->username ?>';	
		</script>	
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
		<div class="leave_reply">
					<form action="<?=base_url()?>user_space/addcomment" method="post">
					<div class="content">
						<textarea name="comment_content" id="comment_content" cols="60" rows="8"></textarea> <br>
						<input type="hidden" name="uid" id="comment_uid" value="<?=$uid ?>"/>
					</div>
					<div class="c_bottom">
						<input type="button" value="发表留言" class="d_submit small_button" id="send_comment"/>
					</div>
					</form>
					<div class="clear0"></div>
				</div>
			
			
			
		</div>
		
	</div><!--#mid-->
	
<!--dialog-->
<div id="t_dialog" style="display:none;">
	<div class="box">
		<div class="box_top">
			<span class="replyto">回复框</span>
			<span id="close_dialog" class="close_dialog"> </span>
		</div>
		<form action="<?=base_url()?>user_space/replycomment" method="post">
	
			<input type="hidden" value="" id="reply_comment_id" name="comment_id" />
			<input type="hidden" name="uid" id="reply_uid" value="<?=$uid ?>"/>
			<input type="hidden" name="replyspace" id="reply_replyspace" value="<?=$replyspace ?>"/>
			
			<div class="item_box">
				<textarea rows="4"  name="comment_content" id="reply_content"></textarea>
			</div>
			
			<div class="item_box">
				<input type="button" class="small_button" id="send_reply" value="提交内容" />
			</div>
			
		</form>
		<div class="clear0"></div>
	</div>
</div>
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


//发送留言
$(document).ready(function() {
	$('#send_comment').click(function() {
		if(check_content('comment')) {
			$(this).val('正在发送');
			//ajax
			var comment_content  =  add_br( $("#comment_content").attr("value") );
			var uid  =  $("#comment_uid").attr("value");
			var url = "<?=base_url()?>user_space/addcomment";
			$.post(url, {
			comment_content : comment_content,
			uid : uid
			},
			function(data) {
				if(data.state == 'ok') {
					$('#send_comment').val('提交留言');
					$('#comment_content').removeClass('warm');
					add_comment('comment', comment_content);
					auto_height();
				} else {
					warm_dialog('no', '留言失败，请检查网络后重试！');
					$('#send_comment').val('提交留言');
				}
			}, "json");
			
			
		} else {
			$('#comment_content').addClass('warm');
		}
	});
});
</script>
