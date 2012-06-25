	<div class="userinfo fl">
		<ul class="tablist">
			<li class="current">
				认证申请
			</li>
			
		</ul>
		<div class="info_notice">
			<span>请填写真实有效的信息以便通过审核。</span>
		</div>
		<script src="<?=base_url() ?>js/check_info.js" type="text/javascript"></script>
		<form method="post" action="<?=site_url('space/authentication/checkauth')?>" onsubmit="return info_check()">
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
					<input name="realname" type="text" id="name" class="input" value="<?=$username ?>"/>
					<span></span>
				</div>
			</div>
			<div class="info_item">
				<div class="info_label">	
					认证对象:
				</div>
				<div class="info_content">
					<select name="object">
						<option selected value="社会知名人士">社会知名人士</option>
						<option value="创业人士">创业人士</option>
						<option value="创业组织负责人">创业组织负责人</option>
					</select>
				</div>
			</div>
			<div class="info_item">
				<div class="info_label">		
					个人资料:
				</div>
				<div class="info_content">
					<textarea name="intro" id="intro" class="input"></textarea><br />
					<span style="margin-left:0;margin-top:10px;display:block;"></span>
				</div>
			</div>
				
			<div class="info_item">
				<div class="info_label">		
					 &nbsp;
				</div>
				<div class="info_content">
					<input type="submit" value="提交申请" class="small_button" />
				</div>
			</div>
					
				
		</form>
	
	</div><!--#infobox-->
