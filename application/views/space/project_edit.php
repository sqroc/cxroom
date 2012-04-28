<div class="full fl">
	<div class="data pl20">
		<script type="text/javascript" src="<?=base_url() ?>js/create_objects.js"></script>
		<script charset="utf-8" src="<?=base_url() ?>js/kindeditor-min.js"></script>
		<script charset="utf-8" src="<?=base_url() ?>js/zh_CN.js"></script>
		<form  method="post" action="<?=site_url('space/project_edit/update')?>" enctype="multipart/form-data" onsubmit="return check_info()">
			<div class="form_title" id="box">
				<span class="current fl" onclick="dsp_box('box', 1)">基本信息</span>
				<span class="normal fl" onclick="dsp_box('box', 2)"  <?php if($project->isgetmember == 1){echo 'style="display:block;"';}else{echo 'style="display:none;"';} ?>>招募文件</span>
				<span class="normal fl" onclick="dsp_box('box', 3)" <?php if($project->isinvest == 1){echo 'style="display:block"';}else{echo 'style="display:none;"';}?> >募资计划</span>
				<span class="normal fl" onclick="dsp_box('box', 4)">口号和公告</span>
			</div>
			<div id="box_1">
				<div class="item">
					<div class="label">
						项目名称:<span>*</span>
					</div>
					<div class="item_info">
						<input name="name" type="input" class="w300" value="<?= $project->name?>">
						<!--
						<input name="date" type="hidden" >
						-->
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
						项目LOGO:
					</div>
					<div class="item_info">
						<input type="text" id="url" value="<?= $project->logopic?>" name="path_logo"/>
						<input type="button" id="image" class="button" value="选择图片" />
						<br>
						<span class="help">上传长宽比为2:1的图像可获得最佳浏览效果。</span>
					</div>
				</div>
				<div class="item">
					<div class="label">
						功能选项:
					</div>
					<div class="item_info">
						<?php if ($project->isgetmember == 1):
						?>
						<input type="checkbox" onclick="show_doc(1)" class="check" name="isgetmember" value="1" checked="checked">
						招募成员 <?php else:?>
						<input type="checkbox" onclick="show_doc(1)" class="check" name="isgetmember" value="1">
						招募成员 <?php endif;?>
						<?php if ($project->isinvest == 1):
						?>
						<input type="checkbox" onclick="show_doc(2)" class="check" name="isinvest" value="1" checked="checked">
						接受投资 <?php else:?>
						<input type="checkbox" onclick="show_doc(2)" class="check" name="isinvest" value="1">
						接受投资 <?php endif;?>
						<br>
						<span class="help">需要开启功能请勾选，具体内容请在项目发布后完善，勾选功能但未完善具体内容的项目将无法通过审核。</span>
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
						<br>
						<span class="help">请选择正确的分类以便让访客更容易找到你。</span>
					</div>
				</div>
				<div class="item">
					<div class="label">
						团队成员:<span>*</span>
					</div>
					<div class="item_info">
					
							
								<div id="members">
								<?php foreach($prousers as $item):
								?>
						
								<input name="members_<?=$item->pmid?>" type="input" value="<?=$item->uid?>">
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
								</select>
								<br />
								<div class="clear" style="height:10px;"></div>
							
								<?php endforeach;?>
								
								
								
								
								
								</div>
						<input class="button" type="button" value="再添一个" onclick="add_edit_member()">
						<input class="button" type="button" value="好友便签" id="help_button" onclick="display_msg()">
						<input class="button" type="button" value="检测输入" onclick="alert('抱歉，信息检测未开通，请先人工核实。')">
						<input name="member_0" type="hidden" value="发布人姓名"/>
						<input name="role_0" type="hidden" value="创始人"/>
						<br>
						<span class="help">请输入成员的市民证号，建议你对输入进行检测以便核实信息是否正确。系统会根据该编号自动完善其个人信息，所以只有注册用户才能加入项目。</span>
						<br>
						<div id="notice" style="display:none;">
							<dl>
								<dt>
									姓名:
								</dt>
								<dd>
									市民证编号:
								</dd>
								<dt>
									大头
								</dt>
								<dd>
									A000042001
								</dd>
								<dt>
									MEGUO
								</dt>
								<dd>
									T000000231
								</dd>
							</dl>
						</div>
					</div>
				</div>
				<script>
					var editor;
					KindEditor.ready(function(K) {
						editor = K.create('textarea[name="pintro"]', {
							resizeType : 1,
							allowPreviewEmoticons : false,
							allowImageUpload : true,
							items : ['fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline', 'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist', 'insertunorderedlist', '|', 'emoticons', 'image', 'link']
						});
					});

				</script>
				<div class="item">
					<div class="label">
						项目简介:<span>*</span>
					</div>
					<div class="item_info">
						<textarea name="pintro" style="width:660px;height:200px;visibility:hidden;"><?= $project->pintro?></textarea>
						<span class="help" id="textspan">请提供竟可能多的有参考价值的信息，也可以插入图片和链接，所提供介绍内容太少的项目很有可能无法通过审核。</span>
					</div>
				</div>
				<div class="item">
					<div class="label">
						宣传视频:
					</div>
					<div class="item_info">
						<input type="input" class="w300" name="videourl" value="<?= $project->videourl?>">
						<br>
						<span class="help">请填写视频源文件地址</span>
					</div>
				</div>
				<div class="item">
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
						<input type="text" id="file" name="path_file" value="<?= $project->attach?>" />
						<input type="button" id="uploadfile" class="button" value="选择附件" />
						<br>
						<span class="help">你可以上传附件提供下载，以便更详细地展示项目，支持的附件有word,ppt,excel,pdf</span>
					</div>
				</div>
			</div><!--#box_1-->
			<!--招募-->
			<div id="box_2" style="display:none;">
				<div class="item">
					<div class="label">
						文件标题:<span>*</span>
					</div>
					<div class="item_info">
						<input name="talenttitle" type="input" class="w300" value="<?= $project->talenttitle?>">
						<!--
						<input name="date" type="hidden" >
						-->
						<br>
						<span class="help">请输入标题，一个响亮明了的标题可以吸引更多人的关注。</span>
					</div>
				</div>
				<script>
					var editor;
					KindEditor.ready(function(K) {
						editor = K.create('textarea[name="talentcontent"]', {
							resizeType : 1,
							allowPreviewEmoticons : false,
							allowImageUpload : true,
							items : ['fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline', 'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist', 'insertunorderedlist', '|', 'emoticons', 'image', 'link']
						});
					});

				</script>
				<div class="item">
					<div class="label">
						文件内容:<span>*</span>
					</div>
					<div class="item_info">
						<textarea name="talentcontent" style="width:660px;height:300px;visibility:hidden;"><?= $project->talentcontent?></textarea>
						<span class="help" id="textspan"></span>
					</div>
				</div>
			</div><!--#box_2-->
			<!--募资-->
			<div id="box_3" style="display:none;">
				<div class="item">
					<div class="label">
						文件标题:<span>*</span>
					</div>
					<div class="item_info">
						<input name="investtitle" type="input" class="w300" value="<?= $project->investtitle?>">
						<!--
						<input name="date" type="hidden" >
						-->
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
							items : ['fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline', 'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist', 'insertunorderedlist', '|', 'emoticons', 'image', 'link']
						});
					});

				</script>
				<div class="item">
					<div class="label">
						文件内容:<span>*</span>
					</div>
					<div class="item_info">
						<textarea name="investcontent" style="width:660px;height:300px;visibility:hidden;"><?= $project->investcontent?></textarea>
						<span class="help" id="textspan"></span>
					</div>
				</div>
			</div><!--#box_3-->
			<!--目标&口号-->
			<div id="box_4" style="display:none;">
				<div class="item">
					<div class="label">
						项目口号:<span>*</span>
					</div>
					<div class="item_info">
						<input name="aimtitle" type="text" class="w300" value="<?= $project->aimtitle?>">
						<!--
						<input name="date" type="hidden" >
						-->
						<br>
						<span class="help">口号是项目最好的广告语，所以请限制在50字内，简洁而又响亮的口号能吸引更多眼球</span>
					</div>
				</div>
				<div class="item">
					<div class="label">
						项目目标:<span>*</span>
					</div>
					<div class="item_info">
						<textarea name="aimcontent" style="width:460px;height:100px;"><?= $project->aimcontent?></textarea>
						<br>
						<span class="help" id="textspan">目标榜位置宝贵有限，请把内容控制在70个字以内</span>
					</div>
				</div>
			</div><!--#box_4-->
			<div class="item">
				<div class="label"></div>
				<div class="item_info">
					<input type="submit" value="提交项目" class="submit large" id="publish"/>
					<span class="help"></span>
				</div>
			</div>
			<div id="hiddennum">
				<input  name="hiddennum" type="hidden" value="0"/>
			</div>
		</form>
	</div>
</div><!--#mid-->
</div><!--#container-->