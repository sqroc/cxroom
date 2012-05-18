//去除空格
function ltrim(s) { 
 	return s.replace(/(^\s*)/g, ''); 
}

function rtrim(s) { 
	return s.replace(/(\s*$)/g, ''); 
}

function trim(s){ 
	return rtrim(ltrim(s));  
}
function warm(obj, msg){
	$('#' + obj).parent().children('span').text(msg).addClass('info_warm').css('display','relative');
}

function pass(obj){
	$('#' + obj).parent().children('span').text(" ").removeClass('info_warm').css('display','relative');
}

///////////////
//联系方式验证
function contact_check(){
	var TAG_MAIL = false;
	var TAG_QQ = false;
	var TAG_PHONE = false;
	var TAG_MOBILE = false;
	
	var mail = document.getElementsByName('contact_email')[0].value;
	var qq = document.getElementsByName('qq')[0].value;
	var phone = document.getElementsByName('phone')[0].value;
	var mobile = document.getElementsByName('telphone')[0].value;
	var province = $('#province').val();
	var phone_number = $('#phone_number').val();
	
	//去除空格
	mail = trim(mail);
	$('#contact_email').val(mail);
	qq = trim(qq);
	$('#qq').val(qq);
	phone = trim(phone);
	$('#phone').val(phone);
	mobile = trim(mobile);
	$('#telphone').val(mobile);
	province = trim(province);
	$('#province').val(province);
	phone_number = trim(phone_number);
	$('#phone_number').val(phone_number);
	
	
	if(!check_mail(mail)){
		warm('contact_email', '邮箱格式错误');
		TAG_MAIL = false;
	} else {
		pass('contact_email')
		TAG_MAIL = true;
	}
	
	if(!check_qq(qq)){
		warm('qq', 'QQ格式错误')
		TAG_QQ = false;
	} else {
		pass('qq');
		TAG_QQ = true;
	}
	
	
	if(!check_mobile(mobile)){
		warm('telphone', '手机号码格式错误')
		TAG_MOBILE = false;
	} else {
		pass('telphone');
		TAG_MOBILE = true;
	}
	
	if(!check_phone(province, phone_number)){
		warm('phone', '电话格式错误或不完整')
		TAG_PHONE = false;
	} else {
		pass('phone');
		TAG_PHONE = true;
	}
	
	if(TAG_MAIL && TAG_QQ && TAG_PHONE && TAG_MOBILE){
		return true;
	} else {
		return false;
	}
}

function check_mail(mail){
	var reg =/^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
	if(reg.test(mail) || mail=="")
	{
		return true;
	} 
	return false;
}

function check_qq(qq){
	var reg =/^\d*$/;
	if(reg.test(qq) || qq=="")
	{
		return true;
	} 
	return false;
}

function check_phone(pro, ph){
	var reg1 = /^\d{4}$/;
	var reg =/^\d{8}$/;
	
	if( reg1.test(pro) && reg.test(ph) )
	{
		$('#phone').val(pro+'-'+ph);
		return true;
	} 
	else if(pro=="" && ph=="")
	{
		$('#phone').val(pro+'-'+ph);
		return true;
	} else {
		return false;
	}
}

function check_mobile(mobile){
	var reg =/^\d{11}$/;
	if(reg.test(mobile) || mobile=="")
	{
		return true;
	} 
	return false;
}

////////////////
//基本信息验证
function info_check(){
	var TAG_NAME = false;
	var TAG_INTRO = false;
	
	if(!check_name('name')){
		warm('name', '格式错误或未填写');
		TAG_NAME = false;
	} else {
		TAG_NAME = true;
		pass('name')
	}
	
	if(!check_intro('intro')){
		warm('intro', '长度不符合要求');
		TAG_INTRO = false;
	} else {
		TAG_INTRO = true;
		pass('intro')
	}
	
	
	if(TAG_NAME && TAG_INTRO){
		return true;
	} else {
		return false;
	}
}

function check_name(obj){
	var n = $('#'+obj ).val();
	n = trim(n);
	$('#'+obj ).val(n);
	var reg =/^[\u4e00-\u9fa5\w\s]+$/;
	
	if(reg.test(n)){
		return true;
	} else {
		return false;
	}
}

function check_intro(obj){
	var i = $('#'+obj).val();
	i = trim(i);
	if(i == ""){
		return true;
	} else if( i.length < 10){
		return false;
	} else {
		return true;
	}
}

//////////////
//技能验证
function skill_check(){
	var TAG_SKILL = false;
	if(!check_skill_name('skillname')){
		warm('skillname', '技能名不能为空');
		TAG_SKILL = false;
	} else {
		pass('skillname');
		TAG_SKILL = true;
	}
	if(TAG_SKILL){
		return true;
	} else {
		return false;
	}
	
}

function check_skill_name(obj){
	var s = $('#'+obj).val();
	s = trim(s);
	$('#'+obj).val(s);
	if(s==""){
		return false;
	} else {
		return true;
	}
}

//////////////////
//检查头像
function photo_check(){
	var p = $('#userfile').val();
	if(p==""){
		return false;
	} else {
		return true;
	}
}
