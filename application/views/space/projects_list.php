	<div class="mid fl">
		<div class="panel">
			
				<input type="button" onclick="window.open('<?=base_url()?>space/objects_form','','')" class="submit" value="发布新项目"/>
				
				<input type="button" onclick="window.open('<?=base_url()?>projects','','')" class="button" value="找新项目"/>
		</div> 
	
		<ul class="project_list">
			<?php foreach($projects as $item): ?>
			<li>
				
				<div class="project_list_box">
					<div class="avatar">
						<img src="<?=$item->logopic?>" />
						
						<p class="short_tags">
							<a href="<?=base_url() ?>/projects/home/<?=$item->pid?>"><?=$item->name?></a>
						<br>
							
						</p>
						<div class="edit">
							<a href="<?=base_url()?>space/project_edit/edit/<?=$item->pid?>">修改信息</a>
						</div>
					</div>
				</div>
					
			</li>
			<?php endforeach; ?>
			
		</ul>
		
		<div class="pages">
			<?php echo $this->pagination->create_links();?>
		</div>
	</div><!--#mid-->