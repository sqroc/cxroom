<!--body-->
<div class="admin_body">
	<div class="content">
	<table class="table"> 
				<tr class="head"> 
					<th style="width:25%" class="name">标题</th> 
					<th style="width:25%" class="intro">发布时间</th> 
					
					<th style="width:50%" class="skills">操作</th> 
				</tr> 
				<?php foreach($articles as $item): ?>
				<tr> 
					<td><?=$item->title?></td> 
					<td><?= date('Y-m-d',$item->adddate);?></td> 
				
					<td><a href="admin/cx_admin/article_delete/<?=$item->articleid?>">删除</a> <a href="articles/getarticle/<?=$item->articleid?>">查看</a> <a href="admin/cx_admin/article_edit/<?=$item->articleid?>">修改</a></td> 
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
