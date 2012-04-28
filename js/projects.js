///////////////////////////////////
//动画
$(document).ready(function(){
	$('.ptabs').children().click(function(){
	
		var id = $(this).attr('id').split('_')[2];
		var type = $(this).parent().parent().attr('id');
		var id_content = type + '_' + id;
		
		$(this).parent().children().removeClass('current').addClass('normal');
		$(this).addClass('current');
		
		$(this).parent().parent().children('.pcontent').css('display','none');
		$('#' + type + '_' + id).css('display','block');
		
	});
	
});

$(document).ready(function(){
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
	
	$('.pmenu').children().children('li').hover(function(){
		$(this).css('background','#f9f9f9');
	}, function(){
		$(this).css('background','#f2f2f2');
	});
	
});

window.onscroll = function() {
	var left = document.getElementById('move_menu').offsetLeft;
	var top = document.documentElement.scrollTop || document.body.scrollTop;
	if(top > 100) {
		$('#move_menu').css({"position":'fixed', "left":left, "top":0});
		
	} else {
		document.getElementById('move_menu').style.cssText = "position:relative;margin-top:0px";
	}
}

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
$(document).ready(function(){
		$('#send_msg').click(function(){
			//$('#t_dialog').fadeIn();
			var offset = $(this).offset();
			var left = offset.left;
			var top = offset.top + 20;
			$('#t_dialog').css({"left":left,"top":top}).fadeIn();
			}
		);
	}
);

$(document).ready(function(){
		$('.reply_button').click(function(){
			var id = $(this).attr('id');
			var user = $(this).parent().children(':first').text();
			$("input[name='user_name']").val(user);
			$("input[name='comment_id']").val(id);
			$('.replyto').text("回复给 "+user);
			var offset = $(this).offset();
			var left = offset.left;
			var top = offset.top + 20;
			$('#t_dialog').css({"left":left,"top":top}).fadeIn();
			}
		);
	}
);

$(document).ready(function(){
	$('#close_dialog').click(function(){
			$('textarea[name="reply_content"]').removeClass('warm');
			$('#t_dialog').fadeOut();
		}
	);
});

/////////////////////////////
//comments and reply



function check_content(tag){
	var content;
	if(tag=='reply'){
		content = $('textarea[name="reply_content"]').val();
	} else {
		content = $('textarea[name="comment_content"]').val();
	}
	
	if(content == ""){
		return false;
	} else {
		return true;
	}
}

//tag为reply增加回复，tag为comment增加留言
function add_comment(tag, content){
	
	var id = $("input[name='comment_id']").val();
	var username = $("#user").attr("value");
	var userpic = $("#userpic").attr("value");
	var cmp_avatar = '<div class="avatar2">' + user_photo + '</div>';
	var cmp_avatar0 = '<div class="avatar">' + user_photo + '</div>';
	
	var cmp_info = '<span><a href=\"' + space_url + '\">' + user_name + '</a></span><span class="date">刚刚</span><br>';
	var cmp_content = '<p>' + content + '</p>';
	var cmp_content0= '<p>' + content + '</p>';
	
	var cmp_reply = '<div class="comment_box comment_reply">' + cmp_avatar + '<div class="reply w540">' + cmp_info + cmp_content + '</div><div class="clear_comment"></div></div><div class="clear_comment"></div>';
	var cmp_comment = '<li><div class="comment_box">' + cmp_avatar0 + '<div class="reply w600">' + cmp_info + cmp_content0 + '</div><div class="clear_comment"></div></div><div class="clear_comment"></div></li>';
	
	if(tag == 'reply'){
		$('#' + id).parent().parent().parent().append(cmp_reply);
	} else {
		$('.comments').append(cmp_comment);
	}

}
//support <br>
function add_br(str){
	var reg = new RegExp("\n","g"); 
	str = str.replace(reg,"<br>");
	return str; 
}

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