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
<div class="header_shadow"></div>
<div class="clear"></div>
<div class="con_shadow">
<div class="p_box">
	<div class="pleft fl">
		<div id="move_menu">
		<div class="plogo">
			<img src="<?= $project->logopic?>" />
		</div>
		
		<div class="pmenu">
			<ul>
				<li><a href="#base_info" >基本信息</a></li>
				<li><a href="#intro" class='<?php if(empty($project->aimcontent)){echo"empty";} ?>'>项目简介</a></li>
				<li><a href="#intro" class='<?php if(empty($prousers)){echo"empty";} ?>' >成员资料</a></li>
				<li><a href="#talent" class='<?php if(empty($project->talentcontent)){echo"empty";} ?>' >招募要求</a></li>
				<li><a href="#talent" class='<?php if(empty($project->investcontent)){echo"empty";} ?>' >募资计划</a></li>
				<li><a href="#comments" >评论咨询</a></li>
			</ul>
		</div>
		
		</div><!--#move_menu-->
	</div><!--#left-->
	
	<div class="pright fl">
	
		<div class="ptitle">
			<h2><?= $project->name?></h2>
			<h3> — <?= $project->aimtitle?></h3>
		</div>
		
		<div id="base_info">
			<div class="pinfo fl">
				<div class="counter">
					<ul>
						<li><span class="num"><?= $days?></span>天</li>
						<li><span class="num" id="cheer_counter"><?= $project->applaudnumber?></span>次掌声</li>
						<li><span class="num" id="like_counter"><?= $project->attentionnumber?></span>人关注</li>
						<li><span class="num">12</span>人加入</li>
					</ul>
				</div>
				<div class="base fl">
					<dl>
						<dt>所属类别:</dt>
						<dd><?= $project->pclassname?></dd>
						
						<dt>发布日期:</dt>
						<dd><?= date('Y-m-d',$project->adddate);?></dd>
						
						<dt>发布人:</dt>
						<dd><a href="<?= base_url() ?>/user_space/uid/<?=$project->uid?>"><?=$project->username?></a></dd>
						
						<dt>项目成员:</dt>
						<dd><?php foreach($prousers as $item): ?>
							<a href="<?= base_url() ?>/user_space/uid/<?=$item->uid?>">  <?=$item->username?>  </a> 
							<?php endforeach; ?>		
							</dd>
						
						<dt>是否招募:</dt>
						<?php if ($project->isgetmember == 1): ?>
						<dd>招募进行时</dd>
						<?php else: ?>
						<dd>招募关闭</dd>
						<?php endif; ?>
					
						
						<dt>是否募资</dt>
						<?php if ($project->isinvest == 1): ?>
						<dd>募资进行时</dd>
						<?php else: ?>
						<dd>募资关闭</dd>
						<?php endif; ?>
					</dl>
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
				<div class="active fr">
					<ul>
						<li><input id="attention" name="attention" type="button" value="添加关注" class="button_add button_common"/></li>
						<li><input id="applaud" name="applaud" type="button" value="鼓鼓掌" class="button_wow button_common"/></li>
						<li><input id="applaud" name="applaud" type="button" value="投资赞助" class="button_invest button_common"/></li>
						
					</ul>
				</div>
			</div><!--#pinfo-->
			<div class="pnews fr">
				<div class="new">
					<h4>十秒钟了解我们</h4>
					<p>
						<?= $project->aimcontent?>
					</p>
				</div>
				
			</div><!--#pnews-->
		</div><!--#base_info-->
		
		<div class="clear"></div>
		
		<!--简介&目标-->
		<div id="intro">
			<div class="ptabs">
				<span class="current fl" id="intro_s_1">项目简介</span> 
				<span class="normal fl" id="intro_s_2">项目成员</span> 
			</div>
			<div class="pcontent" id="intro_1">
				<p>
					<?= $project->pintro?>
				</p>
			</div>
			<div class="pcontent" id="intro_2" style="display:none;">
				<table> 
					<tr> 
						<th style="width:15%">姓名</th> 
						<th style="width:50%">个人简介</th> 
						<th style="width:15%">担任角色</th> 
						<th style="width:20%">个人技能</th> 
					</tr> 
					<?php foreach($prousers as $item): ?>
					<tr> 
						<td><a href="<?= base_url() ?>/user_space/uid/<?=$item->uid?>"><?=$item->username?></a></td> 
						<td><?=$item->intro?></td> 
						<td><?=$item->role?></td> 
						<td><?=$item->skill?></td> 
					</tr> 
						<?php endforeach; ?>			
				</table> 
			</div>
		</div>
		
	
		
		<!--招募&募资-->
		<div id="talent">
			<div class="ptabs">
				<span class="current fl" id="talent_s_1">招募要求</span> 
				<span class="normal fl" id="talent_s_2">募资说明</span> 
			</div>
			
			<div class="pcontent" id="talent_1">
				<p>
					<?= $project->talentcontent?>
				</p>
			</div>
			<div class="pcontent" id="talent_2" style="display:none">
				<p>
					<?= $project->investcontent?>
				</p>
			</div>
		</div>
		
		<!--留言-->
		<script type="text/javascript">
			//需要动态定义的全局变量-登录会员信息&url
			var user_photo = '<img src='+'\"<?=base_url()?><?= $userpic?>"'+' />';
			var space_url = '<?= base_url() ?>/user_space/uid/<?=$uid?>';
			var user_name = '<?= $username?>';
			//var url="";
		</script>
		<div id="comments">
			<div class="ptabs">
				<span class="current fl" id="comments_s_1">留言咨询</span> 
			</div>
			<div class="pcontent" id="comments_1">
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
						<div class="clear10_comment"></div>
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
					<div class="content">
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
		</div><!--#comemts-->
	</div><!--#pright-->
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
		<div class="clear0"></div>
</div><!--#p_box-->
</div><!--#container-->
<div class="clear"></div>
