	<div class="mid fl">
		
		<div class="user_info">
			<h2><?=$username ?></h2>
			
			<span class="user_mess">
				
					知名指数
			</span>
			<span class="user_score">
				<?=$clickdata->click?>
			</span>
			<div class="talk">
				<span class="btn grey" id="send_msg">
					发站内信
				</span>
				<span class="btn focus" id="add_friend">
					+关注Ta
				</span>
				
			</div>
		</div>
		
		<div class="short_intro">
			<div class="j"></div>
			<p>
			<?php if (isset($intro) && $intro!=''): ?><?=$intro ?>
			<?php else: ?>这家伙很懒，什么也没写。<?php endif; ?></p>
			<div class="base_info">
				<span>
				<?php if (isset($gender) && $gender !=0): ?>
					男
				<?php elseif (!isset($gender)): ?>
					性别保密
				<?php else: ?>
					女
				<?php endif; ?>
				</span><span>
				<?php if (isset($province) && $province!='---请选择---'): ?>来自<?=$province ?><?php else:?>
					来自未知星球
					<?php endif; ?></span>
			</div>
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
			
			<?php $n=0;foreach($myskills as $item): ?>
				<div class="dl">
					<div class="fcolor<?=$n%5?> dt"><?=$item->skillname?></div>
					<div class="dd"><?php if(isset($item->skillintro) && $item->skillintro!=''){
						echo $item->skillintro;}else{
							echo "不多说，你懂的";
						}?>
					</div>
				</div>
				<?php $n++;endforeach; ?>
			
		</div>
		
		<div class="s_title">
			<h3>九 问<span>人与人，每一次的相识都源自对彼此的好奇</span></h3>
		</div>
		<div class="ask">
			<?php if (isset($nineaskinfo->q1) && $nineaskinfo->q1 !=NULL): ?>
			<h4 class="question finish"><span class="icon">Q1</span>你小时候或者现在的梦想是什么？</h4>
				<?php else: ?>
			<h4 class="question"><span class="icon">Q1</span>你小时候或者现在的梦想是什么？</h4>
			<?php endif; ?>
			
			<p><?php if (isset($nineaskinfo->q1) && $nineaskinfo->q1 !=NULL): ?>
				<?=$nineaskinfo->q1 ?>
				<?php else: ?>
			儿时的梦想是长大该多好，现在的梦想是当小孩子多好...
			<?php endif; ?></p>
		</div>
		<div class="ask">
				<?php if (isset($nineaskinfo->q2) && $nineaskinfo->q2 !=NULL): ?>
				<h4 class="question finish"><span class="icon">Q2</span>自己都做过或者想过些啥有创意的事？</h4>
				<?php else: ?>
			<h4 class="question"><span class="icon">Q2</span>自己都做过或者想过些啥有创意的事？</h4>
			<?php endif; ?>
			
			<p><?php if (isset($nineaskinfo->q2) && $nineaskinfo->q2 !=NULL): ?>
				<?=$nineaskinfo->q2 ?>
				<?php else: ?>
			一天背500多单词，这应该属于创意型自虐...
			<?php endif; ?></p>
		</div>
		<div class="ask">
			<?php if (isset($nineaskinfo->q3) && $nineaskinfo->q3 !=NULL): ?>
						<h4 class="question  finish"><span class="icon">Q3</span>长这么大，你最勇敢的尝试是什么？</h4>
				<?php else: ?>
					<h4 class="question"><span class="icon">Q3</span>长这么大，你最勇敢的尝试是什么？</h4>
			<?php endif; ?>
	
			<p><?php if (isset($nineaskinfo->q3) && $nineaskinfo->q3 !=NULL): ?>
				<?=$nineaskinfo->q3 ?>
				<?php else: ?>
			对着镜子里的自己说，我喜欢你！
			<?php endif; ?></p>
		</div>
		<div class="ask">
			<?php if (isset($nineaskinfo->q4) && $nineaskinfo->q4 !=NULL): ?>
				<h4 class="question finish"><span class="icon">Q4</span>你朋友圈子里有什么怪才？</h4>
				<?php else: ?>
			<h4 class="question"><span class="icon">Q4</span>你朋友圈子里有什么怪才？</h4>
			<?php endif; ?>
			
			<p><?php if (isset($nineaskinfo->q4) && $nineaskinfo->q4 !=NULL): ?>
				<?=$nineaskinfo->q4 ?>
				<?php else: ?>
			怪才？这问题真怪。
			<?php endif; ?></p>
		</div>
		<div class="ask">
			<?php if (isset($nineaskinfo->q5) && $nineaskinfo->q5 !=NULL): ?>
				<h4 class="question finish"><span class="icon">Q5</span>你是否有过参与某支团队的经历？哪怕只是为了完成很小的事情？
</h4>
				<?php else: ?>
			<h4 class="question"><span class="icon">Q5</span>你是否有过参与某支团队的经历？哪怕只是为了完成很小的事情？
</h4>
			<?php endif; ?>
			<p>
<?php if (isset($nineaskinfo->q5) && $nineaskinfo->q5 !=NULL): ?>
				<?=$nineaskinfo->q5 ?>
				<?php else: ?>
			曾今和队友步行1000公里到很远的地方。
			<?php endif; ?></p>
		</div>
		<div class="ask">
			<?php if (isset($nineaskinfo->q6) && $nineaskinfo->q6 !=NULL): ?>
				<h4 class="question  finish"><span class="icon">Q6</span>你是否想过要创业？如果有你想象中的创业是怎样的？</h4>
				<?php else: ?>
			<h4 class="question"><span class="icon">Q6</span>你是否想过要创业？如果有你想象中的创业是怎样的？</h4>
			<?php endif; ?>
			
			<p><?php if (isset($nineaskinfo->q6) && $nineaskinfo->q6 !=NULL): ?>
				<?=$nineaskinfo->q6 ?>
				<?php else: ?>
			大概在梦里。
			<?php endif; ?></p>
		</div>
		<div class="ask">
			<?php if (isset($nineaskinfo->q7) && $nineaskinfo->q7 !=NULL): ?>
				<h4 class="question finish"><span class="icon">Q7</span>你是否会放弃一份优越的工作选择去创业？</h4>
				<?php else: ?>
			<h4 class="question"><span class="icon">Q7</span>你是否会放弃一份优越的工作选择去创业？</h4>
			<?php endif; ?>
			
			<p><?php if (isset($nineaskinfo->q7) && $nineaskinfo->q7 !=NULL): ?>
				<?=$nineaskinfo->q7 ?>
				<?php else: ?>
			平平淡淡才是真啊！
			<?php endif; ?></p>
		</div>
		<div class="ask">
			<?php if (isset($nineaskinfo->q8) && $nineaskinfo->q8 !=NULL): ?>
			<h4 class="question finish"><span class="icon">Q8</span>给你一个亿你会怎么花？存起来还是搞投资？</h4>
				<?php else: ?>
			<h4 class="question"><span class="icon">Q8</span>给你一个亿你会怎么花？存起来还是搞投资？</h4>
			<?php endif; ?>
			
			<p><?php if (isset($nineaskinfo->q8) && $nineaskinfo->q8 !=NULL): ?>
				<?=$nineaskinfo->q8 ?>
				<?php else: ?>
			恩，先把钱给我转到卡里，我再慢慢想想这个问题。
			<?php endif; ?></p>
		</div>
		<div class="ask">
			<?php if (isset($nineaskinfo->q9) && $nineaskinfo->q9 !=NULL): ?>
				<h4 class="question finish"><span class="icon">Q9</span>列举几个理由来证明你可以获得成功！</h4>
				<?php else: ?>
			<h4 class="question"><span class="icon">Q9</span>列举几个理由来证明你可以获得成功！</h4>
			<?php endif; ?>
			
			<p><?php if (isset($nineaskinfo->q9) && $nineaskinfo->q9 !=NULL): ?>
				<?=$nineaskinfo->q9 ?>
				<?php else: ?>
			还没想出来自己能成功的理由。
			<?php endif; ?></p>
		</div>
		
		
		
		<div class="spacecol">
			<h3>留言交流</h3>
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
							<?php foreach($commentReply as $itemReply): ?>
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


<div id="t2_dialog" style="display:none;">
	<div class="box">
		<div class="box_top">
			<span>给 <?=$username ?> 发送站内信</span>
			<span id="close_dialog2" class="close_dialog"> </span>
		</div>
		<form action="<?=base_url()?>user_space/replycomment" method="post">
	
		
			<input type="hidden" name="uid" id="reply_uid2" value="<?=$uid ?>"/>

			
			<div class="item_box">
				<textarea rows="4"  name="comment_content" id="reply_content2"></textarea>
			</div>
			
			<div class="item_box">
				<input type="button" class="small_button" id="send_reply2" value="发送消息" />
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
	