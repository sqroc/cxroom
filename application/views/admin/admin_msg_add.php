<!--body-->
<div class="admin_body">
	
	<div class="content">
	<form method="post" action="<?=base_url()?>admin/cx_admin/vocabulary_add">
		
		<div class="item">
			<div class="label">
				模板选择:
			</div>
			<div class="item_info">
				<input type="button" value="推荐列表" id="list_button"/>
					
				<input type="button" value="引用推荐" id="quote_button"/>
							
			</div>
			<script type="text/javascript">
				$(document).ready(function(){
					var list_tmp = '此处覆盖为引言内容\n<ul>\n<li><a href="此处覆盖为链接" target="_blank">推荐标题一</a></li>\n<li><a href="此处填写链接" target="_blank">推荐标题二</a></li>\n</ul>';
					var quote_tmp ='此处覆盖为引言内容\n<blockquote>此处覆盖为引用内容</blockquote> ';
					$('#list_button').click(function(){
						$('#msg_content').val(list_tmp);
					});
					$('#quote_button').click(function(){
						$('#msg_content').val(quote_tmp);
					});
				});
			</script>
		</div>
		
		<div class="item">
			<div class="label">
				广播内容:
			</div>
			<div class="item_info">
				<textarea name="content" id="msg_content" style="width:400px;height:180px;"></textarea>
			
					
				
							
			</div>
		</div>
		
		
		<div class="item">
			<div class="label">
				
			</div>
			<div class="item_info">
				<input name="submit" type="submit" value="提交">
				
				
					
			</div>
		</div>
	</form>
			
	</div>
</div>

<!--#body-->
</body>
</html>
