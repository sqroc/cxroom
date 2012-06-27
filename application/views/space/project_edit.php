<div class="container info_tabs">
	<ul>
		<li class="current" id="info_1">基本资料</li>
		<li id="info_2">项目简介</li>
		<li id="info_3">项目成员</li>
		<li id="info_4">募资计划</li>
	</ul>
</div>
<div class="container form_box" style="border-top:1px #fff solid;">
	<div class="data">
		<script type="text/javascript" src="<?=base_url() ?>js/create_pro.js"></script>
		<script charset="utf-8" src="<?=base_url() ?>js/kindeditor-min.js"></script> 
		<script charset="utf-8" src="<?=base_url() ?>js/zh_CN.js"></script> 
		<form  method="post" action="<?=site_url('space/project_edit/update')?>" enctype="multipart/form-data" onsubmit="return check_info()">
		<!---------step1------------->
		<div class="info_box" id="box_info_1">	
			<div class="help_notice">
				请根据要求填写项目基本信息，带星号的为必填项。详细周全的资料可以让你的项目获得更多关注！
			</div>
			<div class="item">
				<div class="label">
					项目名称:<span>*</span>
				</div>
				<div class="item_info">
				
					<input name="name" type="input" class="w300" value="<?= $project->name?>">
					<br>
					<span class="help">请填写你的项目名称，只能包含字母，中文。</span>
					<input name="randvalue" type="hidden" value="<?=$randvalue ?>"/>
					<input name="pid" type="hidden" value="<?= $project->pid?>"/>
				</div>
			</div>
			
			<div class="item">
				<script>
					KindEditor.ready(function(K) {
						var editor = K.editor({
							allowFileManager : false
						});
						K('#image').click(function() {
							editor.loadPlugin('image', function() {
								editor.plugin.imageDialog({
									fileUrl : K('#url').val(),
									clickFn : function(url, title) {
										K('#url').val(url);
										editor.hideDialog();
									}
								});
							});
						});
					});
				</script>
				<div class="label">
					项目LOGO:<span>*</span>
				</div>
				<div class="item_info">
					<input type="text" id="url" value="<?= $project->logopic?>" name="path_logo"/><input type="button" id="image" class="button" value="选择图片" />
					<br>
					<span class="help">上传一张漂亮的logo赚足眼球。</span>
				
				</div>
			</div>	
						
			<div class="item">
				<div class="label">	
					所属分类:<span>*</span>
				</div>
				<div class="item_info">
					<select name="pclassid">
							<?php foreach($classresult as $item):
							?>
							<?php if ($project->pclassid == $item->pclassid):
							?>
							<option selected="selected" value="<?=$item->pclassid?>"><?=$item->pclassname
								?></option>
							<?php else:?>
							<option value="<?=$item->pclassid?>"><?=$item->pclassname
								?></option>
							<?php endif;?>
							<?php endforeach;?>
					</select>
					<br><span class="help">请选择正确的分类以便让访客更容易找到你。</span>
				</div>
			</div>	
						
			<div class="item">
				<div class="label">
					宣传语:<span>*</span>
				</div>
				<div class="item_info">
					<input name="aimtitle" type="text" value="<?= $project->aimtitle?>" class="w300">
					<!--
					<input name="date" type="hidden" >
					-->
					<br>
					<span class="help">宣传语是项目最好的广告语，所以请限制在20字内，简洁而又响亮的宣传语能吸引更多眼球</span>
			
				</div>
			</div>
			
							
			<div class="item">
				<div class="label">	
					项目目标:<span>*</span>
				</div>
				<div class="item_info">
					<textarea name="aimcontent" id="aimcontent" style="width:460px;height:100px;"><?= $project->aimcontent?></textarea>
					<br><span class="help" id="textspan">目标榜位置宝贵有限，请把内容控制在50个字以内</span>
				</div>
			</div>	
						
			<div class="item" style="display:none;">
				<div class="label">	
					宣传视频:
				</div>
				<div class="item_info">
					<input type="input" class="w300" name="videourl">
					<br><span class="help">请填写视频源文件地址</span>
				</div>
			</div>	
				
		
			<div class="item" style="display:none;">
				<script>
					KindEditor.ready(function(K) {
						var editor = K.editor({
							allowFileManager : false
						});
						K('#uploadfile').click(function() {
							editor.loadPlugin('insertfile', function() {
								editor.plugin.fileDialog({
									fileUrl : K('#file').val(),
									clickFn : function(url, title) {
										K('#file').val(url);
										editor.hideDialog();
									}
								});
							});
						});
					});
				</script>
				<div class="label">	
					附件资料:
				</div>
				<div class="item_info">
				
					<input type="text" id="file" name="path_file" value="" /> <input type="button" id="uploadfile" class="button" value="选择附件" />
					<br><span class="help">你可以上传附件提供下载，以便更详细地展示项目，支持的附件有word,ppt,excel,pdf</span>
				</div>
			</div>	
		</div>
		<!---------step2-------------->
		<div class="info_box" id="box_info_2" style="display:none;">
			
				<script> 
					var editor;
					KindEditor.ready(function(K) {
					editor = K.create('textarea[name="pintro"]', {
					resizeType : 1,
					allowPreviewEmoticons : false,
					allowImageUpload : true,
					allowFlashUpload : false,
					items : [
						'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
						'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
						'insertunorderedlist', '|', 'emoticons', 'image', 'link', 'flash']
						});
					});
				</script> 
				<div class="help_notice">
					请填写详细的项目介绍和项目需求，你也可以插入图片和flash视频，只有具有完整介绍的项目才能通过审核。
				</div>	
				<div class="item"> 
					<div class="label">	
						项目简介:<span>*</span> 
					</div> 
					<div class="item_info"> 
						<textarea name="pintro" style="width:810px;height:500px;visibility:hidden;"><?= $project->pintro?></textarea> 
					
					</div> 
				</div>	
				<div class="item">
					<div class="label">
						项目需求:
					</div>
					<div class="item_info">
						<ul class="select" id="needed">
							<li <?php if($project->talenttitle == '要推广'){echo 'class="selected"';}?>>要推广</li>
							<li <?php if($project->talenttitle == '找人才'){echo 'class="selected"';}?>>找人才</li>
							<li <?php if($project->talenttitle == '其他需求'){echo 'class="selected"';}?>>其他需求</li>
						</ul>
						<input name="talenttitle" type="hidden" id="input_needed" class="w300" value="<?= $project->talenttitle?>">
					
						
						
					</div>
				</div>
				<script> 
					var editor;
					KindEditor.ready(function(K) {
					editor = K.create('textarea[name="talentcontent"]', {
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
					
				<div class="item" id="needcontent">
					<div class="label">	
						详细说明:<span>*</span>
					</div>
					<div class="item_info">
						<textarea name="talentcontent" style="width:810px;height:300px;visibility:hidden;"><?= $project->talentcontent?></textarea>
						<span class="help" id="textspan"></span>
					</div>
				</div>	
		</div>
	
		<!---------step3-------------->
		<div class="info_box" id="box_info_3" style="display:none;">
			<div class="help_notice">
					添加项目成员仅需输入成员邮箱，系统会自动调用其信息展示在项目主页，如果该邮箱未在本站注册，我们会向其发出邮件通知邀请。
			</div>	
			<div class="item">
				<div class="label">	
					团队成员:<span>*</span>
				</div>
				<div class="item_info">
					<div id="members">
						<div id="mem_mess">	
						<?php foreach($prousers as $item):?>	
							<input name="members_<?=$item->pmid?>" type="input" value="<?=$item->email?>">
								担任角色:
								<select name="roles_<?=$item->pmid?>">
									<?php if ($item->role == "创始人"):
									?>
									<option selected="selected" >创始人</option>
									<?php else:?>
									<option>创始人</option>
									<?php endif;?>
									<?php if ($item->role == "技术员"):
									?>
									<option selected="selected" >技术员</option>
									<?php else:?>
									<option>技术员</option>
									<?php endif;?>
									<?php if ($item->role == "法律顾问"):
									?>
									<option selected="selected" >法律顾问</option>
									<?php else:?>
									<option>法律顾问</option>
									<?php endif;?>
									<?php if ($item->role == "宣传销售"):
									?>
									<option selected="selected">宣传销售</option>
									<?php else:?>
									<option>宣传销售</option>
									<?php endif;?>
									<?php if ($item->role == "其他"):
									?>
									<option selected="selected">其他</option>
									<?php else:?>
									<option>其他</option>
									<?php endif;?>
								</select>
								<div class="clear" style="height:10px;"></div>
						<?php endforeach;?>
						
						</div>
				
					</div>
					<input class="button" type="button" value="再添一个" id="addm">
					<input class="button" type="hidden" value="好友便签" id="help_button" onclick="display_msg()">	
					
					<input name="member_0" type="hidden" value="发布人姓名"/>	
					<input name="role_0" type="hidden" value="创始人"/>
				
					
				</div>
			</div>	
			<div class="item">
				<div class="label">	
					  
				</div>
				<div class="item_info">
					
					
				</div>
			</div>	
		</div>
		
		<!---------step4-------------->
		<div class="info_box" id="box_info_4" style="display:none;">
			<div class="help_notice">
				你可以通过募资获得项目资金，建议设置多档位的回报可以满足更多人的需求，回报方式可以是多样的，如产品预购，独特的感谢方式等。
			</div>
			<div class="item">
				<div class="label">
					资金总额:
				</div>
				<div class="item_info">
				
					<input name="wantvalue" class="w50" type="text" value="<? if($project_pay!=NULL) echo $project_pay->wantvalue; ?>" disabled="disabled"> 元
								
				</div>
			</div>
			<div class="item">
				<div class="label">
					募资天数:
				</div>
				<div class="item_info">
				
					<input name="finishdate" class="w50" type="text" value="<? if($project_pay!=NULL) echo ceil(($project_pay->finishdate - time()) / (60 * 60 * 24)); ?>" disabled="disabled"> 天
								
				</div>
			</div>
			<div class="inv_item">
			<?php foreach($project_paylist as $item):?>	
			<div class="form">
			<div class="inv_info">
			<div class="inv_label">支持金额:</div>
			<div class="inv_input">
			<input type="text" class="w50 m" name="money_<?=$item->pplistid?>" value="<?=$item->supportvalue?>" disabled="disabled"> 元</div></div>
			<div class="inv_info"><div class="inv_label">
			上限人数:</div><div class="inv_input">
			<input type="text" class="w50 l" name="limit_<?=$item->pplistid?>" value="<?=$item->pnum?>" disabled="disabled"> 人</div></div>
			<div class="inv_info"><div class="inv_label">
			支持回馈:</div><div class="inv_input"><textarea class="inv_text" name="gift_<?=$item->pplistid?>" disabled="disabled"><?=$item->backcontent?></textarea>
			</div></div></div>
			<?php endforeach;?>
			</div>
			<div id="inv_list">
				<input type="hidden" name="inv_count" value="0" />
				
			</div>
			<div class="add_inv">
				<input type="button" id="add_inv" class="button" style="width:100px;" value="增加一个支持" />
			</div>
				
		</div>
		
		<div style="display:none;">
			<div class="item">
				<div class="label">
					文件标题:<span>*</span>
				</div>
				<div class="item_info">
					<input name="investtitle" type="input" class="w300">
					
					<br>
					<span class="help">请输入标题，一个响亮明了的标题可以吸引更多人的关注。</span>
						
				</div>
			</div>			
						
			<script> 
				var editor;
				KindEditor.ready(function(K) {
				editor = K.create('textarea[name="investcontent"]', {
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
					<textarea name="investcontent" style="width:810px;height:300px;visibility:hidden;"></textarea>
					<span class="help" id="textspan"></span>
				</div>
			</div>	
		</div>
		
		
			<div class="item">
				<div class="label">	
					
				</div>
				<div class="item_info">
					
					
					<input type="submit" value=" " class="sub" id="send" />
					<span class="help"></span>
				</div>
			</div>		
			<div id="hiddennum"><input  name="hiddennum" type="hidden" value="1"/></div>
		</form>
	</div>
</div><!--#container-->