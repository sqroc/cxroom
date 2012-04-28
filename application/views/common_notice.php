<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" /> 
<meta http-equiv="refresh" content="3;url=<?= $url ?>">
<title><?= $title ?></title> 
<base href="http://localhost/ci/"/> 
<link href="style/common.css" rel="stylesheet" type="text/css" /> 
<style> 
body{background:#f2f2f2;}
#logo{margin:0 auto;font-size:30px;color:#e1e1e1;margin-top:40px;}
#common_notice_box{width:500px;overflow:hidden;border:2px #eee solid;margin:0 auto;background:#fff;margin-top:240px;}
	#common_notice{border:1px #e1e1e1 solid;padding:20px;text-align:left;line-height:22px;padding-left:60px}
	.notice_yes{background:url(<?=base_url()?>images/icons_dialog.gif) no-repeat 20px -83px;}
	.notice_no{background:url(<?=base_url()?>images/icons_dialog.gif) no-repeat 20px -183px;}
</style> 
</head> 
<body> 

<div id="common_notice_box">
	<div id="common_notice" <?php if($mode == "yes"){echo'class="notice_yes"';}else{echo'class="notice_no"';} ?> >
		<?= $information ?>
	</div>
</div>
<div id="logo">www.cxroom.com</div>
</body> 
</html> 