	<div class="userinfo fl">
		<ul class="tablist">
			<li><a href="user_info">基本信息</a></li>
			<li class="current">个人技能</li>
			<li><a href="user_info/photo">个人头像</a></li>
			<li><a href="user_info/contact">联系方式</a></li>
		</ul>
		
		<div class="spacecol" style="margin-top:0;padding:0;">
			<h3 id="all_skills" style="cursor:pointer">查看已添加的技能 +</h3>
			
			<dl style="display:none;"><?php $n=0;foreach($myskills as $item): ?>
				<dt class="fcolor<?=$n%5?>"><?=$item->skillname?></dt>
				<dd><?=$item->skillintro?></dd>
				<?php $n++;endforeach; ?>
			</dl>
		</div>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#all_skills').toggle(function(){
					$(this).text('关闭全部技能 -').next().slideDown('fast');
					auto_height();
					
				}, function(){
					$(this).text('查看已添加技能 +').next().slideUp('fast');
					auto_height();
				});
			})
		</script>
		<script src="<?=base_url() ?>js/check_info.js" type="text/javascript"></script>
		<form method="post" action="<?=site_url('user_info/addskills')?>" onsubmit="return skill_check()">
			<div class="info_item">
				<input name="randvalue" type="hidden" value="<?=$randvalue ?>"/>
					<div class="info_label">
						技能名称:
					</div>
					<div class="info_content">
						<input name="skillname" id="skillname" type="text" class="input">
						<span></span>
				
					</div>
			</div>
			
			<div class="info_item">
					<div class="info_label">
						自我评分:
					</div>
					<div class="info_content">
						<select name="skillscore">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
								<option>6</option>
								<option>7</option>
								<option>8</option>
								<option>9</option>
								<option>10</option>
						</select>
						
						<span class="help">自我评分仅用于权衡你多个技能的侧重状况</span>
				
					</div>
			</div>
				
				
								
			<div class="info_item">
					<div class="info_label">	
						技能介绍:
					</div>
					<div class="info_content" >
						<textarea name="skillintro" ></textarea>
						
					</div>
			</div>		
			
			<div class="info_item">
					<div class="info_label">	
						&nbsp;
					</div>
					<div class="info_content">
						<input type="submit" value="增加技能" class="small_button" />
						
					</div>
			</div>	
		</form>
		
		
		
	</div><!--#info-->
<!--include user_sidebar.php-->