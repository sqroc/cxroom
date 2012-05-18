	<div class="mid fl">
	
	
		<div class="space_tabs">
			<ul>
				<li class="current_tab">发布的项目</li>
				<li><a href="<?=base_url() ?>space/space_projectlist/egglist">发布的创意蛋</a></li>
				
			</ul>
		</div>
		<ul class="project_list">
			<?php $n=0;foreach($projects as $item):$n++; ?>
			<li>
				
				<div class="project_list_box">
					<div class="avatar">
						<span class="counter"><?php echo $n; ?></span>
						<a href="<?=base_url() ?>/projects/home/<?=$item->pid?>"><?=$item->name?></a>
						
					</div>
					<?php if ($ismy == 1):?>		
					<div class="edit">
						<a href="<?=base_url()?>space/project_edit/edit/<?=$item->pid?>">修改信息</a>
					</div>
					<?php endif;?>
					
				</div>
					
			</li>
			<?php endforeach; ?>
			
		</ul>
		
		<div class="pages">
			<?php echo $this->pagination->create_links();?>
		</div>
	</div><!--#mid-->