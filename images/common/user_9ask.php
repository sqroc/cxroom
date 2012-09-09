	<div class="userinfo fl">
		<ul class="tablist">
			<li><a href="user_info">基本信息</a></li>
			<li><a href="user_info/skills">个人技能</a></li>
			<li><a href="user_info/photo">个人头像</a></li>
			<li><a href="user_info/contact">联系方式</a></li>
			<li class="current">九 问</li>
		</ul>
		<div class="info_notice">
			<span>人与人，每一次的相识都源自对彼此的好奇</span>
		</div>
	
		
		<script type="text/javascript">
			$(document).ready(function(){
				$('.ask_item').children('textarea').focus(function(){
					$(this).css('height','100px');
					auto_height();
				});
				$('.ask_item').children('textarea').blur(function(){
					$(this).css('height','40px');
					auto_height();
				});
			});
			
			function check_ask(){
				$('.ask_item').children('textarea').each(function(){
					var text = $(this).val();
					text = add_br(text);
					$(this).val(text);
				});
				return true;
			}
		</script>
		<form method="post" action="<?=site_url('user_info/nineaskinfo')?>" onsubmit="return check_ask()">
		<input name="randvalue" type="hidden" value="<?=$randvalue ?>"/>
		<div class="ask ask_item">
			<h4 class="question"><span class="icon">Q1</span>你小时候或者现在的梦想是什么？</h4>
			<textarea name="q1"><?php if (isset($nineaskinfo->q1) && $nineaskinfo->q1 !=NULL): ?><?=$nineaskinfo->q1 ?><?php endif; ?></textarea>
				
		</div>
		<div class="ask ask_item">
			<h4 class="question"><span class="icon">Q2</span>自己都做过或者想过些啥有创意的事？</h4>
			<textarea name="q2"><?php if (isset($nineaskinfo->q2) && $nineaskinfo->q2 !=NULL): ?><?=$nineaskinfo->q2 ?>
				<?php endif; ?></textarea>
		</div>
		<div class="ask ask_item">
			<h4 class="question"><span class="icon">Q3</span>长这么大，你最勇敢的尝试是什么？</h4>
			<textarea name="q3"><?php if (isset($nineaskinfo->q3) && $nineaskinfo->q3 !=NULL): ?><?=$nineaskinfo->q3 ?>
				<?php endif; ?></textarea>
		</div>
		<div class="ask ask_item">
			<h4 class="question"><span class="icon">Q4</span>你朋友圈子里有什么怪才？</h4>
			<textarea name="q4"><?php if (isset($nineaskinfo->q4) && $nineaskinfo->q4 !=NULL): ?><?=$nineaskinfo->q4 ?>
				<?php endif; ?></textarea>
		</div>
		<div class="ask ask_item">
			<h4 class="question"><span class="icon">Q5</span>你是否有过参与某支团队的经历？哪怕只是为了完成很小的事情？</h4>
			<textarea name="q5"><?php if (isset($nineaskinfo->q5) && $nineaskinfo->q5 !=NULL): ?><?=$nineaskinfo->q5 ?>
				<?php endif; ?></textarea>
		</div>
		<div class="ask ask_item">
			<h4 class="question"><span class="icon">Q6</span>你是否想过要创业？如果有你想象中的创业是怎样的？</h4>
			<textarea name="q6"><?php if (isset($nineaskinfo->q6) && $nineaskinfo->q6 !=NULL): ?><?=$nineaskinfo->q6 ?>
				<?php endif; ?></textarea>
		</div>
		<div class="ask ask_item">
			<h4 class="question"><span class="icon">Q7</span>你是否会放弃一份优越的工作选择去创业？</h4>
			<textarea name="q7"><?php if (isset($nineaskinfo->q7) && $nineaskinfo->q7 !=NULL): ?><?=$nineaskinfo->q7 ?>
				<?php endif; ?></textarea>
		</div>
		<div class="ask ask_item">
			<h4 class="question"><span class="icon">Q8</span>给你一个亿你会怎么花？存起来还是搞投资？</h4>
			<textarea name="q8"><?php if (isset($nineaskinfo->q8) && $nineaskinfo->q8 !=NULL): ?><?=$nineaskinfo->q8 ?>
				<?php endif; ?></textarea>
		</div>
		<div class="ask ask_item">
			<h4 class="question"><span class="icon">Q9</span>列举几个理由来证明你可以获得成功！</h4>
			<textarea name="q9"><?php if (isset($nineaskinfo->q9) && $nineaskinfo->q9 !=NULL): ?><?=$nineaskinfo->q9 ?>
				<?php endif; ?></textarea>
		</div>		
			
		<div class="info_item">
			<div class="info_label">
				
			</div>
			<div class="info_content">
				<input type="submit" value="保存修改" class="small_button" />
			</div>
		</div>				
			
		</form>
		
	</div><!--#infobox-->
<!--include user_sidebar.php-->