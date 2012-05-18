	<div class="mid fl">
	
	
		<div class="space_tabs">
			<ul>
				<li><a href="<?=base_url()?>space/space_projectlist/attentionProjectlist">收藏的项目</a></li>
				<li class="current_tab">收藏的创意蛋</li>
				<li><a href="<?=base_url()?>space/space_projectlist/attentionTiplist">收藏的词条</a></li>
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