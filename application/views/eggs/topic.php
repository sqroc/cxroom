<div class="clear"></div>
<div class="con_shadow">
<div class="topic_box">
	<div class="author fl">
		<div class="avatar">
			<img src="<?=base_url()?><?=$idea->person_pic?>" />  <br>
			<span class="name"><a href="<?=base_url()?>user_space/uid/<?=$idea->uid?>" target="_blank" title="<?=$idea->username?>的空间"><?=$idea->username?></a></span>
		</div>
		<div class="support" id="join">
				愿意加盟<span><?=$idea->ijoinnumber?></span>
		</div>
		<div class="support" id="pay">
				愿意出资<span><?=$idea->icontributenumber?></span>
		</div>
		<div class="support" id="like">
				收藏关注<span><?=$idea->iattentionnumber?></span>
		</div>
		
	</div>

	<div class="content_box fr">
		<div class="jt"></div>
		<div class="content">
			<!-- Baidu Button BEGIN -->
    <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
        <span class="bds_more">分享到：</span>
        <a class="bds_qzone"></a>
        <a class="bds_tsina"></a>
        <a class="bds_tqq"></a>
        <a class="bds_renren"></a>
		<a class="shareCount"></a>
    </div>
<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=692572" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
	document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
</script>
<!-- Baidu Button END -->
			<h2><?=$idea->ideaname?></h2>
			
			<p><?=$idea->ideacontent?></p>
			
			<!--未登录时显示内容
			<p>
				摘要内容
			</p>
			<p class="summary">	
			 当前仅显示摘要内容，如果想查看完整内容请 <a href="<?=base_url()?>login" title="登录创新空间">马上登录</a> &nbsp; &nbsp; &nbsp;还没有账号？<a href="<?=base_url()?>register" title="注册创新空间账号">马上注册</a><br/>
			</p>
			-->
		</div>
		<div class="list">
			<ul class="person" id="j">
				<li>有意向加入：</li>
				<?php foreach($ideajoin as $item): ?>
				<li><a href="<?=base_url()?>user_space/uid/<?=$item->uid?>" title="<?=$item->username?>的空间"><?=$item->username?></a></li>
				<?php endforeach; ?>
			</ul>
			<ul class="person" id="p">
				<li>有意向出资：</li>
					<?php foreach($ideacontribute as $item): ?>
				<li><a href="<?=base_url()?>user_space/uid/<?=$item->uid?>" title="<?=$item->username?>的空间"><?=$item->username?></a></li>
				<?php endforeach; ?>
			</ul>
			<ul class="person" id="s">
				<li>收藏关注：</li>
					<?php foreach($ideaattention as $item): ?>
				<li><a href="<?=base_url()?>user_space/uid/<?=$item->uid?>" title="<?=$item->username?>的空间"><?=$item->username?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="rainbow">
			<?php if($idea->supportnumber!=0): ?>
			<div class="bow ca" style="width:<?=($idea->supportnumber)/$totalsupport*100?>%">支持<?=($idea->supportnumber)/$totalsupport*100?>%</div>
			<?php endif;if($idea->criticizenumber!=0): ?>
			<div class="bow cd" style="width:<?=($idea->criticizenumber)/$totalsupport*100?>%">批判<?=($idea->criticizenumber)/$totalsupport*100?>%</div>
			<?php endif;if($idea->neutralnumber!=0): ?>
			<div class="bow cp" style="width:<?=($idea->neutralnumber)/$totalsupport*100?>%">中立<?=($idea->neutralnumber)/$totalsupport*100?>%</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="clear0"></div>
</div><!--#topic_box-->
</div>
<!--comments-->
<div class="container2 t20" style="padding-bottom:20px;">
	<div class="group_box active fl">
	 	<div class="group_name">
			<h3 class="name c1 name1"> </h3>
			
			<span class="gitem support_a sitem">支持(<span><?=$idea->supportnumber?></span>)</span>
			<div class="clear0"></div>
		</div>
		<div class="leave_reply">
			
			<div class="lcontent">
				<textarea name="comment_content" rows="6"></textarea> <br>
				<input type="hidden" name="uid" id="comment_uid" value=""/>
				<input type="hidden" name="pid" id="comment_pid" value=""/>
			</div>
			<div class="c_bottom">
				<div class="tag">
					支持该创意，创新改变世界！
				</div>
				<input type="button" value="发表评论" class="small_button submit send_comment" id="l_a"/>
			</div>
			
			<div class="clear0"></div>
		</div>
		<div class="list_box">
			<ul class="dis" id="comment_a">
				<?php foreach($comment1 as $item): ?>
				<li>
					
					<div class="dis_box">
						<div class="avatar">
							<img src="<?=base_url()?><?=$item->person_pic?>" /> 
						</div>
						<div class="reply w600">
							<span><a href="<?= base_url() ?>/user_space/uid/<?=$item->uid?>"><?=$item->username?></a></span><span class="date"><? $nowtime = time();echo ceil(($nowtime-$item->comment_date)/(60*60*24));?>天前</span><span class="reply_button" id="<?=$item->icommentid?>_<?=$item->supporttype?>">回复</span><br>
								<p><?=$item->comment_content?></p>
						</div>
					</div>
					<div class="clear10_comment"></div>
						<!--回复开始--><?php foreach($commentReply1 as $itemReply): ?>
							<?php if($item->icommentid == $itemReply->comment_parent):?>
						<div class="dis_box dis_reply">	
							<div class="avatar2">
								<img src="<?=base_url()?><?=$itemReply->person_pic?>" />
							</div>
							<div class="reply w540">
								<span><a href="<?= base_url() ?>/user_space/uid/<?=$itemReply->uid?>"><?=$itemReply->username?></a></span><span class="date"><? $nowtime = time();echo ceil(($nowtime-$itemReply->comment_date)/(60*60*24));?>天前</span><span class="reply_button" id="<?=$item->icommentid?>_<?=$item->supporttype?>_<?=$itemReply->uid?>">回复</span><br>
									<p><?=$itemReply->comment_content?></p>
							</div>
							<div class="clear_comment"></div>
						</div>	<?php endif; ?>
							<?php endforeach; ?>
						<!--回复结束-->
					
						<div class="clear_comment"></div>
				</li>		
				
			<?php endforeach; ?>
			</ul>
		</div>
	</div>
	
	<div class="group_box disagree fl ml22">
	 	<div class="group_name">
			<h3 class="name c2 name2"> </h3>
		
			<span class="gitem support_d sitem">支持(<span><?=$idea->criticizenumber?></span>)</span>
			<div class="clear0"></div>
		</div>
		
		<div class="leave_reply">
			
			<div class="lcontent">
				<textarea name="comment_content" rows="6"></textarea> <br>
				<input type="hidden" name="uid" id="comment_uid" value=""/>
				<input type="hidden" name="pid" id="comment_pid" value=""/>
			</div>
			<div class="c_bottom">
				<div class="tag">
					吐槽该创意，批判成就创新！
				</div>
				<input type="button" value="发表评论" class="small_button submit send_comment" id="l_d"/>
			</div>
			
			<div class="clear0"></div>
		</div>
		<div class="listbox">
			<ul class="dis" id="comment_d">
				
			<?php foreach($comment2 as $item): ?>
				<li>
					
					<div class="dis_box">
						<div class="avatar">
							<img src="<?=base_url()?><?=$item->person_pic?>" /> 
						</div>
						<div class="reply w600">
							<span><a href="<?= base_url() ?>/user_space/uid/<?=$item->uid?>"><?=$item->username?></a></span><span class="date"><? $nowtime = time();echo ceil(($nowtime-$item->comment_date)/(60*60*24));?>天前</span><span class="reply_button" id="<?=$item->icommentid?>_<?=$item->supporttype?>">回复</span><br>
								<p><?=$item->comment_content?></p>
						</div>
					</div>
					<div class="clear10_comment"></div>
					<!--回复开始--><?php foreach($commentReply2 as $itemReply): ?>
							<?php if($item->icommentid == $itemReply->comment_parent):?>
						<div class="dis_box dis_reply">	
							<div class="avatar2">
								<img src="<?=base_url()?><?=$itemReply->person_pic?>" />
							</div>
							<div class="reply w540">
								<span><a href="<?= base_url() ?>/user_space/uid/<?=$itemReply->uid?>"><?=$itemReply->username?></a></span><span class="date"><? $nowtime = time();echo ceil(($nowtime-$itemReply->comment_date)/(60*60*24));?>天前</span><span class="reply_button" id="<?=$item->icommentid?>_<?=$item->supporttype?>_<?=$itemReply->uid?>">回复</span><br>
									<p><?=$itemReply->comment_content?></p>
							</div>
							<div class="clear_comment"></div>
						</div>	<?php endif; ?>
							<?php endforeach; ?>
						<!--回复结束-->
					
						<div class="clear_comment"></div>
				</li>		
				
			<?php endforeach; ?>
			</ul>
		</div>
	</div>
	
	<div class="group_box passby fr">
	 	<div class="group_name">
			<h3 class="name c3 name3"> </h3>
		
			<span class="gitem support_p sitem">支持(<span><?=$idea->neutralnumber?></span>)</span>
			<div class="clear0"></div>
		</div>
		<div class="leave_reply">
			
			<div class="lcontent">
				<textarea name="comment_content" rows="6"></textarea> <br>
				<input type="hidden" name="uid" id="comment_uid" value=""/>
				<input type="hidden" name="pid" id="comment_pid" value=""/>
			</div>
			<div class="c_bottom">
				<div class="tag">
					纯路过，打个酱油支持！
				</div>
				<input type="button" value="发表评论" class="small_button submit send_comment" id="l_p"/>
			</div>
			
			<div class="clear0"></div>
		</div>
		<div class="listbox">
			<ul class="dis" id="comment_p">
				
				<?php foreach($comment3 as $item): ?>
				<li>
					
					<div class="dis_box">
						<div class="avatar">
							<img src="<?=base_url()?><?=$item->person_pic?>" /> 
						</div>
						<div class="reply w600">
							<span><a href="<?= base_url() ?>/user_space/uid/<?=$item->uid?>"><?=$item->username?></a></span><span class="date"><? $nowtime = time();echo ceil(($nowtime-$item->comment_date)/(60*60*24));?>天前</span><span class="reply_button" id="<?=$item->icommentid?>_<?=$item->supporttype?>">回复</span><br>
								<p><?=$item->comment_content?></p>
						</div>
					</div>
					<div class="clear10_comment"></div>
						<!--回复开始--><?php foreach($commentReply3 as $itemReply): ?>
							<?php if($item->icommentid == $itemReply->comment_parent):?>
						<div class="dis_box dis_reply">	
							<div class="avatar2">
								<img src="<?=base_url()?><?=$itemReply->person_pic?>" />
							</div>
							<div class="reply w540">
								<span><a href="<?= base_url() ?>/user_space/uid/<?=$itemReply->uid?>"><?=$itemReply->username?></a></span><span class="date"><? $nowtime = time();echo ceil(($nowtime-$itemReply->comment_date)/(60*60*24));?>天前</span><span class="reply_button" id="<?=$item->icommentid?>_<?=$item->supporttype?>_<?=$itemReply->uid?>">回复</span><br>
									<p><?=$itemReply->comment_content?></p>
							</div>
							<div class="clear_comment"></div>
						</div>	<?php endif; ?>
							<?php endforeach; ?>
						<!--回复结束-->
					
						<div class="clear_comment"></div>
				</li>		
				
			<?php endforeach; ?>
			</ul>
		</div>
	</div>
</div>

<div id="t_dialog" style="display:none;">
	<div class="box">
		<div class="box_top">
			<span class="replyto">回复框</span>
			<span id="close_dialog" class="close_dialog"></span>
		</div>
		<form action="<?=base_url()?>user_space/replycomment" method="post">
	
			<input type="hidden" value="" id="reply_comment_id" name="comment_id" />
			<input type="hidden" name="uid" id="reply_uid" value=""/>
			<input type="hidden" name="replyspace" id="reply_replyspace" value=""/>
			
			<div class="item_box">
				<textarea rows="6"  name="comment_content" id="reply_content"></textarea>
			</div>
			
			<div class="item_box">
				<input type="button" class="small_button" id="send_reply" value="提交内容" />
			</div>
			
		</form>
		<div class="clear0"></div>
	</div>
</div>


<script type="text/javascript">

//发送回复
$(document).ready(function() {
	$('#send_reply').click(function() {
		var comment_content  =  add_br( $("#reply_content").attr("value") );
		if(check_content(comment_content)) {
			$(this).val('正在发送');
			var uid  =  $("#reply_uid").attr("value");
			var comment_id  =  $("#reply_comment_id").attr("value");
			var arr = (comment_id+'').split('_');
			var icommentideaid  =  <?=$idea->ideaid?>;
			if(arr.length>=3){
				var url = "<?=base_url()?>eggs/addreply2";
			}else{
			
			var url = "<?=base_url()?>eggs/addreply";
			//arr[2] = '';
				
			}
			
			$.post(url, {
			comment_content : comment_content,
			icommentideaid : icommentideaid,
			supporttype : arr[1],
			comment_id : arr[0],
			comforuid : arr[2]
			},
			function(data) {
				if(data.state == 'ok') {
					warm_dialog('ok', '回复评论成功！ 【活跃度 +1】');
					$('#t_dialog').fadeOut();
					add_comment('', 'reply', comment_content);
					$('#send_reply').val('提交回复');
				} else {
					warm_dialog('no', '回复评论失败！');
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
	$('.send_comment').click(function() {
		var comment_content  =  $(this).parent().parent().children('.lcontent').children('textarea[name="comment_content"]').attr("value");
		comment_content = add_br(comment_content);
		if(check_content(comment_content)) {
			$(this).val('正在发送');
			var g;
			var group = $(this).attr('id');
			switch(group){
				case 'l_a':g = 'comment_a';break;
				case 'l_d':g = 'comment_d';break;
				case 'l_p':g = 'comment_p';break;
			}
			
			var icommentideaid  =  <?=$idea->ideaid?>;
			var supporttype = 1;
			if(group == 'l_a'){
				supporttype = 1;
			}
			if(group == 'l_d'){
				supporttype = 2;
			}
			if(group == 'l_p'){
				supporttype = 3;
			}
			var url = "<?=base_url()?>eggs/addcomment";
			$.post(url, {
			comment_content : comment_content,
			icommentideaid : icommentideaid,
			supporttype : supporttype
			},
			function(data) {
				if(data.state == 'ok') {
					warm_dialog('ok', '评论成功！【活跃度 +2】');
					add_comment(g, 'comment', comment_content);
					$('.send_comment').val('发表评论');
				} else {
					warm_dialog('no', '评论失败！');
					$('.send_comment').val('发表评论');
				}
			}, "json");
			
		} else {
			$(this).parent().parent().children('.lcontent').children('textarea[name="comment_content"]').addClass('warm');
		}
	});
});

//support
$(document).ready(function(){
	$('.support_a').click(function(){
		
		var c = $(this).children('span').html();
		c = parseInt(c)+1;
		
		var url = "<?=base_url()?>eggs/updatesupport";
		$.post(url, {
				ideaid : <?=$idea->ideaid?>,
				typeid : 1
				}, function(data) {
				if(data.state == 'ok'){
					warm_dialog('ok', '支持成功！');
					$(this).children('span').html(c);
				}else{
					warm_dialog('no', '已经支持过该创意！');
				}
		}, "json");
		
	});
	$('.support_d').click(function(){
		var c = $(this).children('span').html();
		c = parseInt(c)+1;
		
		var url = "<?=base_url()?>eggs/updatesupport";
		$.post(url, {
				ideaid : <?=$idea->ideaid?>,
				typeid : 2
				}, function(data) {
				if(data.state == 'ok'){
					warm_dialog('ok', '支持成功！');
					$(this).children('span').html(c);
				}else{
				warm_dialog('no', '已经支持过该创意！');
				}
		}, "json");
	});
	$('.support_p').click(function(){
		var c = $(this).children('span').html();
		c = parseInt(c)+1;
		
		var url = "<?=base_url()?>eggs/updatesupport";
		$.post(url, {
				ideaid : <?=$idea->ideaid?>,
				typeid : 3
				}, function(data) {
				if(data.state == 'ok'){
					warm_dialog('ok', '支持成功！');
					$(this).children('span').html(c);
				}else{
				warm_dialog('no', '已经支持过该创意！');
				}
		}, "json");
	});
});

$(document).ready(function(){
	$('#join').click(function(){
		var c = $(this).children('span').html();
		var c = parseInt(c) + 1;
		
		
		var url = "<?=base_url()?>eggs/updatesupport";
		$.post(url, {
				ideaid : <?=$idea->ideaid?>,
				typeid : 4
				}, function(data) {
				if(data.state == 'ok'){
					$('#j').append('<li><a href="'+USER_URL+'">'+USER_NAME+'</a></li>');
					warm_dialog('ok', '加盟成功！');
					$('#join').children('span').html(c);
				}else{
				warm_dialog('no', '已经加盟过该创意！');
				}
		}, "json");
		
	});
});

$(document).ready(function(){
	$('#pay').click(function(){
		var c = $(this).children('span').html();
		var c = parseInt(c) + 1;
		
		var url = "<?=base_url()?>eggs/updatesupport";
		$.post(url, {
				ideaid : <?=$idea->ideaid?>,
				typeid : 5
				}, function(data) {
				if(data.state == 'ok'){
					$('#p').append('<li><a href="'+USER_URL+'">'+USER_NAME+'</a></li>');
					warm_dialog('ok', '成功加入出资的名单！');
					$('#pay').children('span').html(c);
				}else{
				warm_dialog('no', '已经加入！');
				}
		}, "json");
	});
});

$(document).ready(function(){
	$('#like').click(function(){
		var c = $(this).children('span').html();
		var c = parseInt(c) + 1;
		
		var url = "<?=base_url()?>eggs/updatesupport";
		$.post(url, {
				ideaid : <?=$idea->ideaid?>,
				typeid : 6
				}, function(data) {
				if(data.state == 'ok'){
					$('#s').append('<li><a href="'+USER_URL+'">'+USER_NAME+'</a></li>');
					warm_dialog('ok', '收藏成功！');
					$('#like').children('span').html(c);
				}else{
				warm_dialog('no', '已经收藏过该创意！');
				}
		}, "json");
	});
});
</script>
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fb6d68dba0015ee3ea4ac4c65196a6cd1' type='text/javascript'%3E%3C/script%3E"));
</script>
</body>
</html>