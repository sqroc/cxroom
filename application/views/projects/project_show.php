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
				<li id="tab_news" class="tab normal">动态</li>
				<li id="tab_intro" class="tab current">简介</li>
				<?php if(!empty($project->talentcontent)): ?>
				<li id="tab_talent" class="tab normal">招募</li>
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
				$('#sendreply').click(function(){
					alert('sending');
					//ajax part
				});
			}
		</script>	
		<div class="box_tab" id="box_tab_news" style="display:none;">
			
			<ul class="newslist">
				<?php foreach($projectmessage as $item): ?>
				<li>
					<div class="author_pic">
						<img src="<?=base_url()?><?=$item->person_pic?>" />
					</div>
					<div class="msg_box">
						<div class="new">
							<span class="name"><a href="<?= base_url() ?>/user_space/uid/<?=$item->uid?>"><?=$item->username?></a> : </span>
							<?=$item->pmcontent?>
					
						</div>
						<div class="new_info">
							<span class="date">第<? $nowtime = time();echo ceil(($nowtime-$itemReply->pmdate)/(60*60*24));?>天</span>
							<span class="reply write_reply"><a href="javascript:void(0)">评论(<?=$item->replynum?>)</a></span>
							
						</div>
					
					</div>
				</li>
				<?php endforeach; ?>			
			</ul>
		</div>
		<div class="box_tab content" id="box_tab_intro" >
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
		<div class="inte no">
			点亮的为专访项目
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

