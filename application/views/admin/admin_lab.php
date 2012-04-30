<!--body-->
<div class="admin_body">

	<div class="info">
		<span><strong>基本统计：</strong></span>
		<span>总词条数<?=$labnumber?></span>
	
	</div>
	<div class="content">
		<table class="table"> 
					<tr class="head"> 
						 <th style="width:25%" class="name">词条名称</th> 
						<th style="width:15%" class="intro">内容</th> 
						<th style="width:15%" class="intro">发布时间</th> 
						<th style="width:20%" class="role">链接</th> 
						<th style="width:25%" class="skills">操作</th> 
					</tr> 
					<?php foreach($labs as $item): ?>
					<tr> 
						<td><?=$item->name?></td> 
						<td><?=$item->content?></td> 
						<td><?= date('Y-m-d',$item->adddate);?></td> 
						<td><a href="<?=$item->articleurl?>"><?=$item->articletitle?></a></td> 
						<td><a href="admin/cx_admin/lab_delete/<?=$item->vid?>">删除</a></td> 
					</tr>	
						<?php endforeach; ?>			
		</table> 
	</div>
	<ul class="admin_pages">
	<?php echo $this->pagination->create_links();?>
	
	</ul>	
	
</div>
<!--#body-->
</body>
</html>
