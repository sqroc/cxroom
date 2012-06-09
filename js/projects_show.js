$(document).ready(function(){
	tabs();
	userinfo();
	add_reply();
})

function tabs(){
	$('.tab').click(function(){
		t = $(this);
		id = t.attr('id');
		$('.tab').removeClass('current').addClass('normal');
		t.addClass('current');
		$('.box_tab').css('display', 'none');
		$('#box_'+id).css('display', 'block');
	});
}

function add_reply(){
	$('.write_reply').click(function(){
		var t = $(this);
		var f = t.parent().parent();
		var r = f.find('.reply_box');
		var promid = $(this).attr('id');
		if(r.length <= 0){
			var s = '<div class="reply_box"><div class="reply_text"><textarea name="reply_content" id="reply_content" class="textbox"></textarea><span class="sendpm sendbutton little_button" id="' + promid +'">发布评论</span></div><div class="reply_info"></div></div>';
			f.append(s);	
			f.find('.reply_info').html('');
			send_reply();
		} else if(f.find('.reply_box').css('display') == 'none'){
			r.css('display', 'block');
		} else {
			r.css('display', 'none');
		}
	});
}

function check_content(content){
	var c = clear_trim(content);
	if(c == ""){
		alert('请填写内容');
		return false;
	} else {
		return true;
	}
}
