	<div class="mid fl">
		<script type="text/javascript">
			var user_photo = '<img src=\"'+ '<?=base_url()?><?=$userreply->person_pic?>' +'\" />';
			var space_url = '<?= base_url() ?>/user_space/uid/<?=$userreply->uid?>';
			var user_name = '<?=$userreply->username ?>';	
		</script>
		<script src="<?=base_url()?>js/space_myhome.js" type="text/javascript"></script>
		
		
		<div class="text_center">
			<div class="text_top">
				<h2 id="t_h">发条短信给好友 分享讨论你们的创意</h2>
				<div class="r">
					<a href="<?= base_url() ?>/projects/ourblog">创新空间的动态</a> | 
					<a href="<?= base_url() ?>/user_space/uid/<?=$userreply->uid?>">我的客厅</a>
				</div>
			</div>		
			<input type="hidden" name="uid" id="msg_getter" value=""/>
			<input type="hidden" name="egg_id" id="eid" value="" />
			<input type="hidden" name="egg_name" id="ename" value="" />
			<input type="hidden" name="egg_pic" id="epic" value="" />
			<input type="hidden" name="pid" id="pid" value="" />
			<textarea rows="4"  name="comment_content" class="text" id="reply_content2"></textarea>
			<div class="text_bottom">
			
				<span class="check_tab ct check_tab_on" id="weixin" style="margin-left:0;">聊天</span>
				<span class="check_tab ct" id="share">分享</span>
				<span class="list_tab" id="s_list" style="display:none;"> </span>
				<span class="check_tab ct" id="new">广播</span>
				<span class="list_tab" id="n_list" style="display:none;"> </span>
				<span class="check_tab" id="myf" style="padding-left:0;"><a href="javascript:void(0)">发给0位好友</a></span>
				<!--
				<span class="check_tab" id="all" style="padding-left:0;display:none;"><a href="javascript:void(0)">全选</a></span>
				-->
				<div class="little_button" id="send_reply2">马上发布</div>
			</div>
			
			
		</div><!--textc-->
		<script type="text/javascript">
			var flag_friends = true;
			var flag_share = false;
			var flag_weixin = true;
			var flag_new = false;
			var share_url = '<?=base_url()?>space/space_projectlist/attentioneggs_api';
			var new_url = '<?=base_url()?>projects/getMyjoinpro';
			var aim = "";
			
			$(document).ready(function(){
			
				
				$('#myf').click(function(){
					$('#attention_eggs').css('display', 'none');
					$('#all').css('display', 'block');
					var temp = "";
					if(flag_friends){
						var url = "<?=base_url()?>space/space_userlist/myfriends_api";
						$.getJSON(url, function(json){
							
							flag_friends = false;
							var n = json.length;
							var i;
							
							for(i=0; i<n; i++){
								temp += '<li id=\"' + json[i].uid + '\" class=\"ff unselect\" rel="unselect">' + json[i].name + '</li>'; 
							}
							
							t_popmenu($('#myf'), '<div id="friends_list"><ul>' + temp + '</ul></div>', 200);
							add_one();
						});
					} else {
						t_popmenu($('#myf'), '<div id="friends_list"><ul>' + temp + '</ul></div>', 200);
					}
					return false;
				});
				
				$('#friends_list').click(function(){
					return false;
				});
				
				$('#all').click(function(){
					select_all();
					return false;
				});
				
				$('#s_list').click(function(){return false;});
				$('#n_list').click(function(){return false;});
				
				
				
				tab_on();
			
			})
			
		</script>
		
		<div class="doctor">
			<div class="d_title">
				<span class="left_part">账号医生</span>
				<span class="left_part" id="percent">诊断中</span>
				<div class="slide_button">收起化验单</div>
			</div>
			<div id="d_info">
				<img src="<?=base_url()?>images/common/loading.gif" />
			</div>
			<script type="text/javascript">
				$(document).ready(function(){
					var d_url = "<?= base_url() ?>/user_space/aid/<?=$userreply->uid?>?timestamp=" + new Date().getTime();
					var avatar ="";
					var avatar_ok = "你已上传了头像。";
					var avatar_no = "你未上传头像，建议上传头像以便获得更多人关注。";
					var intro ="";
					var intro_ok= "你已填写个人简介，也可以继续完善它，让他人更好了解你。";
					var intro_no = "你未填写个人简介，向大家介绍下你吧。";
					var skill ="";
					var skill_ok = "你已经添加了技能，也可以继续添加新的技能。";
					var skill_no = "你一个技能也没添加，快向大家展示下自己的才华吧？";
					var friend = "你没有关注任何人，赶快找找感兴趣的人吧。";
				
					
					$.getJSON(d_url,function(data){
						
						var avatar_tmp = "";
						var intro_tmp ="";
						var skills_tmp ="";
						var ask_tmp ="";
						var score_tmp ="";
						var ask_tmp="";
						var friends_tmp ="";
						var n = 0;
						var score = 9;
						var total_score = 12;
						//avatar
						if(data.avatar == 'f'){
							avatar = avatar_no;
							total_score--;
						} else {
							avatar = avatar_ok;
						}
						avatar_tmp = '<li class=\"'+data.avatar+'\">'+avatar+'<span><a href=\"<?=base_url()?>user_info/photo\" >上传头像</a></span></li>';
						//intro
						if(data.intro == 'f'){
							intro = intro_no;
							total_score--;
						} else {
							intro = intro_ok;
						}
						intro_tmp = '<li class=\"'+data.intro+'\">'+intro+'<span><a href=\"<?=base_url()?>user_info\" >修改基本资料</a></span></li>';
						//skills
						if(data.skills == 'f'){
							skill = skill_no;
							total_score--;
						} else {
							skill = skill_ok;
						}
						skills_tmp = '<li class=\"'+data.skills+'\">'+skill+'<span><a href=\"<?=base_url()?>user_info/skills\" >添加技能</a></span></li>';
						//ask9
						for(n=0; n<9; n++){
							if(data.asks[n] == 'f'){
								score--; 
							}
						}
						var last = 9-score;
						if(last==0){
							s = 't';
						} else {
							s = 'f';
						}
						var ask_tmp = '<li class=\"'+s+'\">你回答了九问中的'+score+'个问题,还剩'+last+'个需要回答。<span><a href=\"<?=base_url()?>user_info/nineask\" >完善九问</a></span></li>';
						//friend
						if(data.friends == '0'){
							friends_tmp = '<li class="f">'+friend+'<span><a href=\"<?=base_url()?>space/space_userlist/userlist\" >看看有谁在这</a></span></li>';
						} else {
							friends_tmp ="";
						}
						//tmp
						var w = (total_score-9+score)/12*100;
						score_tmp = '<div class="finish_wrap"><div class="finish_wrap_in" style=\"width:'+ w +'%;\"></div></div>';	
						tmp = score_tmp + '<div class="doctor_info"><ul>' + avatar_tmp + intro_tmp + skills_tmp +ask_tmp+friends_tmp+ '</ul></div>';
						$('#d_info').html(tmp);
					
						$('#percent').text('资料完成度 '+parseInt(w)+'%');	
						
						var tt = false;
						if(w>60){
							tt = true;
						}
						doctor_fade();
						doctor_slide(tt);
						auto_height();
					
					});
				});
				
				
			</script>	
		</div><!--doctor-->
		
		<div class="space_tabs">
			<ul>
				<li class="current_tab" id="tab_msg">互动消息</li>
				<li id="tab_reply">我的留言<?php if($commentNumber>0):?>(<?=$commentNumber?>)<?php endif; ?></li>
			</ul>
			<div class="clear0"></div>
		</div>
		<div id="s_1">
			<?php if($snsnotices == NULL):?>
				<div class="nothing">
					还没任何消息，赶快找找感兴趣的人关注吧<br/>
					<a href="<?=base_url()?>space/space_userlist/userlist">看看都有谁在这</a>
				</div>
			<?php endif;?>
		<ul class="notice_list">
			
			<?php $n=0;foreach($snsnotices as $item):$n++; ?>
				<?php if ($item->type == "eggcomment"):?>		
				<li>
				<div class="notice_box">
					<div class="n_avatar">
						<img class="user_hover" rel="<?=$item->uid?>" src="<?=base_url()?><?=$item->person_pic ?>" /> 
					</div>
					<div class="n_msg">
						<span class="name"><a class="user_hover" rel="<?=$item->uid?>" href="<?=base_url()?>user_space/uid/<?=$item->uid?>"><?=$item->username ?></a>
							<?php if($item->ctype == 1):?>
								<img src="<?=base_url()?>images/c/c_personal_little.gif" />
							<?php elseif($item->ctype == 2):?>
								<img src="<?=base_url()?>images/c/c_team_little.gif" />
							<?php else:?>
								
							<?php endif;?>
							 :</span> 评论了您的创意蛋 <a class="egg_hover" id="<?=$item->snsitemid ?>" href="<?=base_url()?>eggs/topic/<?=$item->snsitemid ?>"><?=$item->itemname ?></a> 赶快去看看吧！
						<blockquote>
							【Ta的评论】：<?=$item->content ?>
						</blockquote>
						<span class="date">
							<?= date('Y/m/d h:m:s',$item->senddate);?>
						</span>
					</div>
					
				</div>
			</li>
			<?php endif;?>
			
			<?php if ($item->type == "projectcomment"):?>		
				<li>
				<div class="notice_box">
					<div class="n_avatar">
						<img class="user_hover" rel="<?=$item->uid?>" src="<?=base_url()?><?=$item->person_pic ?>" /> 
					</div>
					<div class="n_msg">
						<span class="name"><a class="user_hover" rel="<?=$item->uid?>" href="<?=base_url()?>user_space/uid/<?=$item->uid?>"><?=$item->username ?></a> 
							<?php if($item->ctype == 1):?>
								<img src="<?=base_url()?>images/c/c_personal_little.gif" />
							<?php elseif($item->ctype == 2):?>
								<img src="<?=base_url()?>images/c/c_team_little.gif" />
							<?php else:?>
								
							<?php endif;?>
							:</span> 评论了您的项目 <a href="<?=base_url()?>projects/home/<?=$item->snsitemid ?>"><?=$item->itemname ?></a> 赶快去看看吧！
						<blockquote>
							【Ta的评论】：<?=$item->content ?>
						</blockquote>
						<span class="date">
							<?= date('Y/m/d h:m:s',$item->senddate);?>
						</span>
					</div>
					
				</div>
			</li>
			<?php endif;?>
			
			<?php if ($item->type == "spacecomment"):?>		
				<li>
				<div class="notice_box">
					<div class="n_avatar">
						<img class="user_hover" rel="<?=$item->uid?>" src="<?=base_url()?><?=$item->person_pic ?>" /> 
					</div>
					<div class="n_msg">
						<span class="name"><a class="user_hover" rel="<?=$item->uid?>" href="<?=base_url()?>user_space/uid/<?=$item->uid?>"><?=$item->username ?></a> 
							<?php if($item->ctype == 1):?>
								<img src="<?=base_url()?>images/c/c_personal_little.gif" />
							<?php elseif($item->ctype == 2):?>
								<img src="<?=base_url()?>images/c/c_team_little.gif" />
							<?php else:?>
								
							<?php endif;?>
							:</span> 给您留言了。 <a href="<?=base_url()?>space/commentslist">点击此处查看详情！</a> 
						<blockquote>
							【Ta的留言】：<?=$item->content ?>
						</blockquote>
						<span class="date">
							<?= date('Y/m/d h:m:s',$item->senddate);?>
						</span>
					</div>
					
				</div>
			</li>
			<?php endif;?>
			
			<?php if ($item->type == "spacemessage"):?>		
				<li>
				<div class="notice_box">
					<div class="n_avatar">
						<img class="user_hover" rel="<?=$item->uid?>" src="<?=base_url()?><?=$item->person_pic ?>" /> 
					</div>
					<div class="n_msg">
						<span class="name"><a class="user_hover" rel="<?=$item->uid?>" href="<?=base_url()?>user_space/uid/<?=$item->uid?>"><?=$item->username ?></a>
							<?php if($item->ctype == 1):?>
								<img src="<?=base_url()?>images/c/c_personal_little.gif" />
							<?php elseif($item->ctype == 2):?>
								<img src="<?=base_url()?>images/c/c_team_little.gif" />
							<?php else:?>
								
							<?php endif;?>
							:</span> 给您发了一封站内信。 <a href="<?=base_url()?>space/messages/letters">点击此处查看详情！</a> 
						<blockquote>
							【站内信内容】：<?=$item->content ?>
						</blockquote>
						<span class="date">
							<?= date('Y/m/d h:m:s',$item->senddate);?>
						</span>
					</div>
					
				</div>
			</li>
			<?php endif;?>
			
			<?php if ($item->type == "spacereplymessage"):?>		
				<li>
				<div class="notice_box">
					<div class="n_avatar">
						<img class="user_hover" rel="<?=$item->uid?>" src="<?=base_url()?><?=$item->person_pic ?>" /> 
					</div>
					<div class="n_msg">
						<span class="name"><a class="user_hover" rel="<?=$item->uid?>" href="<?=base_url()?>user_space/uid/<?=$item->uid?>"><?=$item->username ?></a> 
							<?php if($item->ctype == 1):?>
								<img src="<?=base_url()?>images/c/c_personal_little.gif" />
							<?php elseif($item->ctype == 2):?>
								<img src="<?=base_url()?>images/c/c_team_little.gif" />
							<?php else:?>
								
							<?php endif;?>
							:</span> 回复了您发送的站内信。 <a href="<?=base_url()?>space/messages/letters">点击此处查看详情！</a> 
						<blockquote>
							【站内信内容】：<?=$item->content ?>
						</blockquote>
						<span class="date">
							<?= date('Y/m/d h:m:s',$item->senddate);?>
						</span>
					</div>
					
				</div>
			</li>
			<?php endif;?>
			
			<?php if ($item->type == "eggreplycomment"):?>		
				<li>
				<div class="notice_box">
					<div class="n_avatar">
						<img class="user_hover" rel="<?=$item->uid?>" src="<?=base_url()?><?=$item->person_pic ?>" /> 
					</div>
					<div class="n_msg">
						<span class="name"><a class="user_hover" rel="<?=$item->uid?>" href="<?=base_url()?>user_space/uid/<?=$item->uid?>"><?=$item->username ?></a> 
							<?php if($item->ctype == 1):?>
								<img src="<?=base_url()?>images/c/c_personal_little.gif" />
							<?php elseif($item->ctype == 2):?>
								<img src="<?=base_url()?>images/c/c_team_little.gif" />
							<?php else:?>
								
							<?php endif;?>
							:</span> 回复了您在创意蛋 <a class="egg_hover" id="<?=$item->snsitemid ?>" href="<?=base_url()?>eggs/topic/<?=$item->snsitemid ?>"><?=$item->itemname ?></a>上的评论。 赶快去看看吧！
						<blockquote>
							【Ta对您说】：<?=$item->content ?>
						</blockquote>
						<span class="date">
							<?= date('Y/m/d h:m:s',$item->senddate);?>
						</span>
					</div>
					
				</div>
			</li>
			<?php endif;?>
			
			<?php if ($item->type == "projectreplycomment"):?>		
				<li>
				<div class="notice_box">
					<div class="n_avatar">
						<img class="user_hover" rel="<?=$item->uid?>" src="<?=base_url()?><?=$item->person_pic ?>" /> 
					</div>
					<div class="n_msg">
						<span class="name"><a class="user_hover" rel="<?=$item->uid?>" href="<?=base_url()?>user_space/uid/<?=$item->uid?>"><?=$item->username ?></a> 
							<?php if($item->ctype == 1):?>
								<img src="<?=base_url()?>images/c/c_personal_little.gif" />
							<?php elseif($item->ctype == 2):?>
								<img src="<?=base_url()?>images/c/c_team_little.gif" />
							<?php else:?>
								
							<?php endif;?>
							:</span> 回复了您在项目 <a href="<?=base_url()?>projects/home/<?=$item->snsitemid ?>"><?=$item->itemname ?></a>上的评论。 赶快去看看吧！
						<blockquote>
							【Ta对您说】：<?=$item->content ?>
						</blockquote>
						<span class="date">
							<?= date('Y/m/d h:m:s',$item->senddate);?>
						</span>
					</div>
					
				</div>
			</li>
			<?php endif;?>
			
			<?php if ($item->type == "spacereplycomment"):?>		
				<li>
				<div class="notice_box">
					<div class="n_avatar">
						<img class="user_hover" rel="<?=$item->uid?>" src="<?=base_url()?><?=$item->person_pic ?>" /> 
					</div>
					<div class="n_msg">
						<span class="name"><a class="user_hover" rel="<?=$item->uid?>" href="<?=base_url()?>user_space/uid/<?=$item->uid?>"><?=$item->username ?></a> 
							<?php if($item->ctype == 1):?>
								<img src="<?=base_url()?>images/c/c_personal_little.gif" />
							<?php elseif($item->ctype == 2):?>
								<img src="<?=base_url()?>images/c/c_team_little.gif" />
							<?php else:?>
								
							<?php endif;?>
							:</span> 回复了您在Ta空间的留言！<a href="<?=base_url()?>user_space/uid/<?=$item->uid?>"> [去<?=$item->username ?>的空间看看]</a>
						<blockquote>
							【Ta对您的留言回复】：<?=$item->content ?>
						</blockquote>
						<span class="date">
							<?= date('Y/m/d h:m:s',$item->senddate);?>
						</span>
					</div>
					
				</div>
			</li>
			<?php endif;?>
			
			<?php if ($item->type == "eggshare"):?>		
				<li>
				<div class="notice_box">
					<div class="n_avatar">
						<img class="user_hover" rel="<?=$item->uid?>" src="<?=base_url()?><?=$item->person_pic ?>" /> 
					</div>
					<div class="n_msg">
						<span class="name"><a class="user_hover" rel="<?=$item->uid?>" href="<?=base_url()?>user_space/uid/<?=$item->uid?>"><?=$item->username ?></a> 
							<?php if($item->ctype == 1):?>
								<img src="<?=base_url()?>images/c/c_personal_little.gif" />
							<?php elseif($item->ctype == 2):?>
								<img src="<?=base_url()?>images/c/c_team_little.gif" />
							<?php else:?>
								
							<?php endif;?>
							:</span> 向你推荐了Ta收藏的创意 <a class="egg_hover" id="<?=$item->snsitemid ?>" href="<?=base_url()?>eggs/topic/<?=$item->snsitemid ?>"><?=$item->itemname ?></a> 赶快去看看吧！
						<blockquote>
							【Ta对你说】：<?=$item->content ?>
						</blockquote>
						<span class="date">
							<?= date('Y/m/d h:m:s',$item->senddate);?>
						</span>
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
		
		<div class="spacecol" id="s_2" style="display:none;padding:0;">
			<a href="space/commentslist">查看全部<?php if($commentNumber>0):?><?=$commentNumber?>条<?php endif; ?>留言</a>
		
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
		
	</div><!--#mid-->
<!--dialog-->

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

//发送消息
$(document).ready(function() {
	$('#send_reply2').click(function() {
		if(!flag_new && $('#msg_getter').val()==""){
			warm_dialog('no', '请选择接受信息的好友');
			return;
		}
		var f = $('#send_reply2');
		if(check_content('message')) {
			$(this).html('<img src="<?=base_url()?>images/common/loading.gif" />');
			//ajax
			var content2  =  $("#reply_content2").attr("value");
			var otheruid  =  $("#msg_getter").attr("value");
			var egg_id = $('#eid').val();
			var egg_name = $('#ename').val();
			var egg_pic = $('#epic').val();
			var pid = $('#pid').val();
			
			if(flag_weixin){
				
				var url = "<?=base_url()?>user_space/addmessage2";
				$.post(url, {
				content2 : content2,
				otheruid : otheruid
				},
				function(data) {
					if(data.state == 'ok') {
						warm_dialog('ok', '短信成功发送！');
						$("#reply_content2").val("");
						f.text('马上发送');
					} else {
						warm_dialog('no', '发送失败，请检查网络后重新发送！');
						
					}
				}, "json");
			}
			
			if(flag_share){
				var url = "<?=base_url()?>user_space/addshare";
				$.post(url, {
				content2 : content2,
				otheruid : otheruid,
				eid : egg_id,
				ename : egg_name,
				epic : egg_pic
				},
				function(data) {
					if(data.state == 'ok') {
						warm_dialog('ok', '分享成功！');
						$("#reply_content2").val("");
						f.text('马上发送');
					} else {
						warm_dialog('no', '分享失败，请检查网络后重新发送！');
						
					}
				}, "json");
			}
			
			if(flag_new){
				var url = "<?=base_url()?>projects/addProjectmessage";
				$.post(url, {
					pid	: pid,
					pmcontent : content2	
				},
				function(data){
					if(data.state == 'ok') {
						warm_dialog('ok', '发布成功！');
						$("#reply_content2").val("");
						f.text('马上发送');
					} else {
						warm_dialog('no', '发布失败，请检查网络后重新发送！');
						
					}	
				}, "json");
			}
	
			$('#reply_content2').removeClass('warm');
			$('#t2_dialog').fadeOut();
		} else {
			$('#reply_content2').addClass('warm');
		}
	});
});
</script>