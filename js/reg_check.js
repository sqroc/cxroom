var TAG_MAIL = false;
var TAG_NAME = false;
var TAG_PSD = false;
var TAG_INVITE = false;
var TAG_AJAX_MAIL = false;
var TAG_AJAX_INVITE = false;

//清空表单
$(document).ready(function(){
	$('#email').val('');
	$('#name').val('');
	$('#password').val('');
	$('#invite').val('');
	$('.reg_button').mouseover(function(){
		$(this).removeClass('reg_b_normal').addClass('reg_b_hover');
	});
	$('.reg_button').mouseout(function(){
		$(this).removeClass('reg_b_hover').addClass('reg_b_normal');
	});
});

function reg_check(){
	
	check_mail('email');
	check_invite('invite');
	check_name('name');
	check_psd('password');
	
	if(TAG_MAIL && TAG_AJAX_MAIL && TAG_NAME && TAG_PSD && TAG_INVITE && TAG_AJAX_INVITE){
		return true;
	} else {
		return false;
	}
}

//预检查
$(document).ready(function(){
	$('#email').blur(function(){
		check_mail('email');	
		if(TAG_MAIL){
			ajax_check_mail();
			
		}
	});
	$('#name').blur(function(){
		check_name('name');		
	});
	$('#password').blur(function(){
		check_psd('password');		
	});
	$('#invite').blur(function(){
		check_invite('invite');	
		if(TAG_INVITE){
			ajax_check_invite();
			
		}	
	});
});

//信息提示
function warm(obj, msg){
	
	$('#'+obj).next('span').removeClass('pass').addClass('warm').html(msg);
}

function pass(obj, msg){
	$('#'+obj).next('span').removeClass('warm').addClass('pass').html(msg);
}

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

//内容验证
function check_mail(obj){
	
	var m = $('#'+obj ).val();
	m = trim(m);
	$('#'+obj ).val(m);
	var reg =/^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
	
	if(reg.test(m)){
		pass('email', '邮箱可以使用');
		TAG_MAIL = true;
		
	} else if(m ==""){
		warm('email', '邮箱不能为空');
		TAG_MAIL = false;
		
	} else {
		warm('email', '邮箱格式错误');
		TAG_MAIL = false;
	}
}

function check_name(obj){
	var n = $('#'+obj ).val();
	n = trim(n);
	$('#'+obj ).val(n);
	var reg =/^[\u4e00-\u9fa5\w\s]+$/;
	
	if(reg.test(n)){
		pass('name', '姓名可以使用');
		TAG_NAME = true;

	} else if(n==""){
		warm('name', '姓名不能为空');
		TAG_NAME = false;
		
	} else {
		warm('name', '姓名不能包含特殊字符');
		TAG_NAME = false;
	}
}

function check_psd(obj){
	var p = $('#' + obj).val();
	
	if(p.length > 6){
		pass('password', '密码可以使用');
		TAG_PSD = true;
		
	} else if(p==""){
		warm('password', '密码不能为空');
		TAG_PSD = false;
		
	} else {
		warm('password', '密码太短');
		TAG_PSD = false;
	}
}

function check_invite(obj){
	var i = $('#' + obj).val();
	i = trim(i);
	$('#' + obj ).val(i);
	
	
	if(i == ''){
		warm('invite', '邀请码不能为空');
		TAG_INVITE = false;
	} else {
		
		TAG_INVITE = true;
	}
}
