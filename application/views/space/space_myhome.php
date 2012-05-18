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
			<span class="user_mess">
				<a href="<?= base_url() ?>/user_space/uid/<?=$userreply->uid?>" title="看看我的客厅">预览我的客厅</a>
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
		<div class="spacecol">
			<h3>留言交流<span><a href="<?=base_url()?>space/commentslist">查看全部留言<?php if($commentNumber>0):?>[<?=$commentNumber?>条]<?php endif; ?></a></span></h3>
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
			var comment_content  = add_br( $("#reply_content").attr("value") );
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
					$('#reply_content').removeClass('warm');
					$('#t_dialog').fadeOut();
					$('#send_reply').val('提交回复');
					add_comment('reply', comment_content);
					auto_height();
				} else {
					warm_dialog('no', '回复失败，请检查网络后重试！');
				}
			}, "json");

			
		} else {
			$('#reply_content').addClass('warm');
		}
	});
});

</script>