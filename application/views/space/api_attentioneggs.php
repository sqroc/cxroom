[
	<?php $n=0;foreach($eggs as $item):$n++; ?>
	{
		"eid":"<?=$item->ideaid?>",
		"egg_name":"<?=$item->ideaname?>",
		"egg_pic":"<?=$item->coverimage?>"
	}<?php if($n < count($eggs)){echo ",";}?>
	<?php endforeach; ?>
]