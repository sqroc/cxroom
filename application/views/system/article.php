<div class="bg"> 
<div class="container" style="padding-top:30px;">
	<div class="a_sidebar fl">
		
		
		<div class="introbox">
			<div class="intro bg_team">
				<h3>组建一支强大的团队</h3>
				<p>
					发布项目来吸引人才加入
				</p>
			</div>
			<div class="intro bg_project">
				<h3>加盟或投资项目</h3>
				<p>
					加盟或者投资感兴趣的项目
				</p>
			</div>
			<div class="intro bg_talent">
				<h3>让别人发现自己</h3>
				<p>
					让更多人发现自己的才华
				</p>
			</div>
		</div>
		
	<!--	<div class="a_sidebox">
			<h3>相关文章</h3>
			<ul>
				<li><a href="">test1</a></li>
				<li><a href="">test2</a></li>
			</ul>
	</div>-->
	</div><!--#sidebar-->
	<div class="a_content fr">
		<h2><?=$article->title?></h2>
		<div class="tags">
			<?= date('Y-m-d',$article->adddate);?>
		</div>
		<div class="content">
			<p>
				<?=$article->content?>
			</p>
		</div>
	</div><!--#a_content-->
	
</div>
</div><!--#bg-->