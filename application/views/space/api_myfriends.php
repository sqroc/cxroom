[
	<?php $n = 0; foreach($newuser as $item): $n++; ?>
		{
			"uid":"<?=$item->uid?>",
			"name":"<?=$item->username?>"
		}<?php if($n < $myfriendnumber){ echo ",";} ?>
	<?php endforeach; ?>
]
