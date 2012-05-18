
<!--第三行 地图-->
<div class="map_bg">
	<div class="map_shadow map_shadow_top"></div>		
	<div class="map_shadow map_shadow_bottom"></div>		
		<div id="map">
	
			<div class="places blue_l text_l" style="left:60px;top:120px;">
				<a href="http://lab.cxroom.com/" title="创新学院">创新学院</a>
			</div>
			<div class="preview" style="left:-30px;top:180px;">
				<div class="arrow" style="left:120px;"></div>
				<div class="pre_box">
					
					<ul class="article_list">
					<?php    
						$url = "http://lab.cxroom.com/api"; 
						$contents = file_get_contents($url); 
						echo $contents; 
					?>    
					</ul>
				</div>
			</div>
			
			<div class="places green_r text_r" style="left:180px;top:80px;">
				<a href="<?=base_url() ?>projects" title="项目窝">项目窝</a>
			</div>
			
			<div class="places red_r text_r" style="left:250px;top:170px;">
				<a href="<?=base_url() ?>eggs" title="创意蛋">创意蛋</a>
			</div>
			<div class="preview">
				<div class="arrow"></div>
				<div class="pre_box">
					<h3 class="title">新鲜创意: <a href="<?=base_url()?>eggs/topic/<?=$idea->ideaid?>"><?=$idea->ideaname?></a></h3>
					<div class="content slide">
						<?=$idea->ideaintro?>
					</div>
					<div class="bottom slide">
						<span>支持<?=$idea->supportnumber?>人</span><span>吐槽<?=$idea->criticizenumber?>人</span><span>酱油<?=$idea->neutralnumber?>人</span>
					</div>
				</div>
			</div>
			<!--
			<div class="banners">
				<a href="http://www.cxroom.com/projects">
				<img src="<?= base_url() ?>images/banners/index_map.png" onmouseover="this.src='<?=base_url()?>images/banners/index_map_hover.png'" onmouseout="this.src='<?=base_url()?>images/banners/index_map.png'"/>
				</a>
			</div>-->
			<div class="places yellow_r text_r" style="left:650px;top:270px;">
				你的项目
			</div>
			<div class="preview" style="left:650px;top:330px;">
				<div class="arrow"></div>
				<div class="pre_box">
					<h3 class="title">抢先入驻，让项目出现在这里！</h3>
					<div class="content slide">
						首批入驻的项目将有机会出现在首页地图上，并长期获得创新空间官方的宣传支持，心动不如行动！
					</div>
					
				</div>
			</div>
			
			
			<img src="<?=base_url()?>images/map.png" alt="创新城" />
		</div>

</div><!--#map_bg-->
<div class="white_bg">
<div class="clear0"></div>
<!--第四行 街道-->
<div class="container p_intro">
	<div class="p_intro_line fl"></div>
	<div class="introbox fl">
		<div class="intro bg_team">
			<h3 class="h_team"> </h3>
			<p>
				发布项目来吸引人才加入
			</p>
		</div>
		<div class="intro bg_project">
			<h3 class="h_pro"></h3>
			<p>
				加盟或者投资感兴趣的项目
			</p>
		</div>
		<div class="intro bg_talent">
			<h3 class="h_talent"></h3>
			<p>
				让更多人发现自己的才华
			</p>
		</div>
	</div>
	
	<div class="streets_box fl">
		<div class="street mb35">
			<div class="name">
				项目窝
			</div>
			<div class="s_intro">
				<p>
				项目窝位于城市最繁华的地段，作为创新城的创新心脏，这里汇聚了大量的潜力项目，每天都有无数的人来这里寻找机遇。
				</p>
			</div>
		</div>
		<div class="street mb35">
			<div class="name">
				创意蛋
			</div>
			<div class="s_intro">
				<p>
				创意蛋与项目窝相邻，这里聚集了大量充满创新精神的年轻人，他们每天聚集在这里，探讨发现新的创意，并为项目窝提供源源不断的动力。
				</p>
			</div>
		</div>
		<div class="street">
			<div class="name">
				创新学院
			</div>
			<div class="s_intro">
				<p>
				创新学院服务于创新人群，在这里可以获得关于创新创业的知识和咨询，是一个充电的好去处。
				</p>
			</div>
		</div>
	</div>
	<div class="p_intro_line fr"></div>
</div>



<div class="container we_c">
	<div class="we_say fl"><img src="<?=base_url()?>images/banners/say.gif" /></div>
	<div class="we_button fr">
		<a href="<?= base_url() ?>projects" class="click_button">推广我的项目</a>
		<a href="<?= base_url() ?>eggs" class="click_button">说说我的梦想</a>
	</div>
	<div class="clear0"></div>
</div>

<div class="container angle_c">
	<div class="angle_box">
		<div class="angle_info">
			<p>
			<img src="<?=base_url()?>images/angles/xmz.jpg" />
			<strong>薛蛮子</strong><br>
			<span>UT斯达康创始人</span>
			</p>
		</div>
		<div class="angle_say">
			<p>
			<span class="quote">“</span>
			 现在是创业最好的时机，今后三五年会出现伟大的公司，这些公司的价值会超过阿里巴巴、百度，会超过现在我们看到的所有大公司。
			<span class="quote">“</span>
			</p>
		</div>
		
	</div>
	
	
	
	<div class="angle_box">
		<div class="angle_info">
			<p>
			<img src="<?=base_url()?>images/angles/zl.jpg" />
			<strong>查立</strong><br>
			<span>Dragonvest Partners（乾龙创投）</span>
			</p>
		</div>
		<div class="angle_say">
			<p>
			<span class="quote">“</span>
			 不要在意你的公司是不是小的“没脸见人”又或是拥挤不堪，相反，越简陋我越喜欢，我喜欢从困难中开始创业的年轻人
			<span class="quote">“</span>
			</p>
		</div>
		
		
	</div>
	
	<div class="angle_box">
		<div class="angle_info">
			<p>
			<img src="<?=base_url()?>images/angles/xxp.jpg" />
			<strong>徐小平</strong><br>
			<span>“真格”天使投资基金</span>
			</p>
		</div>
		<div class="angle_say">
			<p>
			<span class="quote">“</span>
			天使投资很快会在中国崛起，成为一大热门现象。而天使投资人，应该有一颗天使的心，即对创业者无条件的爱和关怀。天使多了，创业创新就多了。创新的中国，呼唤天使。

			<span class="quote">“</span>
			</p>
		</div>
	
		
	</div>
	
	
</div>
</div><!--#white_bg-->

<!-- Baidu Button BEGIN -->
<script type="text/javascript" id="bdshare_js" data="type=slide&amp;img=0&amp;uid=685041" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
	document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
</script>
<!-- Baidu Button END -->