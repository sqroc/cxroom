	<div class="userinfo fl">
		<ul class="tablist">
			<li class="current">
				基本信息
			</li>
			<li>
				<a href="user_info/skills">个人技能</a>
			</li>
			<li>
				<a href="user_info/photo">个人头像</a>
			</li>
			<li>
				<a href="user_info/contact">联系方式</a>
			</li>
		</ul>
		<div class="info_notice">
			<span>请填写真实有效的信息</span>
		</div>
		<script src="<?=base_url() ?>js/check_info.js" type="text/javascript"></script>
		<form method="post" action="<?=site_url('user_info/baseinfo')?>" onsubmit="return info_check()">
			<div class="info_item">
				<div class="info_label">
					邮 箱:
				</div>
				<div class="info_content">
					<?=$email
					?> 
					<input name="email" type="hidden" value="<?=$email ?>"/>
					<input name="randvalue" type="hidden" value="<?=$randvalue ?>"/>
				</div>
			</div>
			
			<div class="info_item">
				<div class="info_label">
					姓 名:
				</div>
				<div class="info_content">
					<input name="name" type="text" id="name" class="input" value="<?=$username ?>"/>
					<span></span>
				</div>
			</div>
			<div class="info_item">
				<div class="info_label">	
					性 别:
				</div>
				<div class="info_content">
					<select name="gender">
						<?php if ($gender == 0):?>
						<option value="1">男</option>
						<option selected value="0">女</option>
						<?php else:?>
						<option selected value="1">男</option>
						<option value="0">女</option>
						<?php endif;?>
					</select>
				</div>
			</div>
			<div class="info_item">
				<div class="info_label">	
					省 份:
				</div>
				<div class="info_content">
					<select name="province">
						<?php if (isset($province)): ?>
						<option selected value="<?=$province ?>"><?=$province ?></option>	
						<?php else:?>
						<option selected>---请选择---</option>
						<?php endif;?>
						<option value="北京" >北京</option><option value="上海" >上海</option><option value="天津" >天津</option><option value="重庆" >重庆</option><option value="福建" >福建</option><option value="辽宁" >辽宁</option><option value="吉林" >吉林</option><option value="河北" >河北</option><option value="海南" >海南</option><option value="陕西" >陕西</option><option value="山西" >山西</option><option value="甘肃" >甘肃</option><option value="宁夏" >宁夏</option><option value="新疆" >新疆</option><option value="西藏" >西藏</option><option value="青海" >青海</option><option value="四川" >四川</option><option value="云南" >云南</option><option value="贵州" >贵州</option><option value="湖南" >湖南</option><option value="湖北" >湖北</option><option value="河南" >河南</option><option value="山东" >山东</option><option value="安徽" >安徽</option><option value="江苏" >江苏</option><option value="浙江" >浙江</option><option value="台湾" >台湾</option><option value="香港" >香港</option><option value="澳门" >澳门</option><option value="广东" >广东</option><option value="广西" >广西</option><option value="江西" >江西</option><option value="黑龙江" >黑龙江</option><option value="内蒙古" >内蒙古</option><option value="其他" >其他</option>
					</select>
				</div>
			</div>
			<div class="info_item">
				<div class="info_label">		
					个人简介:
				</div>
				<div class="info_content">
					<textarea name="intro" id="intro" class="input"><?=$intro ?></textarea><br />
					<span style="margin-left:0;margin-top:10px;display:block;"></span>
				</div>
			</div>
				
			<div class="info_item">
				<div class="info_label">		
					 &nbsp;
				</div>
				<div class="info_content">
					<input type="submit" value="保存修改" class="small_button" />
				</div>
			</div>
					
				
		</form>
	
	</div><!--#infobox-->
