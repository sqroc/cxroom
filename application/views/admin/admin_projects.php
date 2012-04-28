<!--body-->
<div class="admin_body">
	<p>
		<span>总项目数<?=$projectnumber?></span> <span class="warm"><?=$noallow?>个项目未审核</span>
	</p>
	<table style="width:90%;line-height:40px;"> 
				<tr> 
					<th style="width:25%" class="name">名称</th> 
					<th style="width:15%" class="intro">发布人ID</th> 
					<th style="width:15%" class="intro">发布时间</th> 
					<th style="width:20%" class="role">状态</th> 
					<th style="width:25%" class="skills">操作</th> 
				</tr> 
					<?php foreach($projects as $item): ?>
				<tr> 
					<td><a href="projects/home/<?=$item->pid?>" target="_blank"><?=$item->name?></a></td> 
					<td><a href="user_space/uid/<?=$item->uid?>" target="_blank"><?=$item->uid?></a></td> 
					<td><?= date('Y-m-d',$item->adddate);?></td> 
					<td>	<?php if ($item->isallow == 1): ?>
						已审核
						<?php else: ?>
						未审核！！！！
						<?php endif; ?></td> 
					<td><a href="admin/cx_admin/project_allow/<?=$item->pid?>">通过审核</a> | <a href="admin/cx_admin/project_rec/<?=$item->pid?>">推荐</a> | <a href="admin/cx_admin/project_rec_delete/<?=$item->pid?>">停止推荐</a> | <a href="admin/cx_admin/project_delete/<?=$item->pid?>">删除</a></td> 
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
