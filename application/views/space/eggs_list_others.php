	<div class="mid fl">
	
	
		<div class="space_tabs">
			<ul>
				<li class="current_tab">他发布的创意蛋</li>
				
			</ul>
		</div>
		<?php if($eggs == NULL):?>
				<div class="nothing">
					他还未发布任何创意蛋。
				</div>
		<?php endif;?>
		<ul class="project_list">
			<?php $n=0;foreach($eggs as $item):$n++; ?>
			<li>
				
				<div class="project_list_box">
					<div class="avatar">
						<span class="counter"><?php echo $n; ?></span>
						<a href="<?=base_url() ?>eggs/topic/<?=$item->ideaid?>"><?=$item->ideaname?></a>
						
					</div>
					
				</div>
					
			</li>
			<?php endforeach; ?>
			
		</ul>
		
		<div class="pages">
			<?php echo $this->pagination->create_links();?>
		</div>
	</div><!--#mid-->