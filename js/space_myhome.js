//doctor
function doctor_fade(){
	$('.doctor_info ul li').hover(function(){
		$(this).children('span').css('display','inline');
	}, function(){
		$(this).children('span').css('display','none');
	});
}

function doctor_slide(tag){
	if(tag){
		$('.doctor_info').css('display', 'none');
		$('.slide_button').text('展开化验单');		
	}
	$('.slide_button').click(function(){
		if($('.doctor_info').css('display')=='none'){
			$('.doctor_info').slideDown('fast');
			$(this).text('关闭化验单');
		} else {
			$('.doctor_info').slideUp('fast');
			$(this).text('展开化验单');
		}
	});
}

//share$msg
var temps= "";
var tag_s = true;

function share(){
	var url = share_url;
	if(tag_s){
		$.getJSON(url, function(json){
	
			var n = json.length;
			var i = 0;
			var style = "unselect";
			for(i = 0; i < n; i++){
				if(i == 0){
					style = "select";
				} else {
					style = "unselect";
				}
				temps += '<li id=\"' + json[i].eid +'\" class=\"tt '+style+'\"><span>' + json[i].egg_name + '</span><input type=\"hidden\" value=\"'+ json[i].egg_pic +'\"/></li>';	
			}
			$('#reply_content2').val('发现了一个挺有意思的创意\"'+json[0].egg_name+'\"\n推荐大家去瞧瞧');
			$('#eid').val(json[0].eid);
			$('#ename').val(json[0].egg_name);
			$('#epic').val(json[0].egg_pic);
			s_list();
			//change_egg();
			tag_s = false;
		});
	}
	
	
}

function s_list(){
	$('#s_list').click(function(){
		t_popmenu($('#s_list'), '<div id="attention_eggs"><ul>'+temps+'</ul></div>', 200);
		change_egg();
		return false;
	});
}

//news
var tmpn = "";
var tag_n = true;

function news(){
	var url = new_url;
	if(tag_n){
		$.getJSON(url, function(json){
			
			var n = json.length;
			var i= 0;
			
			for(i = 0; i < n; i++ ){
				if(i == 0){
					tmpn += '<li id="' + json[i].pid + '" class="pp select" rel="select">' + json[i].name + '</li>';	
				} else {
					tmpn += '<li id="' + json[i].pid + '" class="pp unselect" rel="unselect">' + json[i].name + '</li>';	
				}
				
			}
			n_list();
			$('#pid').val(json[0].pid);
			$('#reply_content2').val(json[0].name + '的最新动态 ' );
			tag_n = false;
		});
	}
	
	$('#joinpro').click(function(){
		return false;
	});
}

function n_list(tmp){
	$('#n_list').click(function(){
		t_popmenu($('#n_list'), '<div id="joinpro"><ul>'+tmpn+'</ul></div>', 200);
		change_pro();
		return false;
	});
}


function add_one(){

	var c = $('#reply_content2');
	$('.ff').click(function(){
		
		var name = $(this).text();
		if($(this).attr('rel') == 'unselect'){
			$(this).removeClass('unselect').addClass('select');
			$(this).attr('rel', 'select');
			c.val('@' + name + ' ' + c.val());			
			each_select();
		} else {
			$(this).removeClass('select').addClass('unselect');
			$(this).attr('rel', 'unselect');
			c.val(c.val().replace('@' + name, ""));
			each_select();
		}
		
	});	
}

function each_select(){
	var n = 0;
	aim = "";
	$('#msg_getter').val("");
	$('.ff').each(function(){
		if($(this).attr('rel') == 'select'){
			n++;
			var uid = $(this).attr('id');
			var a = $('#msg_getter').val();
			aim += '@' + $(this).text() + ' ';
					
			if(a == ""){
				$('#msg_getter').val(uid);
				
			} else {
				a += '-'+uid;
				$('#msg_getter').val(a);
			}	

		} 
	});
	$('#myf').html('发给'+n+'位好友');
}

function select_all(){
	$('.ff').removeClass('unselect').addClass('select');
	each_select();
}

function tab_on(){
	var h = $('#t_h');
	var c = $('#reply_content2');
	var f = $('#myf');
	$('#share').click(function(){
		$('#s_list').css('display', 'inline');
		$('#n_list').css('display', 'none');
		f.css('display', 'inline');
		$('.t_slide_menu').slideUp('fast');
		share();
		flag_share = true;
		flag_weixin = false;
		flag_new = false;
		$('.ct').removeClass('check_tab_on');
		$(this).addClass('check_tab_on');
		h.text('向好友推荐自己淘到的创意').css('color', '#336699');
		return false;
	});
	
	$('#weixin').click(function(){
		$('#s_list').css('display', 'none');
		$('#n_list').css('display', 'none');
		f.css('display', 'inline');
		$('.t_slide_menu').slideUp('fast');
		c.val("");
		c.val(aim);
		flag_weixin = true;
		flag_share = false;
		flag_new = false;
		$('.ct').removeClass('check_tab_on');
		$(this).addClass('check_tab_on');
		h.text('发条短信给好友 分享讨论你们的创意').css('color', '#444');
	});
	
	$('#new').click(function(){
		$('#n_list').css('display', 'inline');
		$('#s_list').css('display', 'none');
		$('.t_slide_menu').slideUp('fast');
		news();
		c.val("");
		f.css('display', 'none');
		flag_weixin = false;
		flag_share = false;
		flag_new = true;
		$('.ct').removeClass('check_tab_on');
		$(this).addClass('check_tab_on');
		h.text('发布一条微博动态到我参加的项目').css('color', '#669900');
		return false;
	});
}

function change_egg(){
	
	$('.tt').click(function(){
		
		var name = $(this).find('span').text();
		var eid = $(this).attr('id');
		var epic = $(this).find('input').val();
		$('#reply_content2').val('发现了一个挺有意思的创意\"'+name+'\"\n推荐大家去瞧瞧');
		
		$('#eid').val(eid);
		$('#ename').val(name);
		$('#epic').val(epic);
		$('.tt').removeClass('select');
		$(this).removeClass('unselect').addClass('select');
		return false;
	});
	
}

function change_pro(){
	$('.pp').click(function(){
		$('.pp').removeClass('select').addClass('unselect');
		$(this).removeClass('unselect').addClass('select');
		$('#pid').val($(this).attr('id'));
	});
}


