$(document).ready(function(){
	drag_dialog(110, 150, function(x){
		
	});
	
	reply_dialog();
	//auto_height();
})

function auto_height(){
	$('#dragwidth').css('height', 'auto');
	var h = $('#dragwidth').height();
	$('#dragwidth').css('height', h);
}

function drag_dialog(l, r, func){
	var flag_move=false;
	var dx, px;
	var init_x,init_l_w,init_r_w;
	var handle = '#draghandle';
	
	init_handle();
	
	function init_handle(){
		var tmp = '<div id="draghandle" > <\/div>';
		$('body').append(tmp);
		var l = parseInt($('#dragright').position().left) - 12;
		$(handle).css({'left':l, 'top':300, 'display':'block'});
	}
		
    px=parseInt($(handle).css("left"));
    init_x = parseInt($(handle).css('left'));
	init_l_w = parseInt($('#dragleft').css('width'));
	init_r_w = parseInt($('#dragright').css('width'));

    $(handle).mousedown(function(e){
        flag_move=true;
        dx=e.pageX-parseInt($(handle).css("left"));
       
    });
    
    $(document).mousemove(function(e){
        if(flag_move){
            var x=e.pageX-dx;
            var d_l_w = init_l_w + x - px;
			var d_r_w = init_r_w - x + px;
			if(x-px < r && x-px > -l){
				$(handle).css({left:x});
		 		$('#dragright').css('width', d_r_w);
				$('#dragleft').css('width', d_l_w);	
			}
            func(x - px);
        }
    }).mouseup(function(){
    	flag_move=false;
    	
  	});
}

//alert reply dialog
function reply_dialog(){
	$('.reply_button').click(function(){
		var name = $(this).parents('.op').find('.name').text();
		var id = $(this).parents('.op').attr('rel');
		var rc = $(this).parents('.op').find('p').text();
		
		$("input[name='comment_id']").val(id);
		
		var content = '<div class="qt">' + rc +'</div><textarea name="comment_content" id="reply_content" style="width:488px;height:160px;margin:0;"></textarea>';
		dialog('回复给 ' + name, content, function(){
			//ajax update
			send_reply();//in file topic.php
			//ajax end
			remove_dialog();
		});
	});
}

//add comments
function add_comment(cid, flag, content){
	var tmp_avatar = '<div class="avatar"><a href="' + USER_URL + '">' + USER_PHOTO + '</a></div>';
	var tmp_comment = '<li><div class="op op1">' + tmp_avatar + '<span class="name"><a href="' + USER_URL + '">' + USER_NAME + '</a></span><span class="date">刚刚</span><br/><p>' + content + '</p></div></li>';
	var tmp_reply = '<div class="op op2"><span class="name"><a href="' + USER_URL + '">' + USER_NAME + '</a></span><span class="date">刚刚</span><br/><p>' + content + '</p></div>';
	
	if(flag == 'reply'){
		$('#c_' + cid).parent().append(tmp_reply);
	} else {
		$('#comments').prepend(tmp_comment);
	}
}
