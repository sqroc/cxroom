	<div class="mid fl">
	
	
		<div class="space_tabs">
			<ul>
				<li class="current_tab">他发布的项目</li>
				
			</ul>
		</div>
		<?php if($projects == NULL):?>
				<div class="nothing">
					TA还没发布任何公开项目。<br/>
					
				</div>
		<?php endif;?>
		<ul class="project_list">
			<?php $n=0;foreach($projects as $item):$n++; ?>
			<li>
				
				<div class="project_list_box">
					<div class="avatar">
						<span class="counter"><?php echo $n; ?></span>
						<a href="<?=base_url() ?>/projects/home/<?=$item->pid?>"><?=$item->name?></a>
						
					</div>
					
				</div>
					
			</li>
			<?php endforeach; ?>
			
		</ul>
		
		<div class="pages">
			<?php echo $this->pagination->create_links();?>
		</div>
	</div><!--#mid-->