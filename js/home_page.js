$(document).ready(function(){
	$('.h_title').toggle(function(){
		$('.box_shadow').animate({marginTop:'0px',marginBottom:'0px'},'normal');
		$('.h_content').slideDown();
	}, function(){
		$('.box_shadow').animate({marginTop:'160px',marginBottom:'160px'},'normal');
		$('.h_content').slideUp();
	});
	$('.h_title_p').hover(function(){
		$(this).removeClass('h_title_p').addClass('h_title_p_hover');
	}, function(){
		$(this).removeClass('h_title_p_hover').addClass('h_title_p');
	});
	
	$('.h_title_e').hover(function(){
		$(this).removeClass('h_title_e').addClass('h_title_e_hover');
	}, function(){
		$(this).removeClass('h_title_e_hover').addClass('h_title_e');
	});
});
