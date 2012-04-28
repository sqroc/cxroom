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
		
		<div class="infobox">
			<h3 class="side_title close">人气统计</h3>
			<div class="slidebox">
				<ul class="contact_list">
					<li>空间人气:<?=$clickdata->click?></li>
				</ul>
			</div>
		</div>
		<div class="clear"></div>
	</div><!--#sidebar-->
</div><!--#container-->