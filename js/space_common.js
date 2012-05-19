$(document).ready(function() {
	auto_height();

	$('.s_m').mouseover(function(){
		$(this).css('color','#333');
	});
	
	$('.s_m').mouseout(function(){
		$(this).css('color','#999');
	});
	
	space_tabs();
	preview();
});

function auto_height(){
	$('#space_container').css('height', 'auto');
	var h = $('#space_container').height();
	$('#space_container').css('height',h+'px');
	
}

$(document).ready(function() {
	var $slider = $('.side_title');
	$slider.toggle(function() {
		$(this).addClass('open').nextAll('.slidebox').slideUp();

	}, function() {
		$(this).removeClass('open').addClass('close').nextAll('.slidebox').slideDown();

	});
});

$(document).ready(function(){
	$('.droptab').hover(function(){
		$(this).addClass('my_cur').children('ul').css('display','block');
	}, function(){
		$(this).removeClass('my_cur').children('ul').css('display','none');
	});
});

//////////////
//warm dialog

function warm_dialog(tag, msg){
	var left = $('body').width()/2-160;
	var top = $(window).height()/2-80;
	//alert(top)
	$('body').append('<div id="warm_dialog" style="display:none;"><div class="box"><div id="t_content"><p></p></div></div></div>');
	$('#t_content').html(msg).addClass(tag);
	$('#warm_dialog').css({"left":left,"top":top}).fadeIn();
	setTimeout(hide_warm_dialog,3000);
}

function hide_warm_dialog(){
	$('#warm_dialog').fadeOut();
}



///////////////
//dialog
$(document).ready(function() {
	$('.small_button').hover(function() {
		$(this).removeClass('small_button').addClass('small_button_hover');
	}, function() {
		$(this).removeClass('small_button_hover').addClass('small_button');
	});

	$('.close_dialog').hover(function() {
		$(this).removeClass('close_dialog').addClass('close_dialog_hover');
	}, function() {
		$(this).removeClass('close_dialog_hover').addClass('close_dialog');
	});
	
});

$(document).ready(function() {
	$('#close_dialog').click(function() {
		$('textarea[name="reply_content"]').removeClass('warm');
		$('#t_dialog').fadeOut();
	});
});

$(document).ready(function() {
	$('#close_dialog2').click(function() {
		$('textarea[name="reply_content"]').removeClass('warm');
		$('#t2_dialog').fadeOut();
	});
});



$(document).ready(function() {
	$('#send_msg').click(function() {
		var offset = $(this).offset();
		var left = offset.left;
		var top = offset.top + 20;
		$('#t2_dialog').css({
			"left" : left,
			"top" : top
		}).fadeIn();
	});
});

$(document).ready(function() {
	$('.reply_button').click(function() {
		var id = $(this).attr('id');
		var user = $(this).parent().children(':first').text();
		$("input[name='comment_id']").val(id);
		$('.replyto').text("回复给 "+user);
		var offset = $(this).offset();
		var left = offset.left;
		var top = offset.top + 20;
		$('#t_dialog').css({
			"left" : left,
			"top" : top
		}).fadeIn();
	});
});
/////////////////////////////
//comments and reply
function check_content(tag) {
	var content;
	if(tag == 'reply') {
		content = $('#reply_content').val();
	} else {
		if(tag == 'message'){
			content = $('#reply_content2').val();
		}else{
			content = $('#comment_content').val();
		}
		
	}

	if(content == "") {
		return false;
	} else {
		return true;
	}
}

//tag为reply增加回复，tag为comment增加留言
function add_comment(tag, content) {

	
	var id = $("input[name='comment_id']").val();

	var cmp_avatar = '<div class="avatar2">' + user_photo + '</div>';
	var cmp_avatar0 = '<div class="avatar">' + user_photo + '</div>';

	var cmp_info = '<span><a href=\"' + space_url + '\">' + user_name + '</a></span><span class="date">刚刚</span><br>';
	var cmp_content = '<p>' + content + '</p>';
	var cmp_content0 = '<p>' + content + '</p>';

	var cmp_reply = '<div class="comment_box comment_reply">' + cmp_avatar + '<div class="reply w540">' + cmp_info + cmp_content + '</div><div class="clear_comment"></div></div><div class="clear_comment"></div>';
	var cmp_comment = '<li><div class="comment_box">' + cmp_avatar0 + '<div class="reply w600">' + cmp_info + cmp_content0 + '</div><div class="clear_comment"></div></div><div class="clear_comment"></div></li>';

	if(tag == 'reply') {
		$('#' + id).parent().parent().parent().append(cmp_reply);
	} else {
		$('.comments').append(cmp_comment);
	}

}
//support <br>
function add_br(str){
	var reg = new RegExp("\n","g"); 
	str = str.replace(reg,"<br />");
	return str; 
}

//menu background
$(document).ready(function(){
	var url = window.location.href;
	var reg_home = /user_space/;
	var reg_favpro = /attention/;
	var reg_mypro = /projectlist/;
	var reg_myf = /userlist/;
	var reg_info = /user_info/;
	var reg_tips = /Tiplist/;
	
	if(reg_home.test(url)){
		$('.home').removeClass('home').addClass('cur_home current')
	} else if(reg_tips.test(url)) {
		$('.fav_lab').removeClass('fav_lab').addClass('cur_fav_lab current')
	} else if(reg_favpro.test(url)) {
		$('.fav_pro').removeClass('fav_pro').addClass('cur_fav_pro current')
	} else if(reg_mypro.test(url)) {
		$('.my_pro').removeClass('my_pro').addClass('cur_my_pro current')
	} else if(reg_myf.test(url)) {
		$('.myfriends').removeClass('myfriends').addClass('cur_myfriends current')
	} else if(reg_info.test(url)) {
		$('.func').removeClass('func').addClass('cur_func current')
	} 
});

//move dialog
$(document).ready(function(){
	var _move=false;
	var _x,_y;
    $(".box_top").click(function(){
      
        }).mousedown(function(e){
        _move=true;
        _x=e.pageX-parseInt($("#t_dialog").css("left"));
        _y=e.pageY-parseInt($("#t_dialog").css("top"));
        //$("#t_dialog").fadeTo(20, 0.75);
    });
    $(document).mousemove(function(e){
        if(_move){
            var x=e.pageX-_x;
            var y=e.pageY-_y;
            $("#t_dialog").css({top:y,left:x});
        }
    }).mouseup(function(){
    _move=false;
    //$("#t_dialog").fadeTo("fast", 1);
  });
});

//tabs
function space_tabs(){
	$('#tab_msg').click(function(){
		$(this).addClass('current_tab');
		$('#tab_reply').removeClass('current_tab');
		$('#s_1').css('display', 'block');
		$('#s_2').css('display', 'none');
		auto_height();
	});
	$('#tab_reply').click(function(){
		$(this).addClass('current_tab');
		$('#tab_msg').removeClass('current_tab');
		$('#s_2').css('display', 'block');
		$('#s_1').css('display', 'none');
		auto_height();
	});
}

//
function preview(){
	$('.new').hover(function(){
		$(this).children('.preview').css('display', 'block');
	}, function(){
		$(this).children('.preview').css('display', 'none');
	});
}
