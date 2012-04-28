<!--body-->
<div class="admin_body">
	<script type="text/javascript">
		function preview()
		{
			var title = document.getElementById('keytitle');
			var content = document.getElementById('contents');
			var articles = document.getElementById('relative');
			var input_title = document.getElementsByName('title')[0];
			var input_content = document.getElementsByName('content')[0];
			var input_article = document.getElementsByName('article_title')[0];
			var input_link = document.getElementsByName('article_link')[0];
			
			title.innerHTML = input_title.value;
			content.innerHTML = input_content.value;
			articles.innerHTML = "<a href=\"" + input_link.value + "\" target='_blank'>" + input_article.value + "</a>";
		}
	</script>
	<div id="learn" style="width:500px;">
			<div class="shut"></div>
			<h3>充电时间 <span id="keytitle">今日词条:请输入</span></h3>
			<p id="contents">请输入</p>
			<div class="mess">
				
				<span class="write" id="relative"><a href="">请输入相关文章</a></span>
				<span class="catch"><a href="">我知道了</a></span>
			</div>
	</div>
	<form method="post" action="<?=base_url()?>admin/cx_admin/vocabulary_add">
		<div class="item">
			<div class="label">
				词条名称:
			</div>
			<div class="item_info">
				<input name="title" type="input" class="w300">
				<br>
				<span class="help">填写词条名称，不易过长</span>					
			</div>
		</div>
		<div class="item">
			<div class="label">
				词条内容:
			</div>
			<div class="item_info">
				<textarea name="content" style="width:400px;height:180px;"></textarea>
			
						<!--
						<input name="date" type="hidden" >
						-->
				<br>
				<span class="help">填写词条内容，字数不易过多</span>					
			</div>
		</div>
		<div class="item">
			<div class="label">
				学院文章:
			</div>
			<div class="item_info">
				<input name="article_title" type="input" class="w300">
				<br>
				<span class="help">创新学院的相关文章标题</span>					
			</div>
		</div>
		<div class="item">
			<div class="label">
				文章链接:
			</div>
			<div class="item_info">
				<input name="article_link" type="input" class="w300">
						<!--
						<input name="date" type="hidden" >
						-->
				<br>
				<span class="help">相关文章的链接</span>					
			</div>
		</div>
		<div class="item">
			<div class="label">
				
			</div>
			<div class="item_info">
				<input name="submit" type="submit" value="提交">
				<input name="button" onclick="preview()" type="button" value="预览效果">	
				<br>
				<span class="help">预览效果是为了调整字数为最佳</span>				
			</div>
		</div>
	</form>
	
	
</div>
<!--#body-->
</body>
</html>
