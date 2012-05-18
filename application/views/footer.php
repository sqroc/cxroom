
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
				收听我们 <a href="http://weibo.com/cxroom" target="_blank">新浪微博</a>
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
				<a href="http://www.cxroom.com/articles/getarticle/18">关于创新空间</a>
			</div>
		</div>
	</div>
	
</div>
<div id="footer">
	
		<div class="container">
			<div class="fl">
				<a href="http://www.cxroom.com/articles/getarticle/17">关于我们</a> <a href="http://www.cxroom.com/articles/getarticle/18">关于创新空间</a> <a href="http://lab.cxroom.com/volunteers">贡献者计划</a> <a href="http://www.cxroom.com/articles/getarticle/11">项目服务条款</a> <a href="http://www.cxroom.com/articles/getarticle/12">EGG服务条款</a>
				<a href="http://www.cxroom.com/articles/getarticle/15">用户协议</a>
			</div>
			<div class="fr">
				Copyright © 2012 创新空间 All Right Reserved. 浙ICP备12010459号
			</div>
			<div class="clear0"></div>
		</div>	
		
	
</div>
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fb6d68dba0015ee3ea4ac4c65196a6cd1' type='text/javascript'%3E%3C/script%3E"));
</script>
</body>
</html>