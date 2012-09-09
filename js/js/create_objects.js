//全局配置
var BASE_URL = "http://galaxy.sqroc.com/";

function $(obj){
	return document.getElementById(obj);
}

function get_name(obj , nu){
	return document.getElementsByName(obj)[nu];
}
///////////////////////
//功能函数
var new_count = 2;

function add_member(){

	var replace_member = "member_" + new_count; 
	var replace_role = "role_" + new_count; 
	var str_hidden = "<input name=\"hiddennum\" type=\"hidden\" value=\""+new_count+"\"/>";	
	
	var str_new = $('mem_mess').innerHTML;
	
	var reg = /member_1/g;
	var reg1 =/role_1/g;
	var reg2 = /value="*"/g;
	
	str_new = str_new.replace(reg, replace_member);
	str_new = str_new.replace(reg1, replace_role);
	new_count++;
	str_new = str_new.replace(reg2, "value=\"\"");
	
	var m = $('members');
	var newmem = document.createElement('div');
			
	newmem.innerHTML = str_new;
	hiddennum.innerHTML = str_hidden;
	m.insertBefore(newmem, null);
}

var new_count_edit = 1;

function add_edit_member(){

	var replace_member = "member_" + new_count_edit; 
	var replace_role = "role_" + new_count_edit; 
	var str_hidden = "<input name=\"hiddennum\" type=\"hidden\" value=\""+new_count_edit+"\"/>";	
	
	var str_new = '<input name="member_1" type="input" > 担任角色: <select name="role_1"><option>创始人</option><option>技术员</option><option>法律顾问</option><option>宣传销售</option><option>待补充</option></select><div class="clear" style="height:10px;"></div>'
	
	var reg = /member_1/g;
	var reg1 =/role_1/g;
	var reg2 = /value="*"/g;
	
	str_new = str_new.replace(reg, replace_member);
	str_new = str_new.replace(reg1, replace_role);
	new_count_edit++;
	str_new = str_new.replace(reg2, "value=\"\"");
	
	var m = $('members');
	var newmem = document.createElement('div');
			
	newmem.innerHTML = str_new;
	hiddennum.innerHTML = str_hidden;
	m.insertBefore(newmem, null);
}

function display_msg(){

	var help = $('notice');
	var button = $('help_button');
					
	if(help.style.display == 'none'){
		help.style.display = 'block';
		button.value = '关闭便签';
	} else {
		help.style.display = 'none';
		button.value = '好友便签';
	}
}

function more_msg(obj){
	var a = $(obj);
	var c = a.getElementsByTagName('dl')[1];
	
	if(c.style.display == 'none'){
		c.style.display = "block";
	} else {
		c.style.display = "none";
	}
}

//////////////////////////////////////////////////////
//公共提示函数
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

//公共tab提示
function tab_warm(obj, type){
	var menu_span = $('box').getElementsByTagName('span')[obj];
	if(type == "pass"){
		menu_span.style.color = "#666";
	} else {
		menu_span.style.color = "#FF0000";
	}
}

//检测全部信息
function check_info(){

	if( check_baseinfo() && check_slogan() && check_doc()){
		
		return true;
		
	}else{
	
		check_baseinfo();
		check_slogan();
		check_doc();
		
		var sum = $('publish');
		warm(sum, "你提供的信息有误或者不完整，请核实修正");
		return false;
	}
	//return false;
	
}

//检查基本信息
function check_baseinfo(){
	if( check_name('name') ){
		tab_warm(0, 'pass');
		return true;
	} else {
		tab_warm(0, 'wrong');
		return false;
	}
}

function check_name(obj){
	
	var n = get_name(obj, 0);
	var reg =/^[\u4e00-\u9fa5\w\s]+$/;
	
	if(reg.test(n.value)){
		pass(n, "该名称有效");
		return true;
		
	} else if(n.value==""){
		warm(n, "请填写项目名称");	
		return false;
		
	} else {
		warm(n, "项目名称只可以包含中文，数字和字母");
		return false;
		
	}
}

function check_cate(obj){

	var m = get_name(obj, 0);
	if(m.value == "请选择"){
		warm(m, "请选择分类");
		//TAG_CATE = false;
		return false;
	}else{
		pass(n, "分类有效");
		//TAG_CATE = true;
		return true;
	} 
}

function check_intro(obj){

	var intro = get_name(obj, 0);
	var s = $('textspan');
	alert(intro.value.length);
	if(intro.value.length < 400){
		s.style.color = "#FF0000";
		s.innerHTML = "长度不符合要求，请输入大于200字的内容";
		//TAG_INTRO = false;
	}else{
		s.style.color = "#999";
		s.innerHTML = "简介有效";
		//TAG_INTRO = true;
	} 
}

//检查招募和募资
function check_doc(){
	
	var TAG_T = true;
	var TAG_I = true;
	
	if(if_selected('isgetmember')){
		if(check_title('talenttitle')){
			tab_warm(1, 'pass');
		} else {
			tab_warm(1, 'wrong');
			TAG_T = false;
		} 
	}
	
	if(if_selected('isinvest')){
		if(check_title('investtitle')){
			tab_warm(2, 'pass');
		} else {
			tab_warm(2, 'wrong');
			TAG_I = false;
		} 
	}
	
	if(TAG_T && TAG_I){
		return true;
	} else {
		return false;
	}
}

function check_title(obj){

	var n = get_name(obj, 0);
	var reg =/^[\u4e00-\u9fa5\w\s]+$/;
	
	if(reg.test(n.value)){
	
		pass(n, "该文件名称有效");
		return true;
		
	} else if(n.value==""){
	
		warm(n, "请填写文件名称");	
		return false;
		
	} else {
	
		warm(n, "文件名称只可以包含中文，数字和字母");
		return false;	
	}
}

function if_selected(obj){

	var s_box = get_name(obj, 0);
	if(s_box.checked){
		return true;
	} else {
		return false;
	}
}

//检查口号和目标
function check_slogan(){
	
	var s = get_name('aimtitle', 0);
	var n = get_name('aimcontent', 0);
	var TAG_S = false;
	var TAG_N = false;

	if(s.value.length < 50 && s.value.length != ""){
		TAG_S = true;
		pass(s, "口号有效");
	} else if (s.value.length != ""){
		warm(s, "字数超出限制，最多可以输入50个汉字");
	} else {
		warm(s, "口号不能为空");
	}
	
	if(n.value.length < 70 && n.value.length !=""){
		TAG_N = true;
		pass(n, "信息有效");
	} else if (n.value.length != ""){
		warm(n, "字数超出限制，最多可以输入70个汉字");
	} else {
		warm(n, "目标不能为空");
	}
	
	if(TAG_S && TAG_N){
		tab_warm(3, 'pass');
		return true;
	} else {
		tab_warm(3, 'wrong');
		return false;
	}
}

//show doc
function show_doc(obj){
	var menu_span = $('box').getElementsByTagName('span')[obj];
	if(menu_span.style.display == 'none'){
		menu_span.style.display = 'block';
	} else {
		menu_span.style.display = 'none';
	}
}

///////////////////////////////////////
//选项卡
function dsp_box(type, box_id)
{	
	var current_bg = "height:36px;border-bottom:1px #fff solid;line-height:36px;background:url("+BASE_URL+"images/cate/bg_project_index.png) repeat-x 0 -201px #fff;";
	var normal_bg = "background:url("+BASE_URL+"/images/cate/bg_project_index.png) repeat-x 0 -151px #ECECEC;border-bottom:none;line-height:34px;height:34px;";
	var menu_span = $(type).getElementsByTagName('span');
	var n = menu_span.length;
	
	while(n--)
	{
		m = n + 1;
		var box = $(type +'_'+ m);
		
		if(m == box_id && menu_span[n].style.display !="none")
		{
			box.style.display = "block";
			menu_span[n].style.cssText = current_bg;
		} 
		else 
		{
			box.style.display = "none";
			if(menu_span[n].style.display !="none"){
				menu_span[n].style.cssText = normal_bg;
			}
		}
	}
}


