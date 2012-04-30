<!--body-->
<div class="admin_body">
	
	<div class="content">
	<form method="post" action="<?=base_url()?>admin/cx_admin/vocabulary_add">
		<div class="item">
			<div class="label">
				词条名称:
			</div>
			<div class="item_info">
				<input name="title" type="input" id="tt" class="w300">
				<br>
				<span class="help">填写词条名称，不易过长</span>					
			</div>
		</div>
		<div class="item">
			<div class="label">
				词条内容:
			</div>
			<div class="item_info">
				<textarea name="content" id="lab_content" style="width:400px;height:180px;"></textarea>
			
						<!--
						<input name="date" type="hidden" >
						-->
						<div class="slidebox"> 
							<p> 
								<span class="lab_name" id="s_n"></span> 
								<span id="s_l"></span>				
								
								<span class="lab_article">摘自《<a id="s_link" href=""></a>》</span> 
								
								
							</p> 
				
						</div> 
				
							
			</div>
		</div>
		<div class="item">
			<div class="label">
				学院文章:
			</div>
			<div class="item_info">
				<input name="article_title" id="cc" type="input" class="w300">
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
				
				<br>
				<span class="help">预览效果是为了调整字数为最佳</span>				
			</div>
		</div>
	</form>
			
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		
		$('#lab_content').keyup(function(){
			pre();
		});
		
		$('#tt').keyup(function(){
			pre();
		});
		
		$('#cc').keyup(function(){
			pre();
		});
	});
	
	function pre(){
		var c = $('#lab_content').val();
		var t = $('#tt').val();
		var a = $('#cc').val();
		c = add_br(c);
		$('#lab_content').val(c);	
		$('#s_l').html(c);
		$('#s_n').html(t);
		$('#s_link').text(a);
	}
</script>
<!--#body-->
</body>
</html>
