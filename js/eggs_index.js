$(document).ready(function() {
	$('.more').mouseover(function() {
		$(this).css('background', '#86DA00');
	});

	$('.more').mouseout(function() {
		$(this).css('background', '#66CC00');
	});
	bor_box();
});

function bor_box(){
	$('.ibox').hover(function(){
		$(this).addClass('bor_c');
		$(this).parent().css('border','2px #eee solid');
	}, function(){
		$(this).removeClass('bor_c').addClass('bor_normal');
		$(this).parent().css('border','2px #f2f2f2 solid');
	});
}

$(document).ready(function(){
	start_box();
});

function start_box(){
	var boxes = $('.ibox_shadow');
	var n = 0;
	var t1 = 20;
	var t2 = 20;
	var t3 = 20;
	var t4 = 20;
	
	boxes.each(function(){

		if(n%4==0){
			$(this).css({'position':'absolute','left':'0px','top':t1+'px'});
			t1 = $(this).position().top + $(this).height() + 20;
		}
		if(n%4==1){
			$(this).css({'position':'absolute','left':'245px','top':t2+'px'});
			t2= $(this).position().top + $(this).height() + 20;
		}
		if(n%4==2){
			$(this).css({'position':'absolute','left':'490px','top':t3+'px'});
			t3 = $(this).position().top + $(this).height() + 20;
		}
		if(n%4==3){
			$(this).css({'position':'absolute','left':'735px','top':t4+'px'});
			t4 = $(this).position().top + $(this).height() + 20;
		}
		n++;
		var ch = max(t1,t2,t3,t4);
		$('#ibox_box').css('height',ch+'px');
	});
	function max(a,b,c,d){
		var n=4;
		var m = a;
		var arr = new Array();
		arr[0] = a;
		arr[1] = b;
		arr[2] = c;
		arr[3] = d;
		while(n--){
			if(arr[n]>m){
				m = arr[n];
			}
		}
		return m;
	}
}



