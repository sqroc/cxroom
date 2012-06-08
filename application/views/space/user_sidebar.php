	<div class="sidebar">
		<!--
		<div class="check_info">
			<img src="<?=base_url()?>images/space/no_v.gif" />
			<p>
			ID:<?=$uid?><br>
			未认证用户 <a href="">马上认证</a>
			</p>
		</div>
		<div class="c_n">
			只有通过认证的用户才能发布项目<br>
			<a href="">如何才能通过认证？</a>
		</div>
		-->
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
		<div class="publish">
			<div class="new_egg">
				<a href="<?=base_url()?>eggs/new_topic"> </a>
			</div>
			<div class="new_project">
				<a href="<?=base_url()?>space/objects_form"> </a>
			</div>
		</div>
		
		<!--
		<div class="sidebar_title">
			<h3>新鲜创意</h3> <span><a href="<?=base_url()?>eggs">查看更多»</a></span>
		</div>
		
		<div class="new ideas"><img src="<?=base_url()?>images/common/loading.gif" /></div>
		<div class="new ideas"><img src="<?=base_url()?>images/common/loading.gif" /></div>
		<div class="new ideas"><img src="<?=base_url()?>images/common/loading.gif" /></div>
		<div class="new ideas" style="border-bottom:1px #e1e1e1 solid"><img src="<?=base_url()?>images/common/loading.gif" /></div>
		<script type="text/javascript">
			$(document).ready(function(){
				var ideas = $('.ideas');
				var n = 0;
		
				$.getJSON("<?=base_url()?>eggs/api",function(json){
					
					ideas.each(function(){
						var avatar_tmp = '<div class="author"><img src="'+ json[n].author_pic +'" /></div>';
						var info_tmp = '<div class="new_info">'+ json[n].author_name +' :<br /><a class="egg_hover" id="'+ json[n].url +'" href=\"<?=base_url()?>eggs/topic/'+ json[n].url +'\">'+ json[n].title +'</a></div>';
						
						$(this).html(avatar_tmp + info_tmp + '<div class="clear0"></div>');
						n++;
					});
					preview();
					auto_height();
				});
			
			});
		</script>
		-->
			
		<div class="infobox">
			<h3 class="side_title close">创业词条</h3>
			<div class="slidebox">
				<p>
					<span class="lab_name"><?=$lab->name?></span>
					<?=$lab->content?>
					<span class="lab_article">摘自<a href="<?=$lab->articleurl?>">《<?=$lab->articletitle?>》</a></span>
					
					<span class="lab_add">收藏(<?=$lab->voattentionnumber?>)</span>
				</p>
				
			</div>
		</div>
	
		<div class="infobox" id="pcontact">
			<h3 class="side_title close">联系方式</h3>
			
			<div class="slidebox">
				<ul class="contact_list">
					<li>
					邮箱:
					<?php if(isset($contact_email) && $contact_email!=""): ?>
					<?=$contact_email ?>
					<?php else: ?>
					未设置
					<?php endif ?>
					</li>
					
					<li>
					手机:
					<?php if(isset($telphone) && $telphone!= ""): ?>
					<?=$telphone ?>
					<?php else: ?>
					未设置
					<?php endif ?>
					</li>
					<li>
					座机:
					<?php if(isset($phone) && $phone!=""): ?>
					<?=$phone ?>
					<?php else: ?>
					未设置
					<?php endif ?>
					</li>
					<li>
					Q Q:
					<?php if(isset($qq) && $qq!=""): ?>
					<?=$qq ?>
					<?php else: ?>
					未设置
					<?php endif;?>
					</li>
					
				</ul>
			</div>
			
		</div>
		
		
		<div class="clear"></div>
	</div><!--#sidebar-->
</div><!--#container-->