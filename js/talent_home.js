$(document).ready(function(){
	
	contact();

	
})

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
