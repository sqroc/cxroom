$(document).ready(function(){
	
	p_box();
	slidedown_menu();
	help();
});

function p_box(){
	var timer;
	$('.p_box').hover(function(){
		var f = $(this);
		timer = setTimeout(function(){
			f.find('h3').css('height', 'auto');
			f.find('p').css('height', 'auto');
		}, 500);
		
	}, function(){
		clearTimeout(timer);
		$(this).find('h3').css('height', '15px');
		$(this).find('p').css('height', '66px');
		
	});
}

function slidedown_menu(){
	$('.mypro').click(function(){
		var tmp = "";
		var father = $(this);
		if(father.attr('id') == 'p1'){
			tmp = '<ul class="slide_ul_1">' + mypro + '</ul>'
		} else {
			tmp = '<ul class="slide_ul_1">' + myfavpro + '</ul>'
		}
		
	
		t_popmenu(father, tmp, 140);	
		
		return false;
	});
}

//help
function help(){
	var tag = true;
	$('#whatsthis').click(function(){
		if(tag){
			$('#help').html('<img src="' + BASE_URL + 'images/projects/help.gif" />');
			tag = false;
		}
		$('#help').toggle('2000');
		return false;
	});
	
	$('body').click(function(){
		$('#help').slideUp('fast');
	});
}
