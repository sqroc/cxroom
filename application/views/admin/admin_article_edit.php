<!--body-->
<div class="admin_body">
	<div class="content">
	<form method="post" action="<?=base_url()?>admin/cx_admin/article_update">
		<div class="item">
			<div class="label">
				文章标题:
			</div>
			<div class="item_info">
				<input name="title" type="input" class="w300" value="<?=$articlecontent->title?>">
				<br>
				<span class="help">填写文章标题</span>					
			</div>
		</div>
		
		<div class="item">
			<div class="label">
				文章分类:
			</div>
			<div class="item_info">
				<select name="articleclass"> 
					<option selected="selected"><?=$articlecontent->articleclass?></option> 
								<option>公告</option> 
								<option>帮助</option> 
								<option>其他</option> 
				</select> 
					
			</div>
		</div>
		<script charset="utf-8" src="<?base_url()?>js/kindeditor-min.js"></script> 
		<script charset="utf-8" src="<?base_url()?>js/zh_CN.js"></script>
		<script> 
					var editor;
					KindEditor.ready(function(K) {
					editor = K.create('textarea[name="content"]', {
					resizeType : 1,
					allowPreviewEmoticons : false,
					allowImageUpload : true,
					items : [
						'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
						'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
						'insertunorderedlist', '|', 'emoticons', 'image', 'link']
						});
					});
		</script> 
		
		
		<div class="item">
			<div class="label">
				文章内容:
			</div>
			<div class="item_info">
				<textarea name="content" style="width:600px;height:400px;"><?=$articlecontent->content?></textarea>
			
						<!--
						<input name="date" type="hidden" >
						-->
				<br>
							
			</div>
		</div>
		<input name="articleid" type="hidden" value="<?=$articlecontent->articleid?>">
		<div class="item">
			<div class="label">
				
			</div>
			<div class="item_info">
				<input name="submit" type="submit" value="更新">
				
				<br>
				
			</div>
		</div>
	</form>
	</div>
	
</div>
<!--#body-->
</body>
</html>
