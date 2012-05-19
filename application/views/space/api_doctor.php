{
	"avatar":"<?php if(isset($person_pic) && $person_pic != 'images/user_head/head_default.gif'){echo 't';}else{echo 'f';}?>",
	"intro":"<?php if(isset($intro) && $intro!=''){echo 't';}else{echo 'f';} ?>",
	"skills":"<?php if($myskills != NULL){echo 't';}else{echo 'f';} ?>",
	"asks":["<?php if(isset($nineaskinfo->q1) && $nineaskinfo->q1 !=NULL){echo 't';}else{echo 'f';} ?>",
		"<?php if(isset($nineaskinfo->q2) && $nineaskinfo->q2 !=NULL){echo 't';}else{echo 'f';} ?>",
		"<?php if(isset($nineaskinfo->q3) && $nineaskinfo->q3 !=NULL){echo 't';}else{echo 'f';} ?>",
		"<?php if(isset($nineaskinfo->q4) && $nineaskinfo->q4 !=NULL){echo 't';}else{echo 'f';} ?>",
		"<?php if(isset($nineaskinfo->q5) && $nineaskinfo->q5 !=NULL){echo 't';}else{echo 'f';} ?>",
		"<?php if(isset($nineaskinfo->q6) && $nineaskinfo->q6 !=NULL){echo 't';}else{echo 'f';} ?>",
		"<?php if(isset($nineaskinfo->q7) && $nineaskinfo->q7 !=NULL){echo 't';}else{echo 'f';} ?>",
		"<?php if(isset($nineaskinfo->q8) && $nineaskinfo->q8 !=NULL){echo 't';}else{echo 'f';} ?>",
		"<?php if(isset($nineaskinfo->q9) && $nineaskinfo->q9 !=NULL){echo 't';}else{echo 'f';} ?>"],
	"friends":"<?=$myfriendnumber?>"
}
