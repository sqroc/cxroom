<!--body-->
<div class="admin_body">
	<div class="info">
		<span><strong>基本统计：</strong></span>
		<span>注册会员数<?=$usernumber?>人</span>
	
	</div>
		
	
	<div class="content">
		<table class="table"> 
					<tr class="head"> 
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
	</div>
	<div class="page_counter">
		
			<?php echo $this->pagination->create_links();?>
		
		
	</div>
		
</div>
<!--#body-->
</body>
</html>
