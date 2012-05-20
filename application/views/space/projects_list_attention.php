	<div class="mid fl">
	
	
		<div class="space_tabs">
			<ul>
				<li class="current_tab">收藏的项目</li>
				<li><a href="<?=base_url()?>space/space_projectlist/attentionegglist">收藏的创意蛋</a></li>
				<li><a href="<?=base_url()?>space/space_projectlist/attentionTiplist">收藏的词条</a></li>
			</ul>
		</div>
		<?php if($projects == NULL):?>
				<div class="nothing">
					还没关注任何项目<br/>
					
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
					<!--
					<div class="edit">
						<a href="">取消收藏</a>
					</div>
					-->
					
				</div>
					
			</li>
			<?php endforeach; ?>
			
		</ul>
		
		<div class="pages">
			<?php echo $this->pagination->create_links();?>
		</div>
	</div><!--#mid-->