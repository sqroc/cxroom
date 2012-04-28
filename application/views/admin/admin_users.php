<!--body-->
<div class="admin_body">
	<p>
		<span>注册会员数<?=$usernumber?>人</span>
		<span>本周注册会员数***人</span>
	</p>
	<table style="width:90%;line-height:40px;"> 
				<tr> 
					<th style="width:15%" class="name">头像</th> 
					<th style="width:15%" class="intro">姓名</th> 
					<th style="width:50%" class="role">个人简介</th> 
					<th style="width:20%" class="skills">操作</th> 
				</tr> 
				<?php foreach($newuser as $item): ?>
				<tr> 
					<td><img src="<?=base_url()?><?=$item->person_pic?>" width="40" height="40" /></td> 
					<td><?=$item->username?></td> 
					<td><?=$item->intro?></td> 
					<td><a href="">警告</a> | <a href="admin/cx_admin/user_delete/<?=$item->uid?>">删除</a> | <a href="">冻结</a></td> 
				</tr> 
				<?php endforeach; ?>
		
	</table> 
	<ul class="admin_pages">
		<?php echo $this->pagination->create_links();?>
	
	</ul>	
</div>
<!--#body-->
</body>
</html>
