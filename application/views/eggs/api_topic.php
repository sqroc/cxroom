{
	"title"		:		"<?=$idea->ideaname?>",
	"intro"		:		"<?php echo mb_strimwidth($idea->ideaintro, 0, 80, '....') ?>",
	"author"	:		"<?=$idea->username?>",
	"uid"		:		"<?=$idea->uid?>",
	"ctype"		:		"<?=$idea->ctype?>"
}
