//alert box
function alertbox(tag, info, mode , w){
	w = arguments[3]?arguments[3]:300;
	
	if($('#alertbox').length > 0){
		$('#alertbox').remove();
	}
	
	var tmp = "";
	if(tag == 'sending'){
		tmp = '<div id="alertbox" class="' + tag + '" style="width:' + w + 'px;display:none;"><span><img src="' + BASE_URL + '/images/common/sending.gif" /></span> ' + info + '</div>';	
	} else {
		tmp = '<div id="alertbox" style="width:' + w + 'px;display:none;"><div class="' + tag + '"></div>' + info + '</div>';
	}
	
	$('body').append(tmp);
	var left = $(window).width()/2-$('#alertbox').width()/2;
	$('#alertbox').css({'left':left});
	
	$('#alertbox').slideDown('fast');
		
	if(mode == 'flash'){
		setTimeout(hide_alertbox,2000);	
	} 
	
	function hide_alertbox(){
		$('#alertbox').slideUp('fast');
		setTimeout(function(){
			$('#alertbox').remove();
		},600);
	}
}

//dialog
function dialog(title, content, func, w){
	w = arguments[3]?arguments[3]:500;
	var tmp_title = '<div id="dialog_title"><h3>' + title + '</h3><div class="close" id="close_dialog"></div></div>';
	var tmp_dock = '<div class="dialog_dock"><div class="blue_button dock_button close">取 消</div><div class="blue_button dock_button" id="dialog_yes">确 定</div></div>';
	var tmp = '<div id="hide_layout"><div id="dialog" style="width:' + w + 'px;">' + tmp_title + content + tmp_dock + '</div></div>';
	
	$('body').append(tmp);
	
	var h = $(document).height();
	var top = $(window).height()/2-$('#dialog').height()/2;
	var left = $(window).width()/2-$('#dialog').width()/2;
	//alert(top+left);
	
	$('#dialog').css({'margin-left' : left, 'margin-top' : top});
	
	
	$('.close').click(function(){
		$('#hide_layout').remove();
	});
	
	$('#dialog_yes').click(function(){
		func();
	});
}

function remove_dialog(){
	$('#hide_layout').remove();
}

//commemts
function init_comment(func){
	
	$('#comment_send').click(function(){
		if($('textarea[name="comment_content"]').val().length < 50){
			warm('请输入至少50个字节长度');
		} else {
			func();
		}
		return false;
	});
	
	$('body').click(function(){
		$('#comment_warm').slideUp('fast');
	});
	
	function warm(text){
		$('#comment_warm').text(text);
		$('#comment_warm').slideDown('fast');
	}
}

//tabs
function init_tabs(func){
	$('#tabs').find('li').click(function(){
		var i = $(this).attr('id');
		$('#tabs').find('li').removeClass('current');
		$(this).addClass('current');
		$('.col_tab').css('display', 'none');
		$('#col_' + i).css('display', 'block');
		func[i]();
	});
}
