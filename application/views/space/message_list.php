	
	<div class="mid fl">
		<div class="tab_msg">
			<span class="msg_b">系统消息(<?=$unreadnotice?>)</span>
			<span><a href="<?=base_url()?>space/messages/letters">站内信(<?=$unreadmessage?>)</a></span>
		</div>
		
		<div class="spacecol" style="padding:0;">
				
				
				<ul class="notice">
					<?php foreach($notice as $item): ?>
						<?php if ($item->noticetype == '好友请求'):
							?>
					<li>	
						<div class="n_box">
							<h4 class="n_title">好友请求<span class="date"><? $nowtime = time();echo ceil(($nowtime-$item->noticedate)/(60*60*24));?>天前</span><span class="date" id="read<?=$item->noticeid ?>"><?php if($item->noticeisread == '1'){echo "已处理";} ?></span></h4>
							<div class="short_intro" style="margin:10px 0 ">
								<div class="j"></div>
								<p><a href="<?=base_url()?>user_space/uid/<?=$item->uid ?>"><?=$item->username?></a>希望加你为好友以便长期关注你</p>
								<span class="n_button n_button1" id="<?=$item->noticetypeid ?>">同意</span><span  class="n_button n_button2" id="<?=$item->noticetypeid ?>">同意并加对方为好友</span>
								<span class="n_button readed" id="<?=$item->noticeid ?>">忽略</span>
							</div>
							
						</div>
					</li>
					<?php endif;?>
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
			var comment_content  =  $("#reply_content").attr("value");
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
					alert("回复留言成功！");
					//warm_dialog('ok', '关注成功！', left, top);
					//var counter = parseInt($('#like_counter').text()) + 1;
					//$('#like_counter').text(counter);
				} else {
					//warm_dialog('no', '已经关注过该项目！', left, top);
					alert("回复留言失败！");
				}
			}, "json");

			$(this).val('提交回复');
			$('#reply_content').removeClass('warm');
			$('#t_dialog').fadeOut();
			//add_comment('reply');
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
			var comment_content  =  $("#comment_content").attr("value");
			var uid  =  $("#comment_uid").attr("value");
			var url = "<?=base_url()?>user_space/addcomment";
			$.post(url, {
			comment_content : comment_content,
			uid : uid
			},
			function(data) {
				if(data.state == 'ok') {
					alert("留言成功！");
					//warm_dialog('ok', '关注成功！', left, top);
					//var counter = parseInt($('#like_counter').text()) + 1;
					//$('#like_counter').text(counter);
				} else {
					//warm_dialog('no', '已经关注过该项目！', left, top);
					alert("留言失败！");
				}
			}, "json");
			$(this).val('提交留言');
			$('#comment_content').removeClass('warm');
			//add_comment('comment');
		} else {
			$('#comment_content').addClass('warm');
		}
	});
});

$(document).ready(function(){
	$('.readed').click(function(){
		//$(this).next().toggle(300);
		var noticeid  =  $(this).attr('id');
		var url = "<?=base_url()?>space/messages/updatenoticeread";
			$.post(url, {
			noticeid : noticeid
			},
			function(data) {
				if(data.state == 'ok') {
					$('#read'+noticeid).text("已处理");
				} else {
					
				}
			}, "json");
	});
	
	function updateread(obj){
		var url = "<?=base_url()?>space/messages/updatenoticeread";
			$.post(url, {
			noticeid : obj
			},
			function(data) {
				if(data.state == 'ok') {
					$('#read'+obj).text("已处理");
				} else {
					
				}
			}, "json");
	}
	
	$('.n_button1').click(function(){
		var friendid  =  $(this).attr('id');
		var noticeid = $(this).nextAll('.readed').attr('id');
		var url = "<?=base_url()?>space/messages/updateallowfriend";
			$.post(url, {
			friendid : friendid
			},
			function(data) {
				if(data.state == 'ok') {
					warm_dialog('ok', '操作成功！');
					updateread(noticeid);
				} else {
					warm_dialog('no', '操作失败，请检查网络！');
				}
			}, "json");
	});
	
	$('.n_button2').click(function(){
		var friendid  =  $(this).attr('id');
		var noticeid = $(this).nextAll('.readed').attr('id');
		var url = "<?=base_url()?>space/messages/updateallowfriend2";
			$.post(url, {
			friendid : friendid
			},
			function(data) {
				if(data.state == 'ok') {
					warm_dialog('ok', '操作成功！');
					updateread(noticeid);
				} else {
					warm_dialog('no', '操作失败，请检查网络！');
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
