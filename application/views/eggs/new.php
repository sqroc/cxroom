<div class="container2 t20">
	<div class="author fl">
		<div class="avatar">
			<img src="<?=base_url()?><?=$person_pic?>" />  <br>
			<span class="name"><a href="<?=base_url()?>user_space/uid/<?=$uid?>" target="_blank" title="<?=$username?>的空间"><?=$username?></a></span>
		</div>
	</div>

	<div class="content_box fr">
		<div class="jt"></div>
		<form action="<?=base_url()?>eggs/addidea" method="post">
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
				<textarea class="text" name="ideaintro"></textarea>
				<br>
				<span class="help">言简意赅的摘要可以使你的创意吸引更多人的关注！</span>
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
				<textarea name="pintro" style="width:660px;height:200px;visibility:hidden;"></textarea>
				<span class="help" id="textspan">请提供竟可能多的有参考价值的信息，也可以插入图片和链接，所提供介绍内容太少的项目很有可能无法通过审核。</span>
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