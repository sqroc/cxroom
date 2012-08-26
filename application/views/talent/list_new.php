<div class="header_shadow"></div>
<div class="container talent_box">
	<div class="list_box">
		
		<ul id="list">
			<?php foreach($userlists as $item): ?>
			<li>
				<div class="talent">
					<div class="tabs" rel="1" style="display:none;">
						<a class="a" href="">列入观察名单</a> | <a class="c" title="会员1" href="javascript:void(0)">联系或邀请</a>
					</div>
					<div class="avatar">
						<img src="<?=base_url()?><?=$item->person_pic?>" title="avatar"/>
					</div>
					<div class="info">
						<div class="name">
							<a href="<?=base_url()?>user_space/uid/<?=$item->uid?>"><?=$item->username?></a><img src="http://www.cxroom.com/images/c/c_personal_little.gif">
						</div>
						<div class="about">
							<?php if ($item->gender == 0): ?>女
								<?php else: ?>男<?php endif; ?> | <?=$item->province?>-<?=$item->city?> | <?php if ($item->role == 0): ?>从业者
								<?php elseif($item->role == 1): ?>在校生<?php elseif($item->role == 2): ?>创业者<?php elseif($item->role == 3): ?>投资人<?php endif; ?>
								| <?php if (!(strpos($item->aims, '0') === false)): ?>[有项目找人才]  <?php endif; ?><?php if (!(strpos($item->aims, '1') === false)): ?>  [有项目找投资]
								<?php endif; ?><?php if (!(strpos($item->aims, '2') === false)): ?>   [有才能找工作] <?php endif; ?><?php if (!(strpos($item->aims, '3') === false)): ?> [结识好友]<?php endif; ?>
								
						</div>
						<div class="intro">
							<p>
								<?php if (isset($item->intro) && $item->intro!=''): ?><?=$item->intro ?>
								<?php else: ?>这家伙很懒，什么也没写......<?php endif; ?>
							</p>
						</div>
						<div class="skills">
							<ul>
								<li>
									<a href="">Ta的作品</a>
								</li>
								<li>
									<a href="<?=base_url()?>space/space_projectlist/prouid/<?=$item->uid?>">Ta的项目</a>
								</li>
								<li>
									技能:
								</li>
								<?php if (isset($item->skills) && $item->skills!=NULL): ?>
								<?php foreach(($item->skills) as $skill): ?>
								<li>
									<a href=""><?=$skill->skillname?></a>
								</li>
								<?php endforeach; ?>
								<?php else: ?><li>
									还未填写任何技能...
								</li><?php endif; ?>
								
							</ul>
						</div>
					</div>
				</div>
			</li>
<?php endforeach; ?>
			
			
			
			
		</ul>
		<div class="pages">
			<?php echo $this->pagination->create_links();?>
		</div>
	</div><!--#List_box-->
	<div class="side_bar">
		<ul class="cate_list">
			<li id="find_talent" class="un">找人才<span>做伯乐 找人才 </span></li>
			<!--<li id="find_friend" class="un">找朋友<span>找志趣相同的朋友</span></li>-->
			<li id="find_new" class="current">看新人<span>欢迎下最新成员</span></li>
		</ul>
	</div>
</div>
