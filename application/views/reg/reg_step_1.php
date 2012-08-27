<div class="container">
	<div class="reg_level">
		您当前的资料价值评级为<span>甲级</span>，可以查看<span>80%</span>的他人资料
		
	</div>
</div>
<div class="container" style="margin-bottom:40px;overflow:hidden;">
	<div class="guide_button">
		<div id="left_button" class="lbf">
				
		</div>
	</div>
	<!--
	<input type="hidden" name="uid" id="uid" value="<?=$uid?>"/>
	-->
	<div class="mid_box">
		<!--step1 base_info-->
		<div class="step" id="step_1" style="display:none">
			<div class="info_item info_item_bor">
				<h3 class="help">请选择你所在的地区</h3>
				<form name="creator" class="mlr20">
				省份 <select id="p" name="province" onChange="pro_select()"></select>　城市 <select id="city" name="city" onChange = "pro_select()"></select>
<input type="hidden" name="newlocation">
				</form>	
				
			</div>
			
			<div class="info_item info_item_bor">
				<h3 class="help">请选择你的出生年月和性别</h3>
				<div class="mlr20">
				生日 
				<select name="Date_Year" id="Date_Year"> 
    <option value="1"> </option> 
  <option label="2012" value="2012">2012</option> 
 <option label="2011" value="2011">2011</option> 
 <option label="2010" value="2010">2010</option> 
 <option label="2009" value="2009">2009</option> 
 <option label="2008" value="2008">2008</option> 
 <option label="2007" value="2007">2007</option> 
 <option label="2006" value="2006">2006</option> 
 <option label="2005" value="2005">2005</option> 
 <option label="2004" value="2004">2004</option> 
 <option label="2003" value="2003">2003</option> 
 <option label="2002" value="2002">2002</option> 
 <option label="2001" value="2001">2001</option> 
 <option label="2000" value="2000">2000</option> 
 <option label="1999" value="1999">1999</option> 
 <option label="1998" value="1998">1998</option> 
 <option label="1997" value="1997">1997</option> 
 <option label="1996" value="1996">1996</option> 
 <option label="1995" value="1995">1995</option> 
 <option label="1994" value="1994">1994</option> 
 <option label="1993" value="1993">1993</option> 
 <option label="1992" value="1992">1992</option> 
 <option label="1991" value="1991">1991</option> 
 <option label="1990" value="1990" selected>1990</option> 
 <option label="1989" value="1989">1989</option> 
 <option label="1988" value="1988">1988</option> 
 <option label="1987" value="1987">1987</option> 
 <option label="1986" value="1986">1986</option> 
 <option label="1985" value="1985">1985</option> 
 <option label="1984" value="1984">1984</option> 
 <option label="1983" value="1983">1983</option> 
 <option label="1982" value="1982">1982</option> 
 <option label="1981" value="1981">1981</option> 
 <option label="1980" value="1980">1980</option> 
 <option label="1979" value="1979">1979</option> 
 <option label="1978" value="1978">1978</option> 
 <option label="1977" value="1977">1977</option> 
 <option label="1976" value="1976">1976</option> 
 <option label="1975" value="1975">1975</option> 
 <option label="1974" value="1974">1974</option> 
 <option label="1973" value="1973">1973</option> 
 <option label="1972" value="1972">1972</option> 
 <option label="1971" value="1971">1971</option> 
 <option label="1970" value="1970">1970</option> 
 <option label="1969" value="1969">1969</option> 
 <option label="1968" value="1968">1968</option> 
 <option label="1967" value="1967">1967</option> 
 <option label="1966" value="1966">1966</option> 
 <option label="1965" value="1965">1965</option> 
 <option label="1964" value="1964">1964</option> 
 <option label="1963" value="1963">1963</option> 
 <option label="1962" value="1962">1962</option> 
 <option label="1961" value="1961">1961</option> 
 <option label="1960" value="1960">1960</option> 
 <option label="1959" value="1959">1959</option> 
 <option label="1958" value="1958">1958</option> 
 <option label="1957" value="1957">1957</option> 
 <option label="1956" value="1956">1956</option> 
 <option label="1955" value="1955">1955</option> 
 <option label="1954" value="1954">1954</option> 
 <option label="1953" value="1953">1953</option> 
 <option label="1952" value="1952">1952</option> 
 <option label="1951" value="1951">1951</option> 
 <option label="1950" value="1950">1950</option> 
 <option label="1949" value="1949">1949</option> 
 <option label="1948" value="1948">1948</option> 
 <option label="1947" value="1947">1947</option> 
 <option label="1946" value="1946">1946</option> 
 <option label="1945" value="1945">1945</option> 
 <option label="1944" value="1944">1944</option> 
 <option label="1943" value="1943">1943</option> 
 <option label="1942" value="1942">1942</option> 
 <option label="1941" value="1941">1941</option> 
 <option label="1940" value="1940">1940</option> 
 <option label="1939" value="1939">1939</option> 
 <option label="1938" value="1938">1938</option> 
 <option label="1937" value="1937">1937</option> 
 <option label="1936" value="1936">1936</option> 
 <option label="1935" value="1935">1935</option> 
 <option label="1934" value="1934">1934</option> 
 <option label="1933" value="1933">1933</option> 
 <option label="1932" value="1932">1932</option> 
 <option label="1931" value="1931">1931</option> 
 <option label="1930" value="1930">1930</option> 
 <option label="1929" value="1929">1929</option> 
 <option label="1928" value="1928">1928</option> 
 <option label="1927" value="1927">1927</option> 
 <option label="1926" value="1926">1926</option> 
 <option label="1925" value="1925">1925</option> 
 <option label="1924" value="1924">1924</option> 
 <option label="1923" value="1923">1923</option> 
 <option label="1922" value="1922">1922</option> 
 <option label="1921" value="1921">1921</option> 
 <option label="1920" value="1920">1920</option> 
 <option label="1919" value="1919">1919</option> 
 <option label="1918" value="1918">1918</option> 
 <option label="1917" value="1917">1917</option> 
 <option label="1916" value="1916">1916</option> 
 <option label="1915" value="1915">1915</option> 
 <option label="1914" value="1914">1914</option> 
 <option label="1913" value="1913">1913</option> 
 <option label="1912" value="1912">1912</option> 
 <option label="1911" value="1911">1911</option> 
 <option label="1910" value="1910">1910</option> 
 <option label="1909" value="1909">1909</option> 
 <option label="1908" value="1908">1908</option> 
 <option label="1907" value="1907">1907</option> 
 <option label="1906" value="1906">1906</option> 
 <option label="1905" value="1905">1905</option> 
 <option label="1904" value="1904">1904</option> 
 <option label="1903" value="1903">1903</option> 
 <option label="1902" value="1902">1902</option> 
 <option label="1901" value="1901">1901</option> 
 <option label="1900" value="1900">1900</option> 
  				</select>
				 年 
				<select name="birthday_m" id="birthday_m" init_value="09" > 
    <option selected value="0"> </option> 
    <option value="01">01</option> 
    <option value="02">02</option> 
    <option value="03">03</option> 
    <option value="04">04</option> 
    <option value="05">05</option> 
    <option value="06">06</option> 
    <option value="07">07</option> 
    <option value="08">08</option> 
    <option value="09">09</option> 
    <option value="10">10</option> 
    <option value="11">11</option> 
    <option value="12">12</option> 
    			</select> 
    			月 &nbsp;&nbsp;&nbsp;&nbsp;性别
    			<select id="g" name="gender">		
					<option selected value="1">男</option>
					<option value="0">女</option>
				</select> 
				</div> 
			</div>
			
			
			<div class="info_item info_item_bor">
				<h3 class="help">请选择一个身份</h3>
				<div class="mlr20">
					<div id="role">
						<input type="radio" name="role" value="0"/>从业者
						<input type="radio" name="role" value="1"/>在校生
						<input type="radio" name="role" value="2"/>创业者
						<input type="radio" name="role" value="3"/>投资人
					</div>
				
					<script type="text/javascript">
						$(document).ready(function(){
							t_select('role', {
								0		:		'从业者',
								1		:		'在校生',
								2		:		'创业者',
								3		:		'投资人'
							}, 'radio');
						});
					</script>
				</div>
			</div>
		<div class="info_item info_item_bor">
			<h3 class="help">请选择您的需求（可多选）</h3>
			<div class="mlr20">
				<div id="aim">
					<input type="checkbox" name="aims" value="0" />有项目 找人才
					<input type="checkbox" name="aims" value="1" />有项目 找资
					<input type="checkbox" name="aims" value="2" />有才能 找工作
					<input type="checkbox" name="aims" value="3" />结识好友
				</div>
				<script type="text/javascript">
					$(document).ready(function(){
						t_select('aim', {
							0		:		'有项目 找人才',
							1		:		'有项目 找资',
							2		:		'有才能 找工作',
							3		:		'结识好友'
						}, 'checkbox');
					});
				</script>
			</div>
			
		</div>
		</div><!--step0-->
		<div class="step" id="step_2" style="display:none;">
		<script type="text/javascript" src="<?=base_url() ?>js/school.js"></script>
		<script type="text/javascript">
	//弹出窗口
	function pop(){
		//将窗口居中
		makeCenter();

		//初始化省份列表
		initProvince();

		//默认情况下, 给第一个省份添加choosen样式
		$('[province-id="1"]').addClass('choosen');

		//初始化大学列表
		initSchool(1);
	}
	//隐藏窗口
	function hide()
	{
		$('#choose-box-wrapper').css("display","none");
	}

	function initProvince()
	{
		//原先的省份列表清空
		$('#choose-a-province').html('');
		for(i=0;i<schoolList.length;i++)
		{
			$('#choose-a-province').append('<a class="province-item" province-id="'+schoolList[i].id+'">'+schoolList[i].name+'</a>');
		}
		//添加省份列表项的click事件
		$('.province-item').bind('click', function(){
				var item=$(this);
				var province = item.attr('province-id');
				var choosenItem = item.parent().find('.choosen');
				if(choosenItem)
					$(choosenItem).removeClass('choosen');
				item.addClass('choosen');
				//更新大学列表
				initSchool(province);
			}
		);
	}

	function initSchool(provinceID)
	{
		//原先的学校列表清空
		$('#choose-a-school').html('');
		var schools = schoolList[provinceID-1].school;
		for(i=0;i<schools.length;i++)
		{
			$('#choose-a-school').append('<a class="school-item" school-id="'+schools[i].id+'">'+schools[i].name+'</a>');
		}
		//添加大学列表项的click事件
		$('.school-item').bind('click', function(){
				var item=$(this);
				var school = item.attr('school-id');
				//更新选择大学文本框中的值
				$('#school-name').val(item.text());
				//关闭弹窗
				hide();
			}
		);
	}

	function makeCenter()
	{
		$('#choose-box-wrapper').css("display","block");
		$('#choose-box-wrapper').css("position","absolute");
		$('#choose-box-wrapper').css("top", Math.max(0, (($(window).height() - $('#choose-box-wrapper').outerHeight()) / 2) + $(window).scrollTop()) + "px");
		$('#choose-box-wrapper').css("left", Math.max(0, (($(window).width() - $('#choose-box-wrapper').outerWidth()) / 2) + $(window).scrollLeft()) + "px");
	}

  </script>
		<div class="info_item info_item_bor">
			<h3 class="help">简单的介绍一下自己，让大家了解你</h3>
			<textarea class="w_i mlr20 i" id="ii" name="ii"></textarea>
		</div>
		
		<div class="info_item info_item_bor">
			<h3 class="help">就职单位 - 所在岗位 (未就职请留空)</h3>
			<input class="mlr20" type="text" name="department" id="department"/> - <input class="mlr20" type="text" name="post" id="post"/>
		</div>
		
		
		<div class="info_item info_item_bor">
			<h3 class="help">就读院校 - 就读专业</h3>
			<input class="mlr20" type="text" name="school" id="school-name" value="请选择大学" onclick="pop()"/> - <input class="mlr20" type="text" name="major" id="major"/>
			
		</div>
		
		<div id="choose-box-wrapper">
		  <div id="choose-box">
			<div id="choose-box-title">
				<span>选择学校</span>
			</div>
			<div id="choose-a-province">
			</div>
			<div id="choose-a-school">
			</div>
			<div id="choose-box-bottom">
				<input type="botton" onclick="hide()" value="关闭" />
			</div>
		  </div>
		</div>
			
		<div class="info_item info_item_bor">
			<h3 class="help">微博(请填写微博网址)</h3>
			<input class="mlr20" type="text" name="weibo" id="weibo"/>
		</div>
		
		<div class="info_item info_item_bor">
			<h3 class="help">个人网站(请填写个人网站的网址)</h3>
			<input class="mlr20" type="text" name="siteurl" id="siteurl"/>
		</div>
		
		</div><!--step2-->
		<div class="step" id="step_0">
			
					<link rel="stylesheet" href="<?=base_url() ?>js/themes/default/default.css" />
					<link rel="stylesheet" href="<?=base_url() ?>/style/jquery.Jcrop.css" type="text/css" />
					
					<script src="<?=base_url() ?>/js/jquery.Jcrop.min.js"></script>
					<script type="text/javascript" src="<?=base_url() ?>js/create_pro.js"></script>
					<script charset="utf-8" src="<?=base_url() ?>js/kindeditor-min.js"></script> 
					<script charset="utf-8" src="<?=base_url() ?>js/zh_CN.js"></script> 
					<script>
						KindEditor.ready(function(K) {
							var uploadbutton = K.uploadbutton({
								button : K('#uploadButton')[0],
								fieldName : 'imgFile',
								url : '<?=base_url()?>js/php/upload_json.php?dir=image&cut=true',
								afterUpload : function(data) {
									if (data.error === 0) {
										var url = K.formatUrl(data.url, 'absolute');
										FLAG_RB = true;
										FLAG_PAGE[0] = true;
										enable_rb();
										//$('jcrop-holder').remove();
										K('#url').val(url);
										$('#imageurl').val(url);
										$('#realurl').val(data.realurl);
										$('#cropbox').attr('src', data.url);
										$('#preview4').attr('src', data.url);
										$('#cropbox').load(function(){
											cutpic();
											auto_height();
										});
										
										
									} else {
										alert(data.message);
									}
								},
								afterError : function(str) {
									alert('自定义错误信息: ' + str);
								}
							});
							uploadbutton.fileBox.change(function(e) {
								uploadbutton.submit();
							});
						});
					
				
							 function cutpic(){
				
						      // Create variables (in this scope) to hold the API and image size
						      var jcrop_api, boundx, boundy;
						      
						      $('#cropbox').Jcrop({
								minSize: [48,48],
								setSelect: [0,0,190,190],
						        onChange: updatePreview,
						        onSelect: updatePreview,
								onSelect: updateCoords,
						        aspectRatio: 1
						      },
								function(){
							        // Use the API to get the real image size
							        var bounds = this.getBounds();
							        boundx = bounds[0];
							        boundy = bounds[1];
							        // Store the API in the jcrop_api variable
							        jcrop_api = this;
							    });
								function updateCoords(c)
								{
									$('#x').val(c.x);
									$('#y').val(c.y);
									$('#w').val(c.w);
									$('#h').val(c.h);
								};
								function checkCoords()
								{
									if (parseInt($('#w').val())) return true;
									alert('请选择一个裁剪区域');
									return false;
								};
							      function updatePreview(c){
							        if (parseInt(c.w) > 0)
							        
								    {
							          var rx = 110 / c.w;		//大头像预览Div的大小
							          var ry = 110 / c.h;
							          $('#preview4').css({
							            width: Math.round(rx * boundx) + 'px',
							            height: Math.round(ry * boundy) + 'px',
							            marginLeft: '-' + Math.round(rx * c.x) + 'px',
							            marginTop: '-' + Math.round(ry * c.y) + 'px'
							          });
							        }
							      };
							    }
				
					</script>
					
					<div id="photo">
						<div style="width:110px;height:110px;overflow:hidden;">
							<img class="space_photo" id="preview4" src="<?=base_url()?>images/common/no_photo.gif" />
						
						</div><br/>
						<input class="ke-input-text" type="hidden" id="url" value="" readonly="readonly" /> <input type="button" id="uploadButton" value="选择图片" />
					</div>
					<div class="pic_form">
						<div id="outer">
							<div class="jcExample">
							<div class="article">
						
							
								<img src="<?=base_url()?>images/common/no_photo.gif" id="cropbox"/>
						
								
								<form name="photoform" action="<?=site_url('user_info/do_upload_pic_advance')?>" method="post" enctype="multipart/form-data" onsubmit="return checkCoords();">
									<input type="hidden" id="x" name="x" />
									<input type="hidden" id="y" name="y" />
									<input type="hidden" id="w" name="w" />
									<input type="hidden" id="h" name="h" />
									<input type="hidden" id="imageurl" name="imageurl" />
									<input type="hidden" id="realurl" name="realurl" />
									<!--
									<input type="hidden" id="email" name="email" value="<?=$email?>"/>
									-->
									<br/>
									<!--<input type="submit" value="上传头像" class="small_button" />-->
								</form>
							</div>
							</div>
						</div>	
					</div>
		</div><!--step3-->
		<div id="step_3" class="step" style="display:none;">
			<div class="info_item info_item_bor">
				<h3 class="help">常用邮箱</h3>
				<input name="contact_email" class="mlr20 c" type="text" id="contact_email"/>
			</div>
			<div class="info_item info_item_bor">
				<h3 class="help">Q Q</h3>
				<input name="qq" id="qq" type="text" class="mlr20 c" value=""/>
			</div>
			<div class="info_item info_item_bor">
				<h3 class="help">手 机</h3>
				<input name="telphone" id="telphone" type="text" class="mlr20 c"  value=""/>
			</div>
			<div class="info_item info_item_bor">
				<h3 class="help">固定电话(区号+电话号码)</h3>
				<input type="text" id="province" name="province" class="mlr20 c" style="width:50px;"/> - 
				<input type="text" id="phone_number" name="phone_number" class="mlr20 c"  value=""/>	
				<input name="phone" id="phone" type="hidden"  value=""/>	
			</div>
		</div>	
	
		<div class="step" id="step_4" style="display:none;">
			<div class="info_item info_item_bor">
				<h3 class="help">选择一个擅长领域</h3>
				<div class="mlr20">
					<div id="field">
						<input type="radio" name="field" value="0" />开发
						<input type="radio" name="field" value="1" />设计
						<input type="radio" name="field" value="2" />其他
						
					</div>
					<script type="text/javascript">
						$(document).ready(function(){
							t_select('field', {
								0		:		'开 发',
								1		:		'设 计',
								2		:		'其 他'
							}, 'radio');
							$('#ulfield').find('li').click(function(){
								var tag = $(this).attr('rel');
								
								$('.sk').css('display', 'none');
								$('.sk' + tag).fadeIn();
								check_skills();
							});
						});
						
					</script>
				</div>
			</div>
			
			<div class="info_item info_item_bor sk sk0" style="display:none;">
				<h3 class="help">选择擅长的开发技能（可多选）</h3>
				<div class="mlr20">
					<div id="skills_soft">
						<input type="checkbox" name="soft" value="0" />网络开发
						<input type="checkbox" name="soft" value="1" />游戏开发
						<input type="checkbox" name="soft" value="2" />网页设计
						<input type="checkbox" name="soft" value="3" />软件开发
						<input type="checkbox" name="soft" value="4" />网站运营
						<input type="checkbox" name="soft" value="5" />其他领域
					</div>
					<script type="text/javascript">
						$(document).ready(function(){
							t_select('skills_soft', {
								0		:		'网络开发',
								1		:		'游戏开发',
								2		:		'网页设计',
								3		:		'软件开发',
								4		:		'网站运营',
								5		:		'其他技能'
							}, 'checkbox');
						});
					</script>
				</div>
			</div><!--#item-->
			
			<div class="info_item info_item_bor sk sk1" style="display:none;">
				<h3 class="help">选择擅长的设计技能（可多选）</h3>
				<div class="mlr20">
					<div id="skills_design">
						<input type="checkbox" name="design" value="0" />平面设计
						<input type="checkbox" name="design" value="1" />工业设计
						<input type="checkbox" name="design" value="2" />影视动画
						<input type="checkbox" name="design" value="3" />交互设计
						<input type="checkbox" name="design" value="4" />其他技能
						
					</div>
					<script type="text/javascript">
						$(document).ready(function(){
							t_select('skills_design', {
								0		:		'平面设计',
								1		:		'工业设计',
								2		:		'影视动画',
								3		:		'交互设计',
								4		:		'其他技能'
							}, 'checkbox');
						});
					</script>
				</div>
			</div><!--#item-->
			
			<div class="info_item info_item_bor sk sk2" style="display:none;">
				<h3 class="help">选择擅长的其他技能（可多选）</h3>
				<div class="mlr20">
					<div id="skills_other">
						<input type="checkbox" name="other" value="0" />法律顾问
						<input type="checkbox" name="other" value="1" />推广营销
						<input type="checkbox" name="other" value="2" />财务管理
						<input type="checkbox" name="other" value="3" />其他技能
					
					</div>
					<script type="text/javascript">
						$(document).ready(function(){
							t_select('skills_other', {
								0		:		'法律顾问',
								1		:		'推广营销',
								2		:		'财务管理',
								3		:		'其他技能'
							}, 'checkbox');
						});
					</script>
				</div>
			</div><!--#item-->
			
			
		</div>
	</div>
	
	<div class="guide_button">
		<div id="right_button" class="rbf">
		
		</div>
	</div>
</div>
