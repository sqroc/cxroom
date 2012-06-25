<!--body-->
<div class="admin_body">
	
	<div class="content">
	<table class="table"> 
				<tr class="head"> 
					<th style="width:10%" class="name">姓名</th> 
					<th style="width:15%" class="intro">发布人ID</th> 
					<th style="width:15%" class="intro">发布时间</th> 
					<th style="width:10%" class="role">邮箱</th> 
					<th style="width:5%" class="role">认证对象</th> 
					<th style="width:30%" class="role">个人资料</th> 
					<th style="width:5%" class="role">状态</th> 
					<th style="width:10%" class="skills">操作</th> 
				</tr> 
					<?php foreach($auths as $item): ?>
				<tr> 
					<td><?=$item->realname?></td> 
					<td><a href="user_space/uid/<?=$item->uid?>" target="_blank"><?=$item->uid?></a></td> 
					<td><?= date('Y-m-d',$item->adddate);?></td> 
					<td><?=$item->email?></td> 
					<td><?=$item->object?></td> 
					<td><?=$item->intro?></td> 
					<td>	<?php if ($item->isallow == 1): ?>
						已审核
						<?php else: ?>
						未审核！！！！
						<?php endif; ?></td> 
					<td><a href="admin/cx_admin/auth_allow/<?=$item->authid?>">通过审核</a></td> 
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
