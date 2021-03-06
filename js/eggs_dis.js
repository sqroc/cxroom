//reply 
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
	
	$('.support').hover(function(){
		$(this).addClass('support_hover');
	}, function(){
		$(this).removeClass('support_hover');
	});
	

	$('.dis_box').hover(function(){
		$(this).children('.reply').children('.reply_button').css('display', 'inline');
	}, function(){
		$(this).children('.reply').children('.reply_button').css('display', 'none');
	});
	userinfo();
	//$('.author').css('height',$('.topic_box').height());
});

$(document).ready(function(){
		$('.reply_button').click(function(){
			var id = $(this).attr('id');
			$("input[name='comment_id']").val(id);
			var user = $(this).parent().children(':first').text();
			var url = $(this).parent().children(':first').children('a').attr('href'); 
			$('.replyto').text("回复给 "+user);
			$('#u_name').val(user);
			$('#u_url').val(url);
			var offset = $(this).offset();
			var left = offset.left + 0 ;
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

function check_content(content){
	if(content ==""){
		return false;
	} else {
		return true;
	}
}

//tag为reply增加回复，tag为comment增加留言
function add_comment(obj, tag, content){
	
	var id = $("input[name='comment_id']").val();
	var cmp_avatar = '<div class="avatar2">' + USER_PHOTO + '</div>';
	var cmp_avatar0 = '<div class="avatar">' + USER_PHOTO + '</div>';

	var cmp_info = '<span><a href=\"' + USER_URL + '\">' + USER_NAME + '</a></span><span class="date">刚刚</span><br>';
	var cmp_content = '<p>' + content + '</p>';
	
	var cmp_reply = '<div class="dis_box dis_reply">' + cmp_avatar + '<div class="reply w540">' + cmp_info + cmp_content + '</div><div class="clear_comment"></div></div><div class="clear_comment"></div>';
	var cmp_comment = '<li><div class="dis_box">' + cmp_avatar0 + '<div class="reply w600">' + cmp_info + cmp_content + '</div><div class="clear_comment"></div></div><div class="clear10_comment"></div></li>';
	
	if(tag == 'reply'){
		$('#' + id).parent().parent().parent().append(cmp_reply);
	} else {
		$('#'+obj).prepend(cmp_comment);
	}

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