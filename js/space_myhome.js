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
function share(link){
	var url = link;
	$.getJSON(url, function(json){
		var temp = "";
		var n = json.length;
		var i = 0;
		var style = "unselect";
		for(i = 0; i < n; i++){
			if(i == 0){
				style = "select";
			} else {
				style = "unselect";
			}
			temp += '<li id=\"' + json[i].eid +'\" class=\"'+style+'\"><span>' + json[i].egg_name + '</span><input type=\"hidden\" value=\"'+ json[i].egg_pic +'\"/></li>';	
		}
		$('#reply_content2').val('发现了一个挺有意思的创意\"'+json[0].egg_name+'\"\n推荐大家去瞧瞧');
		$('#eid').val(json[0].eid);
		$('#ename').val(json[0].egg_name);
		$('#epic').val(json[0].egg_pic);
		$('#attention_eggs').html('<ul>'+temp+'</ul>');
		myegg_list();
		change_egg();
	});
}

function myegg_list(){
	var a = $('#attention_eggs');
	$('#share').click(function(){
		//alert('a');
		$('#friends_list').css('display', 'none');
		if(a.css('display') == 'none'){
			a.css('display', 'block');
		} else {
			a.css('display', 'none');
		}
		return false;
		
	});
}

function add_one(){
	$('#friends_list ul li').click(function(){
		
		if($(this).attr('class') == 'unselect'){
			$(this).removeClass('unselect').addClass('select');
			each_select();
		} else {
			$(this).removeClass('select').addClass('unselect');
			each_select();
		}
		
	});	
}

function each_select(){
	var n = 0;
	$('#msg_getter').val("");
	$('#friends_list ul li').each(function(){
		if($(this).attr('class') == 'select'){
			n++;
			var uid = $(this).attr('id');
			var a = $('#msg_getter').val()
			
			if(a == ""){
				$('#msg_getter').val(uid);
				
			} else {
				a += '-'+uid;
				$('#msg_getter').val(a);
			}	

		} 
	});
	$('#towho').html('发送给'+n+'人');
}

function select_all(){
	$('#friends_list ul li').removeClass('unselect').addClass('select');
	each_select();
}

function tab_on(){
	$('#share').click(function(){
		flag_share = true;
		flag_weixin = false;
		$(this).addClass('check_tab_on');
		$('#weixin').removeClass('check_tab_on');
	});
	
	$('#weixin').click(function(){
		flag_weixin = true;
		flag_share = false;
		$(this).addClass('check_tab_on');
		$('#share').removeClass('check_tab_on');
	});
}

function change_egg(){
	$('#attention_eggs ul li').click(function(){
		var name = $(this).find('span').text();
		var eid = $(this).attr('id');
		var epic = $(this).find('input').val();
		$('#reply_content2').val('发现了一个挺有意思的创意\"'+name+'\"\n推荐大家去瞧瞧');
		
		$('#eid').val(eid);
		$('#ename').val(name);
		$('#epic').val(epic);
		$('#attention_eggs ul li').removeClass('select');
		$(this).removeClass('unselect').addClass('select');
		return false;
	});
}
