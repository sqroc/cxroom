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
		var mid = f.parent().attr('id');
		if(r.length <= 0){
			var s = '<div class="reply_box"><div class="reply_text"><textarea name="reply_content" id="reply_content" class="textbox"></textarea><span class="sendpm sendbutton little_button" id="' + promid +'">发布评论</span></div><div class="reply_info"></div></div>';
			f.append(s);	
			f.find('.reply_info').html('');
			send_reply();
			var url = BASE_URL + 'projects/getProjectmessage_reply';
			$.get(url, {
					promid : mid
			}, function(data){
				var tmp = "";
				var c = ""	;
					for(var i = 0; i<data.length; i++){
						if(data[i].ctype == '1'){
							c = '<img src="'+ BASE_URL +'images/c/c_personal_little.gif" />'; 
						} else if(data[i].ctype == '2'){
							c = '<img src="'+ BASE_URL +'images/c/c_team_little.gif" />'; 
						} else {
							c = "";
						}
						tmp += '<li><span class="rname"><a class="user_hover" rel="'+data[i].uid+'" href="'+ BASE_URL + 'user_space/uid/' + data[i].uid +'">' + data[i].username + '</a> '+c+'</span><p>'+data[i].pmrecontent+'</p><span class="date">'+getTimeStamp(data[i].redate)+'</span></li>'
					}
					f.find('.reply_info').html('<ul>' + tmp + '</ul>');
					userinfo();
			}, 'json');
			
		} else if(f.find('.reply_box').css('display') == 'none'){
			r.css('display', 'block');
		} else {
			r.css('display', 'none');
		}
	});
}

function getTimeStamp(ss)
{
    // 声明变量。
    var s =ss;
    var d;

    // 创建 Date 对象。
    d = new Date();
    s = d.getFullYear() + "-";
    s += ("0"+(d.getMonth()+1)).slice(-2) + "-";
    s += ("0"+d.getDate()).slice(-2) + " ";
    s += ("0"+d.getHours()).slice(-2) + ":";
    s += ("0"+d.getMinutes()).slice(-2) + ":";
    s += ("0"+d.getSeconds()).slice(-2) + "";
   // s += ("00"+d.getMilliseconds()).slice(-3);

    return s;
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
