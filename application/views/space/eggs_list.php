	<div class="mid fl">
	
	
		<div class="space_tabs">
			<ul>
				<li><a href="<?=base_url() ?>space/space_projectlist">发布的项目</a></li>
				<li class="current_tab">发布的创意蛋</li>
				
			</ul>
		</div>
		<ul class="project_list">
			<?php $n=0;foreach($eggs as $item):$n++; ?>
			<li>
				
				<div class="project_list_box">
					<div class="avatar">
						<span class="counter"><?php echo $n; ?></span>
						<a href="<?=base_url() ?>eggs/topic/<?=$item->ideaid?>"><?=$item->ideaname?></a>
						
					</div>
					<?php if ($ismy == 1):?>		
					<div class="edit">
						<a href="<?=base_url()?>eggs/eggedit/<?=$item->ideaid?>">修改信息</a>
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