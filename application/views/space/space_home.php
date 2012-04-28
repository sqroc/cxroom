	<div class="mid fl">
		
		<div class="user_info">
			<h2><?=$username ?></h2>
			<span class="user_mess">
					<?php if (isset($gender) && $gender !=0): ?>
						男
					<?php elseif (!isset($gender)): ?>
						未设置
					<?php else: ?>
						女
					<?php endif; ?>
			</span>
			<span class="user_mess">
				来自<?php if (isset($province)): ?><?=$province ?>
					<?php else: ?>未设置<?php endif; ?>
			</span>
			<span class="s_button s_m" id="add_friend">
				加为好友
			</span>
			<span class="s_button s_m" id="send_msg">
				发站内信
			</span>
		</div>
		
		<div class="short_intro">
			<div class="j"></div>
			<?php if (isset($intro)): ?><?=$intro ?>
			<?php else: ?>这家伙很懒，什么也没写。<?php endif; ?>
		</div>
		
		<div class="spacecol">
			<h3>技能色条<span>显示结果用于展示用户各个技能相对侧重水平，为自主评分，仅供参考</span></h3>
				<div style="display:none;">
				
					<?php $sum=0;foreach($myskills as $item): ?>
						<?php $sum=$sum + $item->skillscore?>
					<?php endforeach;?>
				
				</div>
			<div class="rainbow">
			
				<?php if($myskills != NULL):?>
					<?php $n=0;foreach($myskills as $item): ?>
						<div class="myskill color<?=$n%5?>" style="width:<?=$item->skillscore/$sum*100?>%"><?=$item->skillname?></div>
						
					<?php $n++;endforeach; ?>
					<?php else: ?>
						<div class="myskill color<?=rand(0,4)?>" style="width:100%;">又是一个没技能的家伙</div>
				<?php endif; ?>
			</div>
			
			<dl><?php $n=0;foreach($myskills as $item): ?>
				<dt class="fcolor<?=$n%5?>"><?=$item->skillname?></dt>
				<dd><?=$item->skillintro?></dd>
				<?php $n++;endforeach; ?>
			</dl>
		</div>
		<div class="spacecol">
			<h3>留言交流<span><a href="<?=base_url()?>space/commentslist/uid/<?=$uid ?>">查看全部留言<?php if($commentNumber>0):?>[<?=$commentNumber?>条]<?php endif; ?></a></span></h3>
			<div class="clear"></div>
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
				<div class="leave_reply">
					<form action="<?=base_url()?>user_space/addcomment" method="post">
					<div class="content">
						<textarea name="comment_content" id="comment_content" ></textarea> <br>
						<input type="hidden" name="uid" id="comment_uid" value="<?=$uid ?>"/>
					</div>
					<div class="c_bottom">
						<input type="button" value="发表留言" class="small_button d_submit" id="send_comment"/>
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
			var comment_content  =  add_br($("#reply_content").attr("value"));
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
					add_comment('reply', comment_content);
					$('#send_reply').val('提交回复');
					auto_height();
				} else {
					warm_dialog('no', '回复失败，请检查网络后重试！');
					$('#send_reply').val('提交回复');
				}
			}, "json");

			$('#reply_content').removeClass('warm');
			
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
					$('#comment_content').removeClass('warm');
					add_comment('comment', comment_content);
					$('#send_comment').val('提交留言');
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


//发送消息
$(document).ready(function() {
	$('#send_reply2').click(function() {
		if(check_content('message')) {
			$(this).val('正在发送');
			//ajax
			var content2  =  $("#reply_content2").attr("value");
			var otheruid  =  $("#reply_uid2").attr("value");
			
			var url = "<?=base_url()?>user_space/addmessage";
			$.post(url, {
			content2 : content2,
			otheruid : otheruid
			},
			function(data) {
				if(data.state == 'ok') {
					warm_dialog('ok', '站内信成功发送！');
					$('#send_reply2').val('发站内信');
				} else {
					warm_dialog('no', '发送失败，请检查网络后重新发送！');
					$('#send_reply2').val('发站内信');
				}
			}, "json");
	
			$('#reply_content2').removeClass('warm');
			$('#t2_dialog').fadeOut();
		} else {
			$('#reply_content2').addClass('warm');
		}
	});
});


//加好友
$(document).ready(function() {
	$('#add_friend').click(function() {
			var url = "<?=base_url()?>user_space/addfriend";
			$.post(url, {
			uid : <?=$uid?>
			},
			function(data) {
				if(data.state == 'ok') {
					warm_dialog('ok', '好友添加成功！');
					
				} else {
					warm_dialog('ok', '已经为好友！');
				}
			}, "json");
		
		
	});
});
</script>
	