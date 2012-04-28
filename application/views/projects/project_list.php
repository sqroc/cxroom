<div class="clear"></div>
<div class="container">
	<div id="location">
		你的位置: <a href="<?=base_url() ?>">首页</a> > <a href="<?=base_url() ?>/projects">项目中心</a>
	</div>
</div><!--#container-->
<div class="clear"></div>

<div class="container">
	<!--left part-->
	<div class="mainbox fl">
		<div class="dark_menu">
			<ul>
				<li class="current">全部</li>
				<li>互联网</li>
				<li>平面设计</li>
				<li>手机开发</li>
			</ul>
		</div>
		
		<div class="title">
			<h3>最新发布的项目</h3><span>发现潜力项目，你也许是第一个！</span>
		</div>
		
		
	
		<div class="projectbox">
			<?php if (count($projects) >= 1): ?>
			<div class="project">
				<img src="<?=$projects[0]->logopic?>" />
				<h4><a href="<?=base_url() ?>/projects/home/<?=$projects[0]->pid?>"><?=$projects[0]->name?></a></h4>
				<p>
					发布于<?= date('Y-m-d',$projects[0]->adddate);?>
					<br/>鼓掌<?=$projects[0]->applaudnumber?>次<br/>
						<?php if ($projects[0]->isgetmember == 1): ?>
						招募进行中
						<?php else: ?>
						招募关闭
						<?php endif; ?> &nbsp;
						<?php if ($projects[0]->isinvest == 1): ?>
						募资进行中
						<?php else: ?>
						募资关闭
						<?php endif; ?>
				</p>
				<div class="cate">
					分类:<a href="" title=""><?= $projects[0]->pclassname?></a>
				</div>
			</div>
			<?php endif; ?>
			<?php if (count($projects) >= 2): ?>
			<div class="project ml20">
				<img src="<?=$projects[1]->logopic?>" />
				<h4><a href="<?=base_url() ?>/projects/home/<?=$projects[1]->pid?>"><?=$projects[1]->name?></a></h4>
				<p>
					发布于<?= date('Y-m-d',$projects[1]->adddate);?>
					<br/>鼓掌<?=$projects[1]->applaudnumber?>次<br/>
					<?php if ($projects[1]->isgetmember == 1): ?>
						招募进行中
						<?php else: ?>
						招募关闭
						<?php endif; ?> &nbsp;
						<?php if ($projects[1]->isinvest == 1): ?>
						募资进行中
						<?php else: ?>
						募资关闭
						<?php endif; ?>
				</p>
				<div class="cate">
					分类:<a href="" title=""><?= $projects[1]->pclassname?></a>
				</div>
			</div>
			<?php endif; ?>
			<?php if (count($projects) >= 3): ?>
			<div class="project ml20">
				<img src="<?=$projects[2]->logopic?>" />
				<h4><a href="<?=base_url() ?>/projects/home//<?=$projects[2]->pid?>"><?=$projects[2]->name?></a></h4>
				<p>
					发布于<?= date('Y-m-d',$projects[2]->adddate);?>
					<br/>鼓掌<?=$projects[2]->applaudnumber?>次<br/>
					<?php if ($projects[2]->isgetmember == 1): ?>
						招募进行中
						<?php else: ?>
						招募关闭
						<?php endif; ?> &nbsp;
						<?php if ($projects[2]->isinvest == 1): ?>
						募资进行中
						<?php else: ?>
						募资关闭
						<?php endif; ?>
				</p>
				<div class="cate">
					分类:<a href="" title=""><?= $projects[2]->pclassname?></a>
				</div>
			</div>
			<div class="cl30"></div>
			<?php endif; ?>
			<?php if (count($projects) >= 4): ?>
			<div class="project">
				<img src="<?=$projects[3]->logopic?>" />
				<h4><a href="<?=base_url() ?>/projects/home/<?=$projects[3]->pid?>"><?=$projects[3]->name?></a></h4>
				<p>
					发布于<?= date('Y-m-d',$projects[3]->adddate);?>
					<br/>鼓掌<?=$projects[3]->applaudnumber?>次<br/>
					<?php if ($projects[3]->isgetmember == 1): ?>
						招募进行中
						<?php else: ?>
						招募关闭
						<?php endif; ?> &nbsp;
						<?php if ($projects[3]->isinvest == 1): ?>
						募资进行中
						<?php else: ?>
						募资关闭
						<?php endif; ?>
				</p>
				<div class="cate">
					分类:<a href="" title=""><?= $projects[3]->pclassname?></a>
				</div>
			</div>
			<?php endif; ?>
			<?php if (count($projects) >= 5): ?>
			<div class="project ml20">
				<img src="<?=$projects[4]->logopic?>" />
				<h4><a href="<?=base_url() ?>/projects/home/<?=$projects[4]->pid?>"><?=$projects[4]->name?></a></h4>
				<p>
					发布于<?= date('Y-m-d',$projects[4]->adddate);?>
					<br/>鼓掌<?=$projects[4]->applaudnumber?>次<br/>
					<?php if ($projects[4]->isgetmember == 1): ?>
						招募进行中
						<?php else: ?>
						招募关闭
						<?php endif; ?> &nbsp;
						<?php if ($projects[4]->isinvest == 1): ?>
						募资进行中
						<?php else: ?>
						募资关闭
						<?php endif; ?>
				</p>
				<div class="cate">
					分类:<a href="" title=""><?= $projects[4]->pclassname?></a>
				</div>
			</div>
			<?php endif; ?>
			<?php if (count($projects) >= 6): ?>
			<div class="project ml20">
				<img src="<?=$projects[5]->logopic?>" />
				<h4><a href="<?=base_url() ?>/projects/home/<?=$projects[5]->pid?>"><?=$projects[5]->name?></a></h4>
				<p>
					发布于<?= date('Y-m-d',$projects[5]->adddate);?>
					<br/>鼓掌<?=$projects[5]->applaudnumber?>次<br/>
					<?php if ($projects[5]->isgetmember == 1): ?>
						招募进行中
						<?php else: ?>
						招募关闭
						<?php endif; ?> &nbsp;
						<?php if ($projects[5]->isinvest == 1): ?>
						募资进行中
						<?php else: ?>
						募资关闭
						<?php endif; ?>
				</p>
				<div class="cate">
					分类:<a href="" title=""><?= $projects[5]->pclassname?></a>
				</div>
			</div>
			<?php endif; ?>
		</div><!--#project box-->
		
		<div class="pages">
			<?php echo $this->pagination->create_links();?>
		</div>
		
		
		<div class="title bort">
			<h3>推荐的项目</h3><span>最火热，最有价值的项目推荐</span>
			<div class="scissors"></div>
		</div>
		<div class="projectbox">
			<?php if (count($projectsrec) >= 1): ?>
			<div class="project">
				<img src="<?=$projectsrec[0]->logopic?>" />
				<h4><a href="<?=base_url() ?>/projects/home/<?=$projectsrec[0]->pid?>"><?=$projectsrec[0]->name?></a></h4>
				<p>
					发布于<?= date('Y-m-d',$projectsrec[0]->adddate);?>
					<br/>鼓掌<?=$projectsrec[0]->applaudnumber?>次<br/>
						<?php if ($projectsrec[0]->isgetmember == 1): ?>
						招募进行中
						<?php else: ?>
						招募关闭
						<?php endif; ?> &nbsp;
						<?php if ($projectsrec[0]->isinvest == 1): ?>
						募资进行中
						<?php else: ?>
						募资关闭
						<?php endif; ?>
				</p>
				<div class="cate">
					分类:<a href="" title=""><?= $projectsrec[0]->pclassname?></a>
				</div>
			</div>
			<?php endif; ?>
			
			<?php if (count($projectsrec) >= 2): ?>
			<div class="project ml20">
				<img src="<?=$projectsrec[1]->logopic?>" />
				<h4><a href="<?=base_url() ?>/projects/home/<?=$projectsrec[1]->pid?>"><?=$projectsrec[1]->name?></a></h4>
				<p>
					发布于<?= date('Y-m-d',$projectsrec[1]->adddate);?>
					<br/>鼓掌<?=$projectsrec[1]->applaudnumber?>次<br/>
					<?php if ($projectsrec[1]->isgetmember == 1): ?>
						招募进行中
						<?php else: ?>
						招募关闭
						<?php endif; ?> &nbsp;
						<?php if ($projectsrec[1]->isinvest == 1): ?>
						募资进行中
						<?php else: ?>
						募资关闭
						<?php endif; ?>
				</p>
				<div class="cate">
					分类:<a href="" title=""><?= $projectsrec[1]->pclassname?></a>
				</div>
			</div>
			<?php endif; ?>
			<?php if (count($projectsrec) >= 3): ?>
			<div class="project ml20">
				<img src="<?=$projectsrec[2]->logopic?>" />
				<h4><a href="<?=base_url() ?>/projects/home//<?=$projectsrec[2]->pid?>"><?=$projectsrec[2]->name?></a></h4>
				<p>
					发布于<?= date('Y-m-d',$projectsrec[2]->adddate);?>
					<br/>鼓掌<?=$projectsrec[2]->applaudnumber?>次<br/>
					<?php if ($projectsrec[2]->isgetmember == 1): ?>
						招募进行中
						<?php else: ?>
						招募关闭
						<?php endif; ?> &nbsp;
						<?php if ($projectsrec[2]->isinvest == 1): ?>
						募资进行中
						<?php else: ?>
						募资关闭
						<?php endif; ?>
				</p>
				<div class="cate">
					分类:<a href="" title=""><?= $projectsrec[2]->pclassname?></a>
				</div>
			</div>
			
			<?php endif; ?>
		
			<div class="cl30"></div>
		</div><!--#project box2-->
	</div><!--#mainbox-->