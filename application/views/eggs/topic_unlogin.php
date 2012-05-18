<div class="clear"></div>
<div class="con_shadow">
<div class="topic_box">
	<div class="author fl">
		<div class="avatar">
			<img src="<?=base_url()?><?=$idea->person_pic?>" />  <br>
			<span class="name"><a href="<?=base_url()?>user_space/uid/<?=$idea->uid?>" target="_blank" title="<?=$idea->username?>的空间"><?=$idea->username?></a></span>
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
			
			
			<p>
				<?=$idea->ideaintro?>
			</p>
			<p class="summary">	
			 当前仅显示摘要内容，如果想查看完整内容请 <a href="<?=base_url()?>login" title="登录创新空间">马上登录</a> &nbsp; &nbsp; &nbsp;还没有账号？<a href="<?=base_url()?>register" title="注册创新空间账号">马上注册</a><br/>
			</p>
			
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
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fb6d68dba0015ee3ea4ac4c65196a6cd1' type='text/javascript'%3E%3C/script%3E"));
</script>