[
<?php $n=0;foreach($ideas as $item):$n++; ?>
	{
		"title":"<?=$item->ideaname?>",
		"url":"<?=base_url()?>eggs/topic/<?=$item->ideaid?>",
		"content":"<?=$item->ideaintro?>",
		"author_name":"<?=$item->username?>",
		"author_pic":"<?=base_url()?><?=$item->person_pic?>",
		"author_url":"<?= base_url() ?>/user_space/uid/<?=$item->uid?>"
	}<?php if($n<4){echo ",";}?>
<?php endforeach; ?>
]
