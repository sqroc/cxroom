	<div class="full fl">
		<div class="data pl20">
			<script type="text/javascript" src="<?=base_url() ?>js/create_projects_notice.js"></script>
		
			<form  method="post" action="<?=site_url('space/objects_form/add')?>" enctype="multipart/form-data" onsubmit="return check_notice()">
				<div class="form_title">
					<span class="normal fl"><a href="<?=base_url()?>space/objects_form">基本信息</a></span>
					<span class="normal fl"><a href="<?=base_url()?>space/objects_form/talent">招募文件</a></span>
					<span class="normal fl"><a href="<?=base_url()?>space/objects_form/invest">募资计划</a></span>
					<span class="current fl"><a href="<?=base_url()?>space/objects_form/notice">口号和公告</a></span>
					<span class="normal fl"><a href="<?=base_url()?>space/objects_form/aim">计划目标</a></span>
				</div>
				
				<div class="item">
					<div class="label">
						项目口号:<span>*</span>
					</div>
					<div class="item_info">
						<input name="slogan" type="text" class="w300">
						<!--
						<input name="date" type="hidden" >
						-->
						<br>
						<span class="help">口号是项目最好的广告语，所以请限制在50字内，简洁而又响亮的口号能吸引更多眼球</span>
				
					</div>
				</div>
				
								
				<div class="item">
					<div class="label">	
						公告栏:<span>*</span>
					</div>
					<div class="item_info">
						<textarea name="notice" style="width:460px;height:100px;"></textarea>
						<br><span class="help" id="textspan">公告栏位置宝贵有限，请把内容控制在70个字以内</span>
					</div>
				</div>	
					
			
				
			
				<div class="item">
					<div class="label">	
						
					</div>
					<div class="item_info">
						<input type="submit" value="提交保存" class="submit large" id="publish"/>
						<span class="help"></span>
					</div>
				</div>		
				
			</form>
		</div>
	</div><!--#mid-->
</div><!--#container-->