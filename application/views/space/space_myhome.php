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
		</div>
		
		<div class="short_intro">
			<div class="j"></div>
			<?php if (isset($intro)): ?><?=$intro ?>
			<?php else: ?>这家伙很懒，什么也没写。<?php endif; ?>
		</div>
		
		<div class="space_tabs">
			<ul>
				<li class="current_tab" id="tab_msg">全部消息</li>
				<li id="tab_reply">我的留言<?php if($commentNumber>0):?>(<?=$commentNumber?>)<?php endif; ?></li>
				<li><a href="">好友消息</a></li>
				<li><a href="">系统消息</a></li>
			</ul>
		</div>
		<div id="s_1">
		<ul class="notice_list">
			<li>
				<div class="notice_box">
					<div class="n_avatar">
						<img src="http://www.cxroom.com/uploads/tpic/1018964ea5e6b07db04ab32951ae6317.jpg" /> 
					</div>
					<div class="n_msg">
						<span class="name"><a href="">GOOC</a> <img src="<?=base_url()?>images/common/c.gif"/> :</span> 发布了新的创意蛋 <a href="">拨起才能用的插头底座</a> 赶快去看看吧！
						<blockquote>
							这个很诡异的设计思路让小侦探都汗颜啊，没有爱折腾的产品，只有爱折腾的设计师，一起来看看这个让插头各种拧巴的设计吧。
						</blockquote>
					</div>
				</div>
			</li>
			
			<li>
				<div class="notice_box">
					<div class="n_avatar">
						<img src="http://www.cxroom.com/uploads/tpic/1018964ea5e6b07db04ab32951ae6317.jpg" /> 
					</div>
					<div class="n_msg">
						<span class="name"><a href="">GOOC</a> :</span> 回复了创意蛋 <a href="">移动设备绿色充电</a> 赶快去看看吧！
						<blockquote>
							想起小时候最喜欢捣鼓的发条手表和发条钟表，现在人们习惯了电子设备，忘记了更绿色的设计。也主要是因为电子设备制作成本很小，可惜忘记了电子设备处理时候的成本很大！
						</blockquote>
					</div>
				</div>
			</li>
			
			<li>
				<div class="notice_box">
					<div class="n_avatar">
						<img src="http://www.cxroom.com/uploads/tpic/6eaf0e1834cb0760e046066538cffacc.jpg" /> 
					</div>
					<div class="n_msg">
						<span class="name"><a href="">系统广播</a> <img src="<?=base_url()?>images/common/c.gif"/> :</span> 创新学院资讯推荐！
						<ul>
							<li><a href="">关于《杜绝“给差评遭报复”的完美方案》的阐述</a></li>
							<li><a href="">杜绝“给差评遭报复”的完美方案</a></li>
						</ul>
					</div>
				</div>
			</li>
		</ul>
		<div class="pages"> 
			<ul>
				<li class="current_page">1</li>
				<li><a href="http://localhost/ci/space/commentslist/5">2</a></li>
				<li><a href="http://localhost/ci/space/commentslist/10">3</a></li>
				<li><a href="http://localhost/ci/space/commentslist/5">下一页</a></li>
			</ul>		
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