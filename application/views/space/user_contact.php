	<div class="userinfo fl">
		<ul class="tablist">
			<li><a href="user_info">基本信息</a></li>
			<li><a href="user_info/skills">个人技能</a></li>
			<li><a href="user_info/photo">个人头像</a></li>
			<li class="current">联系方式</li>
		</ul>
		<div class="info_notice">
			<span>填写真实的信息才能确保别人能联系到你</span>
		</div>
		<!--
		<p>请填写正确的信息，方便别人找到你</p>
		-->
		<script src="<?=base_url() ?>js/check_info.js" type="text/javascript"></script>
		
		<form method="post" action="<?=site_url('user_info/contactinfo')?>" onsubmit="return contact_check()">
		<div class="info_item">
			<div class="info_label">
				联系邮箱:
			</div>
			<div class="info_content">
				<input name="contact_email" id="contact_email" class="input"  value="<?=$contact_email ?>"/>	
				
				<input name="randvalue" type="hidden" value="<?=$randvalue ?>"/>	
				<input name="email" type="hidden" value="<?=$email ?>"/>	
				<span></span>
			</div>
		</div>
		
		<div class="info_item">
			<div class="info_label">
				Q Q:
			</div>
			<div class="info_content">
				<input name="qq" id="qq" type="text" class="input" value="<?=$qq ?>"/>		
				<span></span>
			</div>
		</div>
		
		<div class="info_item">
			<div class="info_label">
				手 机:
			</div>
			<div class="info_content">
				<input name="telphone" id="telphone" type="text" class="input"  value="<?=$telphone ?>"/>	
				<span></span>		
			</div>
		</div>
		
		<div class="info_item">
			<div class="info_label">
				固定电话:
			</div>
			<div class="info_content">
				<input type="text" id="province" class="input" style="width:50px;"/> - 
				<input type="text" id="phone_number" class="input"  value=""/>	
				<input name="phone" id="phone" type="hidden"  value="<?=$phone ?>"/>	
				<span></span>		
			</div>
		</div>	
		<script type="text/javascript">
			$(document).ready(function(){
				var p = "<?=$phone ?>";
				p = p.split('-');
				$('#province').val(p[0]);
				$('#phone_number').val(p[1]);
			});
		</script>
		
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
<!--include user_sidebar.php-->