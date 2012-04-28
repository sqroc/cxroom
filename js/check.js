var MSG_NOTICE = {
			noticeMail:"请输入常用邮箱",
			noticeUsr:"请输入您的姓名",
			noticePsd:"请输入密码"
		};

var MSG_PASS = {
			noticeMail:"邮箱地址有效",
			noticeUsr:"姓名有效",
			noticePsd:"该密码可用"
		};

var MSG_WARM = {
			noticeMail:"邮箱地址有错误",
			noticeUsr:"姓名不可以包括空格和特殊字符",
			noticePsd:"建议使用更长的密码"
		};

var BASE_URL = "http://galaxy.sqroc.com/"
var STYLE_NOTICE ="display:block;border:1px #E5C3C4 solid;background:url(images/icons_register.gif)  no-repeat 5px -96px #FFEAEA;color:#C00";
var STYLE_PASS ="display:block;border:1px #87C442 solid;background:url(images/icons_register.gif)  no-repeat 5px -145px #EBF8A4;color:#87C442";
var TAG_MAIL = false;
var TAG_USR = false;
var TAG_PSD = false;
var AJAX_RE = false;

/*
children functions
***********************/

function display(id)
{
	var re;
	switch(id)
	{
		case 'mail':{re = 'noticeMail';break;}
		case 'usrname':{re = 'noticeUsr';break;}
		case 'psd':{re = 'noticePsd';break;}
		default:{break;}
	}
	return re;
}

//check email
function checkEmail(mail)
{
	var reg =/^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
	if(reg.test(mail))
	{
		TAG_MAIL = true;
		return true;
	} 

	return false;
}

//check name
function checkName(usrname)
{
	var reg = /^[\u4e00-\u9fa5a-z]+$/gi;
	if(reg.test(usrname) && usrname != '姓名')
	{
		TAG_USR = true;
		return true;
	} 

	return false;
}

//ajax check repeat
function load(mail)
{
	var xmlhttp;

	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	} 
	else 
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		
	}

	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200 )
		{		
			if(xmlhttp.responseText == 'OK') 
			{
				AJAX_RE = false;
			}
			else if(xmlhttp.responseText == 'ERROR')
			{
				AJAX_RE = true;
			}
		}
	};
	xmlhttp.open("GET",BASE_URL+'index.php/register/checkmail?email='+mail,true);
	xmlhttp.send();	
}

/*
main functions
************************/

function notice(id)
{
	var a = document.getElementById(id);
	

	if(a.value=='常用邮箱' || a.value=='姓名'){a.value = '';}

	noticeId = display(id);
	
	var help = document.getElementById(noticeId);
	with(help)
	{
		innerHTML =MSG_NOTICE[noticeId];
		style.cssText = STYLE_NOTICE;
	}
}

function check(id)
{
	var a = document.getElementById(id);
	var tag = false;

	
	if(a.value == '')
	{
		if(id == 'mail') a.value = '常用邮箱';
		if(id == 'usrname') a.value = '姓名';
		return false;
	}


	if(id == 'mail')
	{
		tag = checkEmail(a.value);	
		if(tag)
		{
			load(a.value);
		}
	}
	else if(id == 'usrname')
	{
		tag = checkName(a.value);
	}
	else
	{
		if(a.value.length >=5 )
			TAG_PSD = true;		
			tag = true;
	}

	noticeId = display(id);
	var help = document.getElementById(noticeId);

	if(tag)
	{
		if(id == 'mail' && AJAX_RE)
		{
			with(help)
			{
				innerHTML = '该邮箱已经被使用';
				style.cssText = STYLE_NOTICE;
			}
		}
		else
		{
			with(help)
			{
				innerHTML = MSG_PASS[noticeId];
				style.cssText = STYLE_PASS;
			}
		}
	}
	else
	{
		with(help)
		{
			innerHTML = MSG_WARM[noticeId];
			style.cssText = STYLE_NOTICE;
		}
	}
}

function enable()
{
	if(TAG_MAIL==true && TAG_USR==true && TAG_PSD==true)
	{
		return true;
	}
	else
	{
		return false;
	}
}

