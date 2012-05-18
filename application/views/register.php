<div class="header_shadow"></div>
<div class="container cbg">
	<!-- 第二行左列 信息填写 -->
	<div class="box_shadow">
	<div class="leftbox">
		
		<h3>只需30秒，让创意不再流浪</h3>
		还没有邀请码？ <a href="http://www.cxroom.com/articles/getarticle/19" title="如何获得创新空间邀请码">如何获得邀请码</a>
		<form name="register" method="post" action="<?=site_url('register/reg')?>" id="registerform" onsubmit="return reg_check()">
			<input name="randvalue" type="hidden" value="<?=$randvalue ?>"/>	
			
			<div class="item">
				<div class="label">邀请码</div>
				<div class="item_info">
					<input class="input" type="text" name="code" id="invite" value=""/>
					<span class="notice">请输入邀请码</span>
				</div>
			</div>
			
			<div class="item">
				<div class="label">邮 箱</div>
				<div class="item_info">
					<input class="input" type="text" name="email" id="email" value="" />
					<span class="notice">请填写你的常用邮箱</span>
				</div>
			</div>
			
			<div class="item">
				<div class="label">姓 名</div>
				<div class="item_info">
					<input class="input" type="text" name="name" id="name" value=""/>
					<span class="notice">输入姓名,只可以包含数字和字母</span>
				</div>
			</div>
			
			<div class="item">
				<div class="label">密 码</div>
				<div class="item_info">
					<input class="input" type="password" name="password" id="password" value=""/>
					<span class="notice">请输入密码</span>
				</div>
			</div>
			
			
			
			<div class="item">
				<div class="label"> </div>
				<div class="item_info">
				<input type="submit" name="Submit" class="reg_button reg_b_normal" value="" >
					<span class="notice">已有账号？<a href="<?=base_url() ?>login">马上登陆</a></span>
				</div>
			</div>	
			
		</form>
		<script type="text/javascript">
			function ajax_check_mail(){
				var url = "<?=base_url() ?>register/checkmail";
				var email = $('#email').val();
				warm('email', '邮箱检测中');
				$.post(url, {
					email : email

				}, function(data) {
					if(data.state == 'T'){
						TAG_AJAX_MAIL = true;
						pass('email', '邮箱可以使用');
		
					} else {
						TAG_AJAX_MAIL = false;
						warm('email', '邮箱已经被使用');
					}
				}, "json");
			}
			
			function ajax_check_invite(){
				//设置参数TAG_AJAX_INVITE=ture为通过，false为不通过
				
				var url = "<?=base_url() ?>register/checkcode";
				var code = $('#invite').val();
				warm('invite', '邀请码检测中');
				$.post(url, {
					code : code

				}, function(data) {
					if(data.state == 'T'){
						TAG_AJAX_INVITE = true;
						pass('invite', '邀请码有效');
		
					} else {
						TAG_AJAX_INVITE = false;
						warm('invite', '邀请码错误或者已经被使用');
					}
				}, "json");
			
			}
		</script>
	</div>
	
</div><!--#container-->
</div>

