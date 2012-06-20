<div class="header_shadow"></div>
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
				<li id="tab_news" class="tab <?php if($projectmessage != NULL){echo 'current';}else{echo 'normal';} ?>">动态</li>
				<li id="tab_intro" class="tab <?php if($projectmessage == NULL){echo 'current';}else{echo 'normal';} ?>">简介</li>
				<?php if(!empty($project->talentcontent)): ?>
				<li id="tab_talent" class="tab normal"><?=$project->talenttitle?></li>
				<? endif;?>
				<?php if(!empty($project->investcontent)): ?>
				<li id="tab_invest" class="tab normal">募资</li>
				<?php endif;?>
				<li class="normal"><a href="<?=base_url()?>projects/project_comments/<?= $project->pid?>">评论</a></li>
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
		<script type="text/javascript">
			$(document).ready(function(){
				send_reply();
			});
			
			function send_reply(){
				$('.sendpm').click(function(){
					
					//ajax
					var pmrecontent  =  add_br( $("#reply_content").attr("value") );
					
					var promid  = $(this).attr('id');
					var url = "<?=base_url()?>projects/addProjectmessage_reply";
					$.post(url, {
					pmrecontent : pmrecontent,
					promid : promid
					},
					function(data) {
						if(data.state == 'ok') {
							warm_dialog('ok', '评论成功!');
						} else {
							warm_dialog('no', "回复评论失败，请检查网络后重试！");
						}
					}, "json");
				});
			}
		</script>	
		<div class="box_tab" id="box_tab_news" style="display:<?php if($projectmessage == NULL){echo 'none';}else{echo 'block';} ?>;">
			
			<ul class="newslist">
				<?php foreach($projectmessage as $item): ?>
				<li id="<?=$item->promid?>">
					<div class="author_pic">
						<img src="<?=base_url()?><?=$item->person_pic?>" />
					</div>
					<div class="msg_box">
						<div class="new">
							<span class="name"><a href="<?= base_url() ?>/user_space/uid/<?=$item->uid?>"><?=$item->username?></a> : </span>
							<?=$item->pmcontent?>
					
						</div>
						<div class="new_info">
							<span class="date"><? $nowtime = time();echo ceil(($nowtime-$item->pmdate)/(60*60*24));?>天前</span>
							<span class="reply write_reply" id="<?=$item->promid?>"><a href="javascript:void(0)">评论(<?=$item->replynum?>)</a></span>
							
						</div>
					
					</div>
				</li>
				<?php endforeach; ?>			
			</ul>
			<div class="pages">
					<?php echo $this->pagination->create_links();?>
			</div>
		</div>
		<div class="box_tab content" id="box_tab_intro" style="display:<?php if($projectmessage == NULL){echo 'block';}else{echo 'none';} ?>;">
			<?= $project->pintro?>
		</div>
		<div class="box_tab content" id="box_tab_talent" style="display:none">
			<?= $project->talentcontent?>
		</div>
		<div class="box_tab content" id="box_tab_invest" style="display:none">
			<?= $project->investcontent?>
		</div>
		
		
	</div>
	<div class="right_box">
		<!--
		<div class="inte no">
			点亮的为专访项目
		</div>-->
		<div class="clap">
			<ul>
				<li><span class="num"><?= $days?></span>天数</li>
				<li class="p20"><span class="num" id="cheer_counter"><?= $project->applaudnumber?></span>掌声</li>
				<li class="p20"><span class="num" id="like_counter"><?= $project->attentionnumber?></span>收藏</li>
				<!--<li><span class="num">12</span>人加入</li>-->
			</ul>
		</div>
		<!--
		<div class="line">		
			<div class="p_line">
				<div class="inside time1" style="width:50%;"></div>
			</div>			
		</div>
		
		<div class="invest_info">
			支持累计￥500 (50%)<br />
			剩余30天
		</div>
		<div class="invest_box">
			<div class="inv_title">支持￥200</div>
			<div class="inv_sup">剩余20个名额</div>
			<div class="inv_content">入片尾感谢名单并且可以获得视频加密下载链接。（请留下您的邮件地址）</div>
			<div class="inv_button">支持￥20</div>
		</div>
		<div class="invest_box">
			<div class="inv_title">支持￥200</div>
			<div class="inv_sup">剩余20个名额</div>
			<div class="inv_content">支持回馈内容</div>
			<div class="inv_button">支持￥4238</div>
		</div>
		-->
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

