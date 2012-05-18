<div class="clear"></div>
<script charset="utf-8" src="<?=base_url() ?>js/kindeditor-min.js"></script> 
<script charset="utf-8" src="<?=base_url() ?>js/zh_CN.js"></script> 
<div class="con_shadow">
<div class="topic_box">
	<div class="author fl">
		<div class="avatar">
			<img src="<?=base_url()?><?=$person_pic?>" />  <br>
			<span class="name"><a href="<?=base_url()?>user_space/uid/<?=$uid?>" target="_blank" title="<?=$username?>的空间"><?=$username?></a></span>
		</div>
	</div>
	
	<div class="content_box fr">
		<div class="jt"></div>
		<h2 class="item_h">发布一个创意蛋</h2>
		<script type="text/javascript" src="<?=base_url()?>js/check_egg.js"></script>
		<form action="<?=base_url()?>eggs/addidea" method="post" enctype="multipart/form-data"  onsubmit="return check_egg()">
		<div class="item">
			<div class="label">
				创意名称:<span>*</span>
			</div>
			<div class="item_info">
				<input name="ideaname" type="input" class="w300 in">
				<br>
				<span class="help">请填写你的项目名称，只能包含字母，中文。</span>
				<input name="randvalue" type="hidden" value="<?=$randvalue ?>"/>
				
			</div>
		</div>
		
		
		<div class="item">
			<div class="label">
				创意摘要:<span>*</span>
			</div>
			<div class="item_info">
				<textarea class="text" name="ideaintro" id="ideaintro"></textarea>
				<br>
				<span class="help">言简意赅的摘要可以使你的创意吸引更多人的关注！</span>
			</div>
		</div>
		
		<div class="item">
			<div class="label">
				封面图片:<span>*</span>
			</div>
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
			<div class="item_info">
				<input type="text" id="url" value="" name="coverimage"/><input type="button" id="image" class="button" value="选择图片" />
				<br>
				<span class="help">选取一张吸引眼球的封面！</span>
			</div>
		</div>
		
		<script charset="utf-8" src="<?=base_url() ?>js/kindeditor-min.js"></script> 
		<script charset="utf-8" src="<?=base_url() ?>js/zh_CN.js"></script> 
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
				创意内容:<span>*</span>
			</div>
			<div class="item_info">
				<textarea name="pintro" style="width:660px;height:600px;visibility:hidden;"></textarea>
				
			</div>
		</div>	
		
		<div class="item">
			<div class="label">	
				
			</div>
			<div class="item_info">
				<input type="submit" value="提交创意" class="submit"/>
				<span class="help"></span>
			</div>
		</div>		
		</form>
	</div>
</div><!--#container-->
</div>
<div class="clear"></div>
<script type="text/javascript">
$(document).ready(function(){
	$('.submit').mouseover(function(){
		$(this).addClass('s_hover');
	});
	$('.submit').mouseout(function(){
		$(this).removeClass('s_hover');
	});
});
</script>