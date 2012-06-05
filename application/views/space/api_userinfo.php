{
	"name"		:		"<?=$username ?>",
	"gender"	:		"<?php if (isset($gender) && $gender !=0): ?>男 <?php elseif (!isset($gender)): ?>性别保密 <?php else: ?>女 <?php endif; ?>",
	"province"	:		"<?php if (isset($province) && $province!='---请选择---'): ?> 来自<?=$province ?><?php else:?><?php endif; ?>",
	"intro"		:		"<?php if (isset($intro) && $intro!=''): ?><?php echo mb_strimwidth(strip_tags($intro), 0, 55, '....'); ?><?php else: ?>这家伙很懒，什么也没写。<?php endif; ?>",
	"avatar"	:		"<?=$person_pic?>",
	"ctype" 	:		"<?=$ctype?>",
	"skills"	:		[
								<?php $n=0;foreach($myskills as $item):$n++; ?>
									"<?=$item->skillname?>"
								<?php if($n < count($myskills)){
									echo ",";
								};endforeach; ?>
						],
	"points"	:		[
								"<?=$mypointall ?>",
								"<?=$mypoint->contributionnum ?>",
								"<?=$mypoint->activenum ?>",	
								"<?=$mypoint->creativitynum ?>"	
						],
	"hot"		:		"<?=$clickdata->click?>"
}
