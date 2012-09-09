$(document).ready(function(){
	hover_pop();
	target();
	contact();
	//test();
	getmore();
	
})

var FLAG_ALL = true;
var FLAG_MORE = 9;

function getmore(){
	$('#getmore').click(function(){
		var t = $(this);
		$(this).text('加载中....');
		var url = BASE_URL + "/talent/search_condition";
		$.post(url, {
			gender : $("input[name='g']:checked").val(),
			role : $("input[name='role']:checked").val(),
			offset : FLAG_MORE,
			num : 9,

		}, function(data) {
			t.text('查看更多↓');
			
			if(data == 'nodata'){
				warm_dialog('no', '抱歉，没有更多了');
				
			} else {
				$('.list_container').append(data);	
				FLAG_MORE += 9;
			}
			
			
		}, "html");
	});
}

function test(obj){

	$('#' + obj).click(function(){
		var url = BASE_URL + "/talent/search_condition";
		FLAG_ALL = false;
		//alert('aa');
		var gender = $("input[name='g']:checked").val();
		var role = $("input[name='role']:checked").val();
		
		
		$.post(url, {
					gender : gender,
					role : role,
					offset : 0,
					num : 10,

				}, function(data) {
					if(data != "nodata"){
						$('#list').html(data);		
					} else {
						warm_dialog('no', '抱歉，当前条件下没有数据');
					}
					
				}, "html");
		
	});
}

function contact(){
	$('.c').click(function(){
		var name = $(this).attr('title');
		var id = $(this).parent().attr('rel');
		var tmp = $('#contact_form').html();
		pop_dialog('联系 ' + name + id, tmp , function(){
			warm_dialog('ok', '发送成功');
		});
	});
}


function add(){
	
}

function hover_pop(){
	$('.talent').hover(function(){
		$(this).find('.tabs').css('display', 'block');
	}, function(){
		$(this).find('.tabs').css('display', 'none');
	})
}


function target(){
	$('#find_talent').click(function(){
		window.open(BASE_URL + 'talent' , '_self');
	});
	$('#find_new').click(function(){
		window.open(BASE_URL + 'talent/newtalent' , '_self');
	});
	$('#find_friend').click(function(){
		window.open(BASE_URL + 'talent/friends' , '_self');
	});
}


function t_select(obj, items, type, title){
	
	$('#' + obj).css('display', 'none');
	var op = $('#' + obj).children('input');
	var tmp ="";
	var i = 0;
	op.each(function(){
		if($(this).attr('checked')){
			tmp += '<li class="selected" rel="' + $(this).val() + '">' + items[$(this).val()] + '</li>';
		} else {
			tmp += '<li rel="' + $(this).val() + '">' + items[$(this).val()] + '</li>';
		}
			
		i++;
	});
		
	$('<div class="select_box"><span class="kind">' + title + ':</span><ul id="ul' + obj + '" class="select_list">' + tmp + '</ul></div>').insertBefore('#' + obj);
	
	$('#ul' + obj).find('li').click(function(){
		
		var l = $(this);
		
		if(type == 'radio'){
			$(this).parent().find('li').removeClass('selected').find('i').remove();
			$(this).addClass('selected').append('<i></i>');
			op.each(function(){
				if($(this).val() == l.attr('rel')){
					
					$(this).attr('checked', true);
				} 
			});
			
		} else {
			op.each(function(){
				if($(this).val() == l.attr('rel') ){
					if($(this).attr('checked')){
						
						$(this).removeAttr('checked');	
						l.removeClass('selected').find('i').remove();
					} else {
						
						$(this).attr('checked', true);	
						l.addClass('selected').append('<i></i>');
					}				
				} 
			});
		}
		check_base();
	});
	
	test('ul' + obj);
}