var FLAG_LB = false;
var FLAG_RB = false;
var FLAG_CUR = 0;
var FLAG_PAGE = [false, false, false, false]

function enable_rb(){
	if(FLAG_PAGE[FLAG_CUR]){
		$('#right_button').removeClass('rbf').addClass('rb');
		FLAG_RB = true;
	} else {
		$('#right_button').removeClass('rb').addClass('rbf');
		FLAG_RB = false;
	}
}

function enable_lb(){
	if(FLAG_CUR > 0){
		$('#left_button').removeClass('lbf').addClass('lb');
		FLAG_LB = true;
	} else {
		$('#left_button').removeClass('lb').addClass('lbf');
		FLAG_LB = false;
	}
}

$(document).ready(function(){
	bclick();
	rclick();
	lclick();
	pro_init();
	pre_check();
})

function bclick(){
	$('#left_button').mousedown(function(){
		if(FLAG_LB){
			$(this).removeClass('lb').addClass('lbc');	
		}
	});
	$('#left_button').mouseup(function(){
		if(FLAG_LB){
			$(this).removeClass('lbc').addClass('lb');
		}
	});
	$('#right_button').mousedown(function(){
		if(FLAG_RB){
			$(this).removeClass('rb').addClass('rbc');
		}
	});
	$('#right_button').mouseup(function(){
		if(FLAG_RB){
			$(this).removeClass('rbc').addClass('rb');
		}
	});
}

function select(){
	$('.select_list li').click(function(){
				
		$(this).parent().find('li').removeClass('selected').find('i').remove();
		$(this).addClass('selected').append('<i></i>');
		var val = $(this).find('span').text();
		$('input[name="total_fee"]').val(val);
	});
}

function t_select(obj, items, type){
	
	$('#' + obj).css('display', 'none');
	var op = $('#' + obj).children('input');
	var tmp ="";
	var i = 0;
	op.each(function(){
		tmp += '<li rel="' + $(this).val() + '">' + items[$(this).val()] + '</li>';
		i++;
	});
		
	$('<ul id="ul' + obj + '" class="select_list">' + tmp + '</ul>').insertBefore('#' + obj);
	
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
}

function rclick(){
	$('#right_button').click(function(){
		check();
		
		if(FLAG_RB){
			FLAG_CUR++;
			display('#step_' + FLAG_CUR);	
			enable_lb();
			enable_rb();
		}
		
		if(FLAG_CUR == 0){
			
				pop_dialog('温馨提示', '上传一个头像可以获得更多关注，请先上传头像，再进入下一步', function(){
					
				});
		
		}
	});
}

function lclick(){
	$('#left_button').click(function(){
		if(FLAG_LB){
			FLAG_CUR--;
			display('#step_' + FLAG_CUR);	
			enable_lb();
			enable_rb();
		}
	});
}


function display(obj){
	$('.step').css('display', 'none');
	$(obj).fadeIn();
}

function check(){
	if(FLAG_CUR == 1){
		check_base()
	}
	if(FLAG_CUR == 2){
		check_intro()
	}
	if(FLAG_CUR == 3){
		check_contact();
	}
	enable_rb();
	enable_lb();
}

function check_base(){
	var FLAG_AIM = false;
	var FLAG_ROLE = false;
	
	var aim = $('input[name="aims"]');
	aim.each(function(){
		if($(this).attr('checked')){
			FLAG_AIM = true;
			enable_rb();
			$(this).parents('.info_item').removeClass('item_wrong');
			//alert('选择了目的')
			return false;
		} else {
			FLAG_AIM = false;
			$(this).parents('.info_item').addClass('item_wrong');
			aim.parent
			//alert('未选择目的')
		}
	});
	
	if($('input[name="role"]:checked').val() != null){
		FLAG_ROLE = true;
		$('input[name="role"]').parents('.info_item').removeClass('item_wrong');
		enable_rb();
		//alert(FLAG_ROLE);
	} else {
		FLAG_ROLE = false;
		$('input[name="role"]').parents('.info_item').addClass('item_wrong');
		//alert(FLAG_ROLE);
	}
	
	if($('#p').val() !='请选择省份名' && FLAG_AIM && FLAG_ROLE){
		FLAG_PAGE[1] = true;
		$('#p').parents('.info_item').removeClass('item_wrong');
		enable_rb();
	} else {
		FLAG_PAGE[1] = false;
		$('#p').parents('.info_item').addClass('item_wrong');
	}
}

function check_intro(){
	if($('.i').val().length > 0){
		FLAG_PAGE[2] = true;
		$('#ii').parent().removeClass('item_wrong');	
	} else {
		FLAG_PAGE[2] = false;	
		$('#ii').parent().addClass('item_wrong');	
	}
}

function check_contact(){
	var FLAG_QQ = false;
	var FLAG_MAIL = false;
	var FLAG_PHONE = false;
	var FLAG_MOBILE = false;
	
	if(check_qq($('#qq').val()) ){
		FLAG_QQ = true;
		$('#qq').parent().removeClass('item_wrong');	
	} else {
		FLAG_QQ = false;
		$('#qq').parent().addClass('item_wrong');	
	};
	
	if(check_mail($('input[name="contact_email"]').val()) ){
		FLAG_MAIL = true;
		$('input[name="contact_email"]').parent().removeClass('item_wrong');	
	} else {
		FLAG_MAIL = false;
		$('input[name="contact_email"]').parent().addClass('item_wrong');	
	};
	
	if(check_mobile($('#telphone').val()) ){
		FLAG_MOBILE = true;
		$('#telphone').parent().removeClass('item_wrong');	
	} else {
		FLAG_MOBILE = false;
		$('#telphone').parent().addClass('item_wrong');
	};
	
	if(check_phone($('#province').val(), $('#phone_number').val()) ){
		FLAG_PHONE = true;
		$('#phone_number').parent().removeClass('item_wrong');	
	} else {
		FLAG_PHONE = false;
		$('#phone_number').parent().addClass('item_wrong');
	};
	
	if(FLAG_QQ && FLAG_MAIL && FLAG_PHONE && FLAG_MOBILE){
		FLAG_PAGE[3] = true;	
	} else {
		FLAG_PAGE[3] = false;
	}
	
}


function pre_check(){
	$('.i').keyup(function(){
		check_intro();
		enable_rb();
	});
	
	$('input[name="contact_email"]').change(function(){
		if(!check_mail($(this).val())){
			$('input[name="contact_email"]').parent().addClass('item_wrong');	
		} else {
			$('input[name="contact_email"]').parent().removeClass('item_wrong');	
		}
	});
	
	$('#qq').change(function(){
		if(!check_qq($(this).val())){
			$('#qq').parent().addClass('item_wrong');	
		} else {
			$('#qq').parent().removeClass('item_wrong');	
		}
	});
	
	$('#telphone').change(function(){
		if(!check_mobile($(this).val())){
			$('#telphone').parent().addClass('item_wrong');	
		} else {
			$('#telphone').parent().removeClass('item_wrong');	
		}
	});
	
	$('#province').change(function(){
		if(!check_phone($(this).val(), $('#phone_number').val())){
			$('#province').parent().addClass('item_wrong');	
		} else {
			$('#province').parent().removeClass('item_wrong');	
		}
	});
	
	$('#phone_number').change(function(){
		if(!check_phone($('#province').val(), $(this).val())){
			$('#phone_number').parent().addClass('item_wrong');	
		} else {
			$('#phone_number').parent().removeClass('item_wrong');	
		}
	});
	
}

function check_qq(qq){
	var reg =/^\d*$/;
	if(reg.test(qq) || qq=="")
	{
		return true;
	} 
	return false;
}

function check_phone(pro, ph){
	var reg1 = /^\d*$/;
	var reg =/^\d*$/;
	
	if( reg1.test(pro) && reg.test(ph) )
	{
		$('#phone').val(pro+'-'+ph);
		return true;
	} 
	else if(pro=="" && ph=="")
	{
		$('#phone').val(pro+'-'+ph);
		return true;
	} else {
		return false;
	}
}

function check_mobile(mobile){
	var reg =/^\d{11}$/;
	if(reg.test(mobile) || mobile=="")
	{
		return true;
	} 
	return false;
}

function check_mail(mail){
	var reg =/^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
	if(reg.test(mail) || mail=="")
	{
		return true;
	} 
	return false;
}

///
var where = new Array(35);
function comefrom(loca,locacity) { this.loca = loca; this.locacity = locacity; }
where[0]= new comefrom("请选择省份名","请选择城市名");
where[1] = new comefrom("北京","|东城|西城|崇文|宣武|朝阳|丰台|石景山|海淀|门头沟|房山|通州|顺义|昌平|大兴|平谷|怀柔|密云|延庆");
where[2] = new comefrom("上海","|黄浦|卢湾|徐汇|长宁|静安|普陀|闸北|虹口|杨浦|闵行|宝山|嘉定|浦东|金山|松江|青浦|南汇|奉贤|崇明");
where[3] = new comefrom("天津","|和平|东丽|河东|西青|河西|津南|南开|北辰|河北|武清|红挢|塘沽|汉沽|大港|宁河|静海|宝坻|蓟县");
where[4] = new comefrom("重庆","|万州|涪陵|渝中|大渡口|江北|沙坪坝|九龙坡|南岸|北碚|万盛|双挢|渝北|巴南|黔江|长寿|綦江|潼南|铜梁|大足|荣昌|壁山|梁平|城口|丰都|垫江|武隆|忠县|开县|云阳|奉节|巫山|巫溪|石柱|秀山|酉阳|彭水|江津|合川|永川|南川");
where[5] = new comefrom("河北","|石家庄|邯郸|邢台|保定|张家口|承德|廊坊|唐山|秦皇岛|沧州|衡水");
where[6] = new comefrom("山西","|太原|大同|阳泉|长治|晋城|朔州|吕梁|忻州|晋中|临汾|运城");
where[7] = new comefrom("内蒙古","|呼和浩特|包头|乌海|赤峰|呼伦贝尔盟|阿拉善盟|哲里木盟|兴安盟|乌兰察布盟|锡林郭勒盟|巴彦淖尔盟|伊克昭盟");
where[8] = new comefrom("辽宁","|沈阳|大连|鞍山|抚顺|本溪|丹东|锦州|营口|阜新|辽阳|盘锦|铁岭|朝阳|葫芦岛");
where[9] = new comefrom("吉林","|长春|吉林|四平|辽源|通化|白山|松原|白城|延边");
where[10] = new comefrom("黑龙江","|哈尔滨|齐齐哈尔|牡丹江|佳木斯|大庆|绥化|鹤岗|鸡西|黑河|双鸭山|伊春|七台河|大兴安岭");
where[11] = new comefrom("江苏","|南京|镇江|苏州|南通|扬州|盐城|徐州|连云港|常州|无锡|宿迁|泰州|淮安");
where[12] = new comefrom("浙江","|杭州|宁波|温州|嘉兴|湖州|绍兴|金华|衢州|舟山|台州|丽水");
where[13] = new comefrom("安徽","|合肥|芜湖|蚌埠|马鞍山|淮北|铜陵|安庆|黄山|滁州|宿州|池州|淮南|巢湖|阜阳|六安|宣城|亳州");
where[14] = new comefrom("福建","|福州|厦门|莆田|三明|泉州|漳州|南平|龙岩|宁德");
where[15] = new comefrom("江西","|南昌市|景德镇|九江|鹰潭|萍乡|新馀|赣州|吉安|宜春|抚州|上饶");
where[16] = new comefrom("山东","|济南|青岛|淄博|枣庄|东营|烟台|潍坊|济宁|泰安|威海|日照|莱芜|临沂|德州|聊城|滨州|菏泽");
where[17] = new comefrom("河南","|郑州|开封|洛阳|平顶山|安阳|鹤壁|新乡|焦作|濮阳|许昌|漯河|三门峡|南阳|商丘|信阳|周口|驻马店|济源");
where[18] = new comefrom("湖北","|武汉|宜昌|荆州|襄樊|黄石|荆门|黄冈|十堰|恩施|潜江|天门|仙桃|随州|咸宁|孝感|鄂州");
where[19] = new comefrom("湖南","|长沙|常德|株洲|湘潭|衡阳|岳阳|邵阳|益阳|娄底|怀化|郴州|永州|湘西|张家界");
where[20] = new comefrom("广东","|广州|深圳|珠海|汕头|东莞|中山|佛山|韶关|江门|湛江|茂名|肇庆|惠州|梅州|汕尾|河源|阳江|清远|潮州|揭阳|云浮");
where[21] = new comefrom("广西","|南宁|柳州|桂林|梧州|北海|防城港|钦州|贵港|玉林|南宁地区|柳州地区|贺州|百色|河池");
where[22] = new comefrom("海南","|海口|三亚");
where[23] = new comefrom("四川","|成都|绵阳|德阳|自贡|攀枝花|广元|内江|乐山|南充|宜宾|广安|达川|雅安|眉山|甘孜|凉山|泸州");
where[24] = new comefrom("贵州","|贵阳|六盘水|遵义|安顺|铜仁|黔西南|毕节|黔东南|黔南");
where[25] = new comefrom("云南","|昆明|大理|曲靖|玉溪|昭通|楚雄|红河|文山|思茅|西双版纳|保山|德宏|丽江|怒江|迪庆|临沧");
where[26] = new comefrom("西藏","|拉萨|日喀则|山南|林芝|昌都|阿里|那曲");
where[27] = new comefrom("陕西","|西安|宝鸡|咸阳|铜川|渭南|延安|榆林|汉中|安康|商洛");
where[28] = new comefrom("甘肃","|兰州|嘉峪关|金昌|白银|天水|酒泉|张掖|武威|定西|陇南|平凉|庆阳|临夏|甘南");
where[29] = new comefrom("宁夏","|银川|石嘴山|吴忠|固原");
where[30] = new comefrom("青海","|西宁|海东|海南|海北|黄南|玉树|果洛|海西");
where[31] = new comefrom("新疆","|乌鲁木齐|石河子|克拉玛依|伊犁|巴音郭勒|昌吉|克孜勒苏柯尔克孜|博尔塔拉|吐鲁番|哈密|喀什|和田|阿克苏");
where[32] = new comefrom("香港","");
where[33] = new comefrom("澳门","");
where[34] = new comefrom("台湾","|台北|高雄|台中|台南|屏东|南投|云林|新竹|彰化|苗栗|嘉义|花莲|桃园|宜兰|基隆|台东|金门|马祖|澎湖");
where[35] = new comefrom("其它","|北美洲|南美洲|亚洲|非洲|欧洲|大洋洲");

function pro_select() {
	with(document.creator.province) { 
			var loca2 = options[selectedIndex].value; }
	for(i = 0;i < where.length;i ++) {
		if (where[i].loca == loca2) {
			loca3 = (where[i].locacity).split("|");
			for(j = 0;j < loca3.length;j++) { with(document.creator.city) { length = loca3.length; options[j].text = loca3[j]; options[j].value = loca3[j]; var loca4=options[selectedIndex].value;}}
			break;
	}}
	document.creator.newlocation.value=loca2 + '-' + loca4;
} 
function pro_init() {
	with(document.creator.province) {
		length = where.length;
		for(k=0;k<where.length;k++) { options[k].text = where[k].loca; options[k].value = where[k].loca; }
		options[selectedIndex].text = where[0].loca; options[selectedIndex].value = where[0].loca;
	}
	with(document.creator.city) {
		loca3 = (where[0].locacity).split("|");
		length = loca3.length;
		for(l=0;l<length;l++) { options[l].text = loca3[l]; options[l].value = loca3[l]; }
		options[selectedIndex].text = loca3[0]; options[selectedIndex].value = loca3[0];
}}