$(document).ready(function(){
	$('input[name="ideaname"]').blur(function(){
		check_name();
	});	
	$('textarea[name="ideaintro"]').blur(function(){
		check_intro();
		//alert('a')
	});	
});

function check_egg(){
	
	var TAG_NAME = false;
	var TAG_INTRO = false;
	var TAG_COVER = false;
	
	if(check_name()){
		TAG_NAME = true;	
	}	
	
	if(check_intro()){
		TAG_INTRO = true;
	}
	
	if(TAG_NAME && TAG_INTRO){
		return true;
	} else {
		return false;
	}
}

function pass(obj, msg){
	obj.parent().children('span').text(msg).css('color','#444');
}

function warm(obj, msg){
	obj.parent().children('span').text(msg).css('color','#CC0000');
}

function check_name(){

	var n = $('input[name="ideaname"]');
	var reg =/^[\u4e00-\u9fa5\w\s]+$/;
	
	if(reg.test(n.val())){
		pass(n, "该名称有效");
		return true;
		
	} else if(n.val()==""){
		warm(n, "请填写创意蛋的名称");	
		return false;
		
	} else {
		warm(n, "创意名称只可以包含中文，数字和字母");
		return false;
		
	}
}

function check_intro(){
	var c = $('textarea[name="ideaintro"]');
	
	if(c.val().length > 100){
		
		warm(c, "摘要长度不能超过100个字");
		return false;
	} else if(c.val().length < 20){
		
		warm(c, "摘要长度不符合要求");
		return false;
	} else {
	
		pass(c, "摘要有效");
		return true;
	}
}

