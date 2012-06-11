var tag_cur = 1;
var tag_name = false;
var tag_logo = false;
var tag_ad = false;
var tag_aim = false;

$(document).ready(function(){
	next();
	pre();
	add_one_member();
	blur_name();
	blur_logo();
	blur_ad();
	blur_aim();
});

function next(){
	$('#next').click(function(){
		check_all();
		if(flag_name && flag_logo && flag_ad && flag_aim){
			tag_cur++;
			$('.step_box').css('display', 'none');
			$('#step_' + tag_cur).css('display', 'block');
			cur_tab();
			hide_button();	
		}
	});
}

function pre(){
	$('#pre').click(function(){
		tag_cur--;
		$('.step_box').css('display', 'none');
		$('#step_' + tag_cur).css('display', 'block');
		cur_tab();
		hide_button();
	});
}

function cur_tab(){
	$('.step').removeClass('s_cur');
	$('#st_' + tag_cur).addClass('s_cur');
}

function hide_button(){
	$('.sub').css('display', 'inline');
	if(tag_cur == 1){
		$('#pre').css('display', 'none');
	}
	if(tag_cur == 4){
		$('#next').css('display', 'none');
	}
	if(tag_cur != 4){
		$('#send').css('display', 'none');
	}
}

function blur_name(){
	$('input[name="name"]').blur(function(){
	
		check_name();
	});
}

function blur_logo(){
	$('input[name="path_logo"]').blur(function(){
	
		check_logo();
	});
}

function blur_ad(){
	$('input[name="aimtitle"]').blur(function(){
	
		check_ad();
	});
}
function blur_aim(){
	$('#aimcontent').blur(function(){
	
		check_aim();
	});
}

function check_all(){
	check_name();
	check_logo();
	check_ad();
	check_aim();
}

function check_name(){
	
	var n = $('input[name="name"]');
	var reg =/^[\u4e00-\u9fa5\w\s]+$/;
	
	if(reg.test(n.val())){
		pass(n, "名称有效");
		flag_name = true;
		return true;
		
	} else if(n.val()==""){
		warm(n, "请填写项目名称");	
		return false;
		
	} else {
		warm(n, "项目名称只可以包含中文，数字和字母");
		return false;
		
	}
}

function check_logo(){
	var l = $('input[name="path_logo"]');
	if(l.val() == ""){
		warm(l, "请上传logo");
	} else {
		flag_logo = true;
	}
}

function check_ad(){
	var a = $('input[name="aimtitle"]');
	if(a.val().length > 20){
		warm(a, "长度不得大于20字");
	} else if(a.val() == ""){
		warm(a, "请填写宣传语");
	} else {
		pass(a, "信息有效");
		flag_ad = true;
	}
}

function check_aim(){
	var a = $('#aimcontent');
	
	if(a.val().length > 50){
		warm(a, "长度不得大于50字");
	} else if(a.val() == ""){
		warm(a, "请填写目标");
	} else {
		pass(a, "信息有效");
		flag_aim = true;
	}
}


//////old
///////////////////////
//功能函数
var new_count = 2;
function add_one_member(){
	$('#addm').click(function(){
		add_member();
	});
}

function add_member(){
	
	var replace_member = "member_" + new_count; 
	var replace_role = "role_" + new_count; 
	var str_new = '<div id="mem_mess"><input name="'+replace_member+'" type="input" value=""> 担任角色:<select name="'+replace_role+'"><option>创始人</option><option>技术员</option><option>法律顾问</option><option>宣传销售</option><option>其他</option></select><div class="clear" style="height:10px;"></div></div>';
	
	new_count++;
	var m = $('#members');
	$('input[name="hiddennum"]').val(new_count);
	m.append('<div>' + str_new + '</div>');
	
}

var new_count_edit = 1;

function add_edit_member(){

	var replace_member = "member_" + new_count_edit; 
	var replace_role = "role_" + new_count_edit; 	
	var str_new = '<div id="mem_mess"><input name="'+replace_member+'" type="input" value=""> 担任角色:<select name="'+replace_role+'"><option>创始人</option><option>技术员</option><option>法律顾问</option><option>宣传销售</option><option>其他</option></select><div class="clear" style="height:10px;"></div></div>';
	
	new_count_edit++;
	var m = $('#members');
	$('input[name="hiddennum"]').val(new_count);
	m.append('<div>' + str_new + '</div>');
}
//公共提示函数
function warm(obj, msg){
	var s = obj.nextAll('span');
	s.css('color', '#ff6600');
	s.text(msg);
}
//公共提示函数
function pass(obj, msg){
	var s = obj.nextAll('span');
	s.css('color', '#999');
	s.text(msg);
}

