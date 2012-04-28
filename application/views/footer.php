
<div class="footer_shadow"></div>
<div id="footer_bg">
	<div class="container">
		<div class="col fl">
			<h3>公告栏</h3>
			<ul class="list">
				<?php foreach($notice_footer as $item): ?>
				<li><a href="<?=base_url()?>articles/getarticle/<?=$item->articleid?>"><?=$item->title?></a></li>
				<?php endforeach; ?>	
			</ul>
		</div>
		<div class="col fl">
			
			<h3>帮助</h3>
			<ul class="list">
			<?php foreach($help_footer as $item): ?>
				<li><a href="<?=base_url()?>articles/getarticle/<?=$item->articleid?>"><?=$item->title?></a></li>
				<?php endforeach; ?>	
			</ul>
		</div>
		<div class="col fl">
			<div class="other weibo">
				收听我们 <a href="">新浪微博</a>
			</div>
			<!--
			<div class="other join">
				<a href="">和我们一起工作</a> 
			</div>
			
			<div class="other contact">
				<a href="">合作事宜洽谈</a>
			</div>
			-->
			<div class="other about">
				<a href="">关于创新空间</a>
			</div>
		</div>
	</div>
	
</div>
<div id="footer">
	
		<div class="container">
			<div class="fl">
				<a href="">关于我们</a> <a href="">联系方式</a> <a href="">创新学院贡献者计划</a> <a href="">服务条款</a> <a href="">合作洽谈</a>
			</div>
			<div class="fr">
				Copyright © 2012 创新空间 All Right Reserved. 浙ICP备12010459号
			</div>
			<div class="clear0"></div>
		</div>	
		
	
</div>
</body>
</html>