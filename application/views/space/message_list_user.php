	
	<div class="mid fl">
		<div class="tab_msg">
			<span><a href="<?=base_url()?>space/messages/notices">系统消息(<?=$unreadnotice?>)</a></span>
			<span class="msg_b">站内信(<?=$unreadmessage?>)</span>
		</div>
		
		<div class="spacecol" style="padding:0;">
				
				
				<ul class="notice">
						<?php foreach($message as $item): ?>
					<li>	
						<div class="n_box">
							<h4 class="n_title" id="<?=$item->messageid?>">来自<a href="<?=base_url()?>user_space/uid/<?=$item->uid ?>"><?=$item->username?></a>的信息<span class="date"><? $nowtime = time();echo ceil(($nowtime-$item->m_date)/(60*60*24));?>天前</span></h4>
							<div class="n_content" style="display:none;">
								<p><?=$item->content ?></p>
								<span class="n_button n_reply" id="<?=$item->myuid?>">回复消息</span>
							</div>
						</div>
					</li>
				<?php endforeach; ?>
						
					
					
				</ul>
				<div class="pages m0">
		
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
			var content  =  $("#reply_content").attr("value");
			var myuid  =  $("#reply_uid").attr("value");
			var otheruid  =  $("#reply_comment_id").attr("value");
			var url = "<?=base_url()?>space/messages/addreplymessage";
			$.post(url, {
			content : content,
			myuid : myuid,
			otheruid : otheruid
			},
			function(data) {
				if(data.state == 'ok') {
					
					warm_dialog('ok', '回复已经发出！');
					//var counter = parseInt($('#like_counter').text()) + 1;
					//$('#like_counter').text(counter);
				} else {
					//warm_dialog('no', '已经关注过该项目！', left, top);
					warm_dialog('no', '回复发送失败，请检查网络！');
				}
			}, "json");

			$(this).val('提交回复');
			$('#reply_content').removeClass('warm');
			$('#t_dialog').fadeOut();
			
		} else {
			$('#reply_content').addClass('warm');
		}
	});
});

$(document).ready(function() {
	$('.n_reply').click(function() {
		var id = $(this).attr('id');
		$("input[name='comment_id']").val(id);
		var offset = $(this).offset();
		var left = offset.left + 10;
		var top = offset.top + 30;
		$('#t_dialog').css({
			"left" : left,
			"top" : top
		}).fadeIn();
	});
});

$(document).ready(function(){
	$('.n_box').mouseover(function(){
		$(this).css('background','#f9f9f9');
	});
	$('.n_box').mouseout(function(){
		$(this).css('background','#fff');
	});
	$('.n_title').click(function(){
		$(this).next().toggle(300);
		var messageid  =  $(this).attr('id');
		var url = "<?=base_url()?>space/messages/updateread";
			$.post(url, {
			messageid : messageid,
			},
			function(data) {
				if(data.state == 'ok') {
				} else {
				}
			}, "json");
	});
	$('.n_button').mouseover(function(){
		$(this).addClass('n_b_r');
	});
	$('.n_button').mouseout(function(){
		$(this).removeClass('n_b_r');
	});
});
</script>
<div id="t_dialog" style="display:none;">
	<div class="box">
		<div class="box_top">
			<span id="close_dialog">关闭</span>
		</div>
		<form action="<?=base_url()?>user_space/replycomment" method="post">
	
			<input type="hidden" value="" id="reply_comment_id" name="comment_id" />
			<input type="hidden" name="uid" id="reply_uid" value="<?=$uid ?>"/>
			
			<div class="item_box">
				<textarea rows="4"  name="comment_content" id="reply_content"></textarea>
			</div>
			
			<div class="item_box">
				<input type="button" class="d_submit" id="send_reply" value="提交内容" />
			</div>
			
		</form>
		<div class="clear0"></div>
	</div>
</div>

