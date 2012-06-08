<div class="header_shadow"></div>
<script type="text/javascript">
	var user_photo = '<img src=\"'+ '<?=base_url()?><?=$userpic?>' +'\" />';
	var space_url = '<?= base_url() ?>/user_space/uid/<?=$uid?>';
	var user_name = '<?=$username ?>';	
</script>
<div class="container" id="main_box">
	<div class="left_box">
		<div class="base_info">
			<div class="logo">
				<img src="<?= $project->logopic?>" />
				<span></span>
			</div>
			<div class="info">
				
				<h2><?= $project->name?></h2>
				<p class="ad"><?= $project->aimtitle?></p>
				<p class="aim"><?= $project->aimcontent?></p>
			</div>
		</div>
		<div class="tabs">
			<ul class="menu">
				<li id="tab_news" class="tab normal"><a href="<?=base_url()?>projects/home/<?= $project->pid?>">动态</a></li>
				<li id="tab_intro" class="tab normal">简介</li>
				<?php if(!empty($project->talentcontent)): ?>
				<li id="tab_talent" class="tab normal">招募</li>
				<? endif;?>
				<?php if(!empty($project->investcontent)): ?>
				<li id="tab_invest" class="tab normal">募资</li>
				<?php endif;?>
				<li id="tab_comments" class="tab current"><a href="<?=base_url()?>projects/project_comments/<?= $project->pid?>">评论</a></li>
			</ul>
			<div class="buttonbox">
				<span id="applaud">鼓掌支持</span>
				<span id="attention">收藏关注</span>
			</div>
			<script type="text/javascript">
					var url = "<?=base_url()?>projects/attention";
					var url2 = "<?=base_url()?>projects/applaud";
					$(document).ready(function() {
						
						$("#attention").click(function() {
							
							var offset = $(this).offset();
							var left = offset.left;
							var top = offset.top + 40;
							
							$.post(url, {
								pid : <?=$project->pid ?>,
								uid : <?=$uid ?>
							}, function(data) {
								if(data.state == 'ok'){
									warm_dialog('ok', '关注成功！', left, top);
									var counter = parseInt($('#like_counter').text() )+1;
									$('#like_counter').text(counter);
								}else{
									warm_dialog('no', '已经关注过该项目！');
								}
							}, "json");
							
							
						});
						
						$("#applaud").click(function() {
						
							var offset = $(this).offset();
							var left = offset.left;
							var top = offset.top + 40;
						
							$.post(url2, {
								pid : <?=$project->pid ?>,
								uid : <?=$uid ?>
							}, function(data) {
								if(data.state == 'ok'){
									warm_dialog('ok', '操作成功！', left, top);
									var counter = parseInt($('#cheer_counter').text() )+1;
									$('#cheer_counter').text(counter);
								}else{
									warm_dialog('no', '您已经鼓掌过了！');
								}
							}, "json");
							
						});
						
					});
					
				</script>
		</div>
		<div class="box_tab content" id="box_tab_intro" style="display:none">
			<?= $project->pintro?>
		</div>
		<div class="box_tab content" id="box_tab_talent" style="display:none">
			<?= $project->talentcontent?>
		</div>
		<div class="box_tab content" id="box_tab_invest" style="display:none">
			<?= $project->investcontent?>
		</div>
		<div class="box_tab contents" id="box_tab_comments">
			<ul class="comments">
					<?php foreach($comment as $item): ?>
					<li>
						
						<div class="comment_box">
							<div class="avatar">
								<img src="<?=base_url()?><?=$item->person_pic?>" />
							</div>
							<div class="reply w600">
								<span><a href="<?= base_url() ?>/user_space/uid/<?=$item->uid?>"><?=$item->username?></a></span><span class="date"><? $nowtime = time();echo ceil(($nowtime-$item->pcomment_date)/(60*60*24));?>天前</span><span class="reply_button" id="<?=$item->pcommentid?>">回复</span><br>
								<p><?=$item->pcomment_content?></p>
							</div>
						</div>
						
							<!--回复开始--><?php foreach($commentReply as $itemReply): ?>
								<?php if($item->pcommentid == $itemReply->pcomment_parent):?>
							<div class="comment_box comment_reply">
								<div class="avatar2">
									<img src="<?=base_url()?><?=$itemReply->person_pic?>" />
								</div>
								<div class="reply w540">
									<span><a href="<?= base_url() ?>/user_space/uid/<?=$itemReply->uid?>"><?=$itemReply->username?></a></span><span class="date"><? $nowtime = time();echo ceil(($nowtime-$itemReply->pcomment_date)/(60*60*24));?>天前</span><br>
									<p><?=$itemReply->pcomment_content?></p>
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
					<div class="contentt">
						<textarea name="comment_content" id="comment_content" cols="60" rows="8"></textarea> <br>
						<input type="hidden" name="uid" id="comment_uid" value="<?=$uid ?>"/>
						<input type="hidden" name="pid" id="comment_pid" value="<?= $project->pid?>"/>
					</div>
					<div class="c_bottom">
						<input type="button" value="发表留言" class="small_button submit" id="send_comment"/>
					</div>
					</form>
					<div class="clear0"></div>
				</div>
			
		</div>
		
	</div>
	<div class="right_box">
		<div class="inte no">
			<!--如何点亮？-->
		</div>
		<div class="clap">
			<ul>
				<li><span class="num"><?= $days?></span>天数</li>
				<li class="p20"><span class="num" id="cheer_counter"><?= $project->applaudnumber?></span>掌声</li>
				<li class="p20"><span class="num" id="like_counter"><?= $project->attentionnumber?></span>收藏</li>
				<!--<li><span class="num">12</span>人加入</li>-->
			</ul>
		</div>
		<div class="line">
				
			<div class="p_line">
				<div class="inside time<?php echo ceil($days/100);?>" style="width:<?php echo $days%100;?>%;"></div>
			</div>
			
			<div class="p_line hot_line">
				<div class="inside hot" style="width:<?php echo $project->applaudnumber / $days *100;?>%;"></div>
			</div>
		</div>
		
		<div class="side_title">
			团队成员
		</div>
		<div class="team">
			<ul>
				<?php foreach($prousers as $item): ?>
				<li>
					<img class="user_hover" rel="<?=$item->uid?>" src="<?=base_url()?><?=$item->person_pic?>" />
					<span><a class="user_hover" rel="<?=$item->uid?>" href="<?= base_url() ?>/user_space/uid/<?=$item->uid?>"><?=$item->username?></a></span>
					<span class="role"><?=$item->role?></span>
				</li>
				<?php endforeach; ?>			
			</ul>
		</div>
		
	</div><!--rightbox-->
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
			var pcommentid  =  $("#reply_comment_id").attr("value");
			var pid  =  $("#comment_pid").attr("value");
			var url = "<?=base_url()?>projects/replyProjectcomment";
			$.post(url, {
			comment_content : comment_content,
			uid : uid,
			pcommentid : pcommentid,
			pid : pid
			},
			function(data) {
				if(data.state == 'ok') {
					//alert("回复留言成功！");
					$('#t_dialog').fadeOut();
					$('#send_reply').val('提交回复');
					add_comment('reply', comment_content);
				} else {
					alert("回复留言失败，请检查网络后重试！");
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
			var pid  =  $("#comment_pid").attr("value");
			var url = "<?=base_url()?>projects/addProjectcomment";
			$.post(url, {
			comment_content : comment_content,
			uid : uid,
			pid : pid
			},
			function(data) {
				if(data.state == 'ok') {
					$('#send_comment').val('提交留言');
					add_comment('comment', comment_content);
				} else {
					alert("回复留言失败，请检查网络后重试！");
				}
			}, "json");
			
			$('#comment_content').removeClass('warm');
			
		} else {
			$('#comment_content').addClass('warm');
		}
	});
});
</script>
<div id="t_dialog" style="display:none;">
	<div class="box">
		<div class="box_top">
			<span class="replyto">回复框</span>
			<span id="close_dialog" class="close_dialog"></span>
		</div>
		<form action="">
		
					<input type="hidden" value="" id="reply_comment_id" name="comment_id" />
					<input type="hidden" name="uid" id="reply_uid" value="<?=$uid ?>"/>
					<input type="hidden" name="pid" id="comment_pid" value="<?= $project->pid?>"/>
					<input type="hidden" name="user" id="user" value="<?= $username?>"/>
					<input type="hidden" name="userpic" id="userpic" value="<?= $userpic?>"/>
					<input type="hidden" name="user_name"/>
					<input type="hidden" name="comment_id"/>
				
			<div class="item_box">
					<textarea rows="4" name="reply_content" id="reply_content"></textarea>
			</div>
			<div class="item_box">
					<input type="button" class="small_button" id="send_reply" value="提交回复" />			
				<div class="clear0"></div>
			</div>
		</form>
	</div>
</div>
