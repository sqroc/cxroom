$(document).ready(function(){
	$('.pre_box').hover(function(){
		$(this).children('.slide').slideDown('fast');
	}, function(){
		$(this).children('.slide').slideUp('fast');
	});
})
