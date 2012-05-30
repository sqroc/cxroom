<!--body-->
<div class="admin_body">
	<div class="content">
	<h2>添加一个认证会员</h2>
	<form method="post" action="<?=base_url()?>admin/cx_admin/c_add_func">
		<div class="item">
			<div class="label">
				会员ID号
			</div>
			<div class="item_info">
				<input name="uid" type="text" />
				<br>
				<span class="help">请检查无误后再操作！只可以输入数字！</span>					
			</div>
		</div>
		
		<div class="item">
			<div class="label">
				认证分类:
			</div>
			<div class="item_info">
				<select name="ctype"> 
								<option value="1">个人认证</option> 
								<option value="2">团队认证</option> 
								
				</select> 
					
			</div>
		</div>
		
		
		<div class="item">
			<div class="label">
				认证头衔:
			</div>
			<div class="item_info">
				<input name="cname" type="text" class="w300"/>
			</div>
		</div>
		
		<div class="item">
			<div class="label">
				
			</div>
			<div class="item_info">
				<input name="submit" type="submit" value="提交">
				
				<br>
				
			</div>
		</div>
	</form>
	</div>
	
</div>
<!--#body-->
</body>
</html>
