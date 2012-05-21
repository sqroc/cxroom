	
	<div class="mid fl">
		<div class="tab_msg">
			<span><a href="<?=base_url()?>space/messages/notices">系统消息(<?=$unreadnotice?>)</a></span>
			<span class="msg_b">站内信(<?=$unreadmessage?>)</span>
		</div>
		
		<div class="spacecol" style="padding:0;margin-top:10px;">
				
				
				<ul class="notice">
						<?php foreach($message as $item): ?>
					<li>	
						<div class="n_box">
							<h4 class="n_title">来自<a href="<?=base_url()?>user_space/uid/<?=$item->uid ?>"><?=$item->username?></a>的信息<span class="date"><? $nowtime = time();echo ceil(($nowtime-$item->m_date)/(60*60*24));?>天前</span><span class="date" id="read<?=$item->messageid?>"><?php if($item->isread=='1'){echo "已查阅";} ?></span></h4>
							<div class="short_intro" style="margin:10px 0 ">
								<div class="j"></div>
								<p><?=$item->content ?></p>
								<span class="n_button n_reply" id="<?=$item->myuid?>">回复消息</span>
								<span class="n_button readed" id="<?=$item->messageid?>">标记为已阅</span>
							</div>
						</div>
					</li>
				<?php endforeach; ?>
						
					
					
				</ul>
				<div class="pages">
			<?php echo $this->pagination->create_links();?>
		</div>
		
		</div>
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
	
	$('.readed').click(function(){
		//$(this).next().toggle(300);
		var messageid  =  $(this).attr('id');
		var url = "<?=base_url()?>space/messages/updateread";
			$.post(url, {
			messageid : messageid
			},
			function(data) {
				if(data.state == 'ok') {
					$('#read'+messageid).text("已查阅");
				} else {
				}
			}, "json");
	});
	$('.n_button').hover(function(){
		$(this).css('color', '#669900');
	}, function(){
		$(this).css('color', '#444');
	});
});
</script>

