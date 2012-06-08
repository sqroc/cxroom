//提交信息过滤
function add_br(str){
	var reg = new RegExp("\n","g"); 
	str = str.replace(reg,"<br />");
	return str; 
}

function remove_n(str){
	var reg = new RegExp("\n","g"); 
	str = str.replace(reg," ");
	return str; 
}
//去除空格
function l_trim(s) { 
 	return s.replace(/(^\s*)/g, ''); 
}

function r_trim(s) { 
	return s.replace(/(\s*$)/g, ''); 
}

function clear_trim(s){ 
	return r_trim(l_trim(s));  
}
//hovepop
function t_hoverpop(father, content){
    var f = father;
    var tmp_c = content;
    var h_tmp_c = 0;
    var f_h = f.height();
    var f_w = f.width();
    
    var w = $(window).width()/2;
    var h = $(window).height()/2;
    var top = f.offset().top;
    var left = f.offset().left;
    var s_top = $(document).scrollTop();
    var s_left = $(document).scrollLeft();
    
    var tmp_arrow = "";
    var a_class = "a_l_t";
    var tmp = "";
    
    var l = 0;
    var t = 0;
    
    if((left-s_left) < w){
        if((top-s_top) < h){
            a_class = "a_l_t";
            l = left - 40 + f_w/2;
            t = top + f_h + 15;
        } else {
            a_class = "a_l_b";
            l = left - 40 + f_w/2;
            t = top - h_tmp_c - 20;
        }
    } else {
        if((top-s_top) < h){
            a_class = "a_r_t";
            l = left - 310 + f_w/2;
            t = top + f_h + 15;
        } else {
            a_class = "a_r_b";
            l = left - 310 + f_w/2;
            t = top - h_tmp_c - 20;
        }
    }
    
    tmp_arrow = '<div class=\"' + a_class + '\"><\/div>';
    
    tmp = '<div class="preview" style="display:none">' + tmp_arrow +'<div class="pre_box">' + tmp_c + '<\/div><\/div>';
        
    $('body').append(tmp);
    
    if( (a_class == 'a_r_b') || (a_class == 'a_l_b') ){
        t = t - $('.preview').height();
    }
    
    $('.preview').css({
        'left'      :l, 
        'top'       :t, 
        'display'   :'block'
    });
    
}   

function t_remove_hoverpop(){
   
    var timer = setTimeout(function(){
         $('.preview').remove();     
    },150);
   
    $('.preview').hover(function(){
        clearTimeout(timer);
    }, function(){
        $(this).remove();
    });
}

function t_fresh_hoverpop(content){
	$('.pre_box').html(content);
}

//
function userinfo(){
	var timer;
	var temp = "";
	var temp2 = '<div class="puser"><img src="'+BASE_URL+'images/common/loading.gif"/></div>';
	$('.user_hover').hover(function(){
		var parent = $(this);
		timer = setTimeout(function(){		
			t_hoverpop(parent, temp2);
			var url = BASE_URL + 'user_space/userinfo_api/' + parent.attr('rel');
			$.getJSON(url, function(json){
				var c = "";
				
				if(json.ctype == '1'){
					c = '<img src="'+BASE_URL+'images/c/c_personal_little.gif" />';
				} else if(json.ctype == '2'){
					c = '<img src="'+BASE_URL+'images/c/c_team_little.gif" />';
				} else {
					
				}
				
				var skill_list ="";
				
				var skills = json.skills;
				if(skills != ""){
					if(skills.length > 1){
						for(var i = 0; i< 2; i++){
						skill_list += skills[i] + ', ';
						}		
					} else {
						skill_list += skills[0];
					}
					
					if(skills.length > 2){
						skill_list += '....'	
					}
				} else {
					skill_list = "又是一个没技能的家伙";
				}
				
				
				var avatar_tmp = '<div class="pavatar"><img src="'+BASE_URL+ json.avatar +'"/></div>';
				var info_tmp = '<div class="pinfo"><span class="name">'+ json.name + '</span>' + c +"  "+ json.gender +json.province + '<br/><p>简介:'+json.intro+'<br/>技能:' +skill_list+'</p></div>';
				var point_tmp = ' <div class="ppoint">人气<span>'+json.hot+'</span>身价<span>'+json.points[0]+'</span>创新<span>'+json.points[3]+'</span>活跃<span>'+json.points[2]+'</span>贡献<span>'+json.points[1]+'</span></div>';
				
				temp = '<div class="puser">'+avatar_tmp+info_tmp+point_tmp+'</div>';
				t_fresh_hoverpop(temp);
			
			});
			
		}, 500);
				
	}, function(){
		clearTimeout(timer);
		t_remove_hoverpop();
	});
}

//////////////
//warm dialog
function warm_dialog(tag, msg){
	
	var left = $('body').width()/2-160;
	var t = document.documentElement.scrollTop || document.body.scrollTop;
	var top = $(window).height()/2-80;
	//top = parseInt(top) + parseInt(ｔ);

	$('body').append('<div id="warm_dialog" style="display:none;"><div class="box"><div id="t_content"><p></p></div></div></div>');
	$('#t_content').html(msg).addClass(tag);
	
	$('#warm_dialog').css({"left":left,"top":top+t});
	
	$('#warm_dialog').fadeIn();
	
	setTimeout(hide_warm_dialog,2000);
}


function hide_warm_dialog(){
	$('#warm_dialog').fadeOut();
	$('#warm_dialog').remove();
}

//poplistmenu
function t_popmenu(father, content, width){	
	var f = father;
	var i = f.attr('id');
	var f_h = f.height();
    var top = f.offset().top;
    var left = f.offset().left;
     
    if($('#t_slide_'+i).length == 0){
    	$('body').append('<div class="t_slide_menu" id="t_slide_' + i + '" style="display:none;width:' + width + 'px;">' + content + '</div>');
	    $('#t_slide_'+i).css({
	    	'left'	: 	left,
	    	'top' 	: 	top + f_h + 10
	    }).slideDown('fast');		
    } else {
    	if($('#t_slide_'+i).css('display') == 'none'){
    		$('#t_slide_'+i).slideDown('fast');	
    	} else {
    		$('#t_slide_'+i).slideUp('fast');	
    	}
    	
    }
    
    
    $('body').click(function(){
    	$('.t_slide_menu').slideUp('fast');
    });
}
