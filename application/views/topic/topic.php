<div class="header_shadow"></div>
<div class="container" id="dragwidth">
	<div id="dragleft">
		<div class="t_title">
			<h2><?=$idea->ideaname?></h2>
			<ul>
				<li class="grey_button" id="up">顶(<span><?=$idea->supportnumber?></span>)</li>
				<li class="grey_button" id="down">踩(<span><?=$idea->criticizenumber?></span>)</li>
				<li class="grey_button" id="like">收藏(<span><?=$idea->iattentionnumber?></span>)</li>
			</ul>
			<script type="text/javascript">
				$(document).ready(function(){
					$('#up').click(function(){
						var t = $(this);
						var c = t.find('span').text();
						c = parseInt(c)+1;
						alertbox('sending', '正在提交请求', 'keep');
						var url = "<?=base_url()?>eggs/updatesupport";
						$.post(url, {
							ideaid : <?=$idea->ideaid?>,
							typeid : 1
							}, function(data) {
								if(data.state == 'ok'){
									alertbox('ok', '支持成功！', 'flash');
									t.children('span').text(c);
								}else{
									alertbox('wrong', '您已经支持或踩过了', 'flash');
								}
						}, "json");
					});
					
					$('#down').click(function(){
						var t = $(this);
						var c = t.find('span').text();
						c = parseInt(c)+1;
						alertbox('sending', '正在提交请求', 'keep');
						var url = "<?=base_url()?>eggs/updatesupport";
						$.post(url, {
							ideaid : <?=$idea->ideaid?>,
							typeid : 2
							}, function(data) {
								if(data.state == 'ok'){
									alertbox('ok', '操作成功！', 'flash');
									t.children('span').text(c);
								}else{
									alertbox('wrong', '您已经支持或踩过了', 'flash');
								}
						}, "json");
					});
					
					$('#like').click(function(){
						var t = $(this);
						var c = t.find('span').text();
						c = parseInt(c)+1;
						alertbox('sending', '正在提交请求', 'keep');
						var url = "<?=base_url()?>eggs/updatesupport";
						$.post(url, {
							ideaid : <?=$idea->ideaid?>,
							typeid : 6
							}, function(data) {
								if(data.state == 'ok'){
									alertbox('ok', '收藏成功！', 'flash');
									t.children('span').text(c);
								}else{
									alertbox('wrong', '您已经收藏过了', 'flash');
								}
						}, "json");
					});
				});
			</script>
			<div class="counter">
				<span>3224</span>
				
			</div>
		</div><!--title-->
		<script type="text/javascript">
			$(document).ready(function(){
				init_tabs({
					'tab1' : function(){
						alertbox('sending', '正在加载全部', 'flash');
					},
					'tab2' : function(){
						alertbox('sending', '正在加载观点', 'flash');
					},
					'tab3' : function(){
						alertbox('sending', '正在加载酱油', 'flash');
					}
				});
			})
		</script>
		<div id="tabs">
			<ul>
				<li class="current" id="tab1">全 部</li>
				<li id="tab2">观 点</li>
				<li id="tab3">酱 油</li>
			</ul>
		</div>
		<div class="col_tab" id="col_tab1">
			<ul id="comments">
				<?php foreach($comment1 as $item): ?>
				<li>
					<div class="op op1" id="c_<?=$item->icommentid?>" rel="<?=$item->icommentid?>">
						<div class="avatar">
							<a href="<?= base_url() ?>/user_space/uid/<?=$item->uid?>">
								<img src="<?=base_url()?><?=$item->person_pic?>" />
							</a>
						</div>
						<span class="name"><a href="<?= base_url() ?>/user_space/uid/<?=$item->uid?>"><?=$item->username?></a></span>
						<span class="date"><? $nowtime = time();echo ceil(($nowtime-$item->comment_date)/(60*60*24));?>天前</span>
						<span class="reply"><a href="javascript:void(0)" class="reply_button">回复</a></span><br/>
						<p>
							<!--
							<blockquote>@tgoooo today is a fine day....</blockquote>-->
							<?=$item->comment_content?></p>
					</div>
					<!--reply-->
					<?php foreach($commentReply1 as $itemReply): ?>
						<?php if($item->icommentid == $itemReply->comment_parent):?>
						<div class="op op2" id="c_<?=$item->icommentid?>" rel="<?=$item->icommentid?>">
							
							<span class="name"><a href="<?= base_url() ?>/user_space/uid/<?=$itemReply->uid?>"><?=$itemReply->username?></a></span>
							<span class="date"><? $nowtime = time();echo ceil(($nowtime-$itemReply->comment_date)/(60*60*24));?>天前</span>
							<span class="reply"><a href="javascript:void(0)" class="reply_button">回复</a></span><br/>
							<p><?=$itemReply->comment_content?></p>
						</div>
						<?php endif; ?>
					<?php endforeach; ?>
					
				</li>
				
				<?php endforeach; ?>
			</ul>
			<div class="grey_button" id="more_op">查看更多</div>
		</div>
		<div class="col_tab" id="col_tab2" style="display:none;">
			tab2
		</div>
		<div class="col_tab" id="col_tab3" style="display:none;">
			tab3
		</div>
	</div>
	<div id="dragright">
		
		
		<div class="t_content">
			<div class="arrow"> </div>
			<?=$idea->ideacontent?>
		</div>
		<div id="comment">
			<div id="comment_warm" style="display:none;">
				信息提示。
			</div>
			<textarea name="comment_content" style="width:100%;height:80px;padding:5px 0;"></textarea>
			<div id="comment_dock">
				<ul class="addition">
					<li><input type="checkbox" id="likeit" />同时收藏该话题</li>
				</ul>
				<div class="blue_button fr" id="comment_send">发 表</div>
			</div>
			<script type="text/javascript">
				$(document).ready(function(){
					init_comment(function(){
						var content = $('textarea[name="comment_content"]').val();
						alertbox('sending', '正在提交', 'keep');
						
						//alertbox('ok', '提交成功！', 'flash');
						add_comment('0', 'comment', content);
						
						if($('#likeit').attr('checked')){
							var t = $('#like');
							var c = t.find('span').text();
							c = parseInt(c)+1;
							
							var url = "<?=base_url()?>eggs/updatesupport";
							$.post(url, {
								ideaid : <?=$idea->ideaid?>,
								typeid : 6
								}, function(data) {
									if(data.state == 'ok'){
										t.children('span').text(c);
									}else{
										
									}
							}, "json");
						}
					});
				});
			</script>
		</div>
		<div class="col_title">
			<h2>精彩推荐</h2><span><a href="">推荐</a></span><span><a href="">更多</a></span>
		</div>
		<div class="goods">
			<ul>
				<li>
					<h3><a href="">小米模式为什么能获得成功？</a><span>334234</span></h3>
					<p>小米手机是小米公司全球首发4核2.8纳米技术低功耗高性能发烧级智能手机。小米手机2订购价格1999元，小米手机1s官网售价1499元</p>
				</li>
				<li>
					<h3><a href="">小米模式为什么能获得成功？</a><span>334234</span></h3>
					<p>小米手机是小米公司全球首发4核2.8纳米技术低功耗高性能发烧级智能手机。小米手机2订购价格1999元，小米手机1s官网售价1499元</p>
				</li>
			</ul>
		</div>
		
	</div>
</div>
<!--reply data-->
<div id="reply_data" style="display:none;">
	<input type="hidden" value=""  name="comment_id" />
	<input type="hidden" name="uid" id="reply_uid" value=""/>
	<input type="hidden" name="replyspace" id="reply_replyspace" value=""/>
	<input type="hidden" name="username" id="u_name" value="" />
	<input type="hidden" name="userurl" id="u_url" value="" />
</div>
<script type="text/javascript">
//AJAX提交回复评论，在topic.js :reply_dialog()中被调用
var USER_NAME = '<?=$username ?>';
var USER_URL = '<?=base_url() ?>user_space';
var USER_PHOTO = '<img src=\"'+ '<?=base_url()?><?=$person_pic?>' +'\" />';

function send_reply(){
	alertbox('sending', '正在发送数据.', 'keep');
	var comment_content  =  $("#reply_content").val();
	var comment_id  =  $("input[name='comment_id']").val();
	alert('你按了提交按钮，执行提交');
	//alertbox('ok', '回复评论提交成功！', 'flash');
	add_comment(comment_id, 'reply', comment_content);
	
	//alertbox('wrong', '操作失败，请检查网络！', 'flash');
}
</script>