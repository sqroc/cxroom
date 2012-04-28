	<div class="full fl">
		<div class="data pl20">
			<script charset="utf-8" src="<?=base_url() ?>js/kindeditor-min.js"></script> 
			<script charset="utf-8" src="<?=base_url() ?>js/zh_CN.js"></script> 
			<form  method="post" action="<?=site_url('space/objects_form/add')?>" enctype="multipart/form-data" onsubmit="return check_info()">
				<div class="form_title">
					<span class="normal fl"><a href="<?=base_url()?>space/objects_form">基本信息</a></span>
					<span class="normal fl"><a href="<?=base_url()?>space/objects_form/talent">招募文件</a></span>
					<span class="normal fl"><a href="<?=base_url()?>space/objects_form/invest">募资计划</a></span>
					<span class="normal fl"><a href="<?=base_url()?>space/objects_form/notice">口号和公告</a></span>
					<span class="current fl"><a href="<?=base_url()?>space/objects_form/aim">计划目标</a></span>
				</div>
				
				<div class="item">
					<div class="label">
						文件标题:<span>*</span>
					</div>
					<div class="item_info">
						<input name="name" type="input" class="w300">
						<!--
						<input name="date" type="hidden" >
						-->
						<br>
						<span class="help">请输入标题，一个响亮明了的标题可以吸引更多人的关注。</span>
						<input name="randvalue" type="hidden" value=""/>
						
					</div>
				</div>
				
			
			
							
				<script> 
					var editor;
					KindEditor.ready(function(K) {
					editor = K.create('textarea[name="pintro"]', {
					resizeType : 1,
					allowPreviewEmoticons : false,
					allowImageUpload : true,
					items : [
						'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
						'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
						'insertunorderedlist', '|', 'emoticons', 'image', 'link']
						});
					});
				</script> 
					
				<div class="item">
					<div class="label">	
						文件内容:<span>*</span>
					</div>
					<div class="item_info">
						<textarea name="pintro" style="width:660px;height:300px;visibility:hidden;"></textarea>
						<span class="help" id="textspan"></span>
					</div>
				</div>	
					
			
				
			
				<div class="item">
					<div class="label">	
						
					</div>
					<div class="item_info">
						<input type="submit" value="提交文件" class="submit large" id="publish"/>
						<span class="help"></span>
					</div>
				</div>		
				
			</form>
		</div>
	</div><!--#mid-->
</div><!--#container-->