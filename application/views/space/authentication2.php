	<div class="userinfo fl">
		<ul class="tablist">
			
			<li>
				<a href="<?=base_url() ?>space/authentication">个人认证申请</a>
			</li>
			<li class="current">
				团队认证申请
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
					组织名称:
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
						<option selected value="知名团队">知名团队</option>
						<option value="高校大型创业组织社团">高校大型创业组织社团</option>
						<option value="社会创新创业机构">社会创新创业机构</option>
						<option value="创新空间入驻项目团队">创新空间入驻项目团队</option>
					</select>
				</div>
			</div>
			<div class="info_item">
				<div class="info_label">		
					团队/组织/机构资料:
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
