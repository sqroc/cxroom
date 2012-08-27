<script type="text/javascript">
	var USER_NAME = '<?=$username ?>';
	var USER_ID = '<?=$uid ?>';
</script>
<div id="top_banner">
	this is banner
</div>
<div class="container main_col">
	<div class="left_col">
		<div class="avatar">
			<?php if (isset($person_pic)): ?>
				<img src="<?=base_url()?><?=$person_pic?>" /> 
			<?php else: ?>
				<img src="images/user_head/head_default.gif" /> 
			<?php endif; ?>
			<span><?=$username ?></span>
		</div>
		<?php if($ctype != NULL):?>
		<div class="c">
			<?php if($ctype == 1):?>
				<img src="<?=base_url()?>images/c/c_personal.gif" />
			<?php elseif($ctype == 2):?>
				<img src="<?=base_url()?>images/c/c_team.gif" />
			<?php else:?>
				
			<?php endif;?>
			<?php if($cname != NULL):?>
				<p><?=$cname?></p>
			
			<?php endif;?>
		</div>	
		<?php endif;?>
		<div class="buttons">
			<ul>
				<li class="b1"><a href="javascript:void(0)" id="add_friend">关注我</a></li>
				<li class="b1"><a href="javascript:void(0)" id="send_msg">联系我</a></li>
				<li class="b2"><a href="">我的微博</a></li>
				<li class="b2"><a href="">个人网站</a></li>
				
			</ul>
		</div>
		
	</div>
	<div class="mid_col">
		<div class="short_intro">
			<p>
			<?php if (isset($intro) && $intro!=''): ?><?=$intro ?>
			<?php else: ?>这家伙很懒，什么也没写。<?php endif; ?></p>
		</div>
		<!--ask-->
		
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
		<!--#ask-->
	</div>
	<div class="right_col">
		<div class="tag1 c1">
			<p>
			人气 <?=$clickdata->click?></p>
		</div>
		<div class="tag1 c2">
			<p>
			身价 <?=$mypointall ?></p>
		</div>
		<div class="tag1 <?php if (isset($gender) && $gender !=0): ?>
					c31
				<?php elseif (!isset($gender)): ?>
					c32
				<?php else: ?>
					c3
				<?php endif; ?>">
			<p><?php if (isset($gender) && $gender !=0): ?>
					男
				<?php elseif (!isset($gender)): ?>
					？
				<?php else: ?>
					女
				<?php endif; ?>
				23岁
				</p>
		</div>
		<div class="tag1 c4">
			<p><?php if (isset($province) && $province!='---请选择---'): ?><?=$province ?><?php else:?>
					来自未知星球
			<?php endif; ?></p>
		</div>
		<div class="tag2 c5">
			<ul class="l1">
				
				<li>在校生</li>
				<li>浙江工业大学-信息学院</li>
			</ul>
			
		</div>
		<div class="tag2 c6">
			<ul class="l1">
				<li>有项目找人才</li>
				<li>有才能 找工作</li>
				
			</ul>
		</div>
		<div class="tag2 c7">
			<ul class="l2">
					
					<?php if(isset($contact_email) && $contact_email!=""): ?>
					<li>
					邮箱:<?=$contact_email ?>
					</li>
					<?php endif ?>
					
					
					
					<?php if(isset($telphone) && $telphone!= ""): ?>
					<li>
					手机:
					<?=$telphone ?>
					</li>
					<?php endif ?>
					
					
					<?php if(isset($phone) && $phone!=""): ?>
					<li>
					座机:
					<?=$phone ?>
					</li>
					<?php endif ?>
					
					
					<?php if(isset($qq) && $qq!=""): ?>
					<li>
					Q Q:
					<?=$qq ?>
					</li>
					<?php endif;?>
					
			</ul>
		</div>
		
		<?php if($myskills != NULL):?>
			<?php $n=0;foreach($myskills as $item): ?>
				<div class="tag1 c8">
					<p><?=$item->skillname?></p>
				</div>
			<?php $n++;endforeach; ?>
		<?php endif; ?>
		
	</div>
</div>

<script type="text/javascript">
var tmp_msg = '<input type="hidden" name="uid" id="reply_uid2" value="<?=$uid ?>"/><textarea style="width:370px;height:100px;"  name="comment_content" id="reply_content2"></textarea>';
//发送消息

function send_msg_func() {

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
}



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
	
