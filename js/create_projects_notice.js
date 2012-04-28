function check_notice()
{
	var s = document.getElementsByName('slogan')[0];
	var n = document.getElementsByName('notice')[0];
	var TAG_S = false;
	var TAG_N = false;

	if(s.value.length < 50 && s.value.length != "")
	{
		TAG_S = true;
		pass(s, "口号有效");
	} 
	else if (s.value.length != "")
	{
		warm(s, "字数超出限制，最多可以输入50个汉字");
	} 
	else
	{
		warm(s, "口号不能为空");
	}
	
	if(n.value.length < 70 && n.value.length !="")
	{
		TAG_N = true;
		pass(n, "信息有效");
	}
	else if (n.value.length != "")
	{
		warm(n, "字数超出限制，最多可以输入70个汉字");
	}
	
	if(TAG_S && TAG_N)
	{
		return true;
	}
	else
	{
		return false;
	}
	
	return false;
}

function warm(obj, msg){
	var s = obj.parentNode.getElementsByTagName('span')[0];
	s.style.color = "#FF0000";
	s.innerHTML= msg;
}

function pass(obj, msg){
	var s = obj.parentNode.getElementsByTagName('span')[0];
	s.style.color = "#999";
	s.innerHTML= msg;
}