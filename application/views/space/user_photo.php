<div class="userinfo fl">
	<ul class="tablist">
		<li>
			<a href="user_info">基本信息</a>
		</li>
		<li>
			<a href="user_info/skills">个人技能</a>
		</li>
		<li class="current">
			个人头像
		</li>
		<li>
			<a href="user_info/contact">联系方式</a>
		</li>
		<li><a href="user_info/nineask">九 问</a></li>
	</ul>
	<div class="info_notice">
			<span>建议上传真实头像，这样可以获得更多人关注</span>
	</div>
	<link rel="stylesheet" href="<?=base_url() ?>js/themes/default/default.css" />
	<link rel="stylesheet" href="<?=base_url() ?>/style/jquery.Jcrop.css" type="text/css" />
	
	<script src="<?=base_url() ?>/js/jquery.Jcrop.min.js"></script>
	<script type="text/javascript" src="<?=base_url() ?>js/create_pro.js"></script>
	<script charset="utf-8" src="<?=base_url() ?>js/kindeditor-min.js"></script> 
	<script charset="utf-8" src="<?=base_url() ?>js/zh_CN.js"></script> 
	<script>
		KindEditor.ready(function(K) {
			var uploadbutton = K.uploadbutton({
				button : K('#uploadButton')[0],
				fieldName : 'imgFile',
				url : '<?=base_url()?>js/php/upload_json.php?dir=image&cut=true',
				afterUpload : function(data) {
					if (data.error === 0) {
						var url = K.formatUrl(data.url, 'absolute');
						K('#url').val(url);
						$('#imageurl').val(url);
						$('#realurl').val(data.realurl);
						$('#cropbox').attr('src', data.url);
						$('#preview4').attr('src', data.url);
						$('#cropbox').load(function(){
							cutpic();
							auto_height();
						});
						
						
					} else {
						alert(data.message);
					}
				},
				afterError : function(str) {
					alert('自定义错误信息: ' + str);
				}
			});
			uploadbutton.fileBox.change(function(e) {
				uploadbutton.submit();
			});
		});
	

			 function cutpic(){

		      // Create variables (in this scope) to hold the API and image size
		      var jcrop_api, boundx, boundy;
		      
		      $('#cropbox').Jcrop({
				minSize: [48,48],
				setSelect: [0,0,190,190],
		        onChange: updatePreview,
		        onSelect: updatePreview,
				onSelect: updateCoords,
		        aspectRatio: 1
		      },
				function(){
			        // Use the API to get the real image size
			        var bounds = this.getBounds();
			        boundx = bounds[0];
			        boundy = bounds[1];
			        // Store the API in the jcrop_api variable
			        jcrop_api = this;
			    });
				function updateCoords(c)
				{
					$('#x').val(c.x);
					$('#y').val(c.y);
					$('#w').val(c.w);
					$('#h').val(c.h);
				};
				function checkCoords()
				{
					if (parseInt($('#w').val())) return true;
					alert('请选择一个裁剪区域');
					return false;
				};
			      function updatePreview(c){
			        if (parseInt(c.w) > 0)
			        
				    {
			          var rx = 110 / c.w;		//大头像预览Div的大小
			          var ry = 110 / c.h;
			          $('#preview4').css({
			            width: Math.round(rx * boundx) + 'px',
			            height: Math.round(ry * boundy) + 'px',
			            marginLeft: '-' + Math.round(rx * c.x) + 'px',
			            marginTop: '-' + Math.round(ry * c.y) + 'px'
			          });
			        }
			      };
			    }

	</script>
	
	<div id="photo">
		<div style="width:110px;height:110px;overflow:hidden;">
			<img class="space_photo" id="preview4" src="<?=base_url()?>images/common/no_photo.gif" />
		
		</div><br/>
		<input class="ke-input-text" type="hidden" id="url" value="" readonly="readonly" /> <input type="button" id="uploadButton" value="选择图片" />
	</div>
	<div class="pic_form">
		<div id="outer">
			<div class="jcExample">
			<div class="article">
		
			
				<img src="<?=base_url()?>images/common/no_photo.gif" id="cropbox"/>
		
				
				<form name="photoform" action="<?=site_url('user_info/do_upload_pic_advance')?>" method="post" enctype="multipart/form-data" onsubmit="return checkCoords();">
					<input type="hidden" id="x" name="x" />
					<input type="hidden" id="y" name="y" />
					<input type="hidden" id="w" name="w" />
					<input type="hidden" id="h" name="h" />
					<input type="hidden" id="imageurl" name="imageurl" />
					<input type="hidden" id="realurl" name="realurl" />
					<input type="hidden" id="email" name="email" value="<?=$email?>"/>
					<br/>
					<input type="submit" value="上传头像" class="small_button" />
				</form>
			</div>
		</div>
	</div>
	<!--
		<script src="<?=base_url() ?>js/check_info.js" type="text/javascript"></script>
		<form method="post" name="photoform" action="<?=site_url('user_info/do_upload_pic')?>" enctype="multipart/form-data" onsubmit="return photo_check()">
			<input type="file" name="userfile" id="userfile" class="select" id="photofile" onChange="check_photo('photofile')"/>
			<input name="email" type="hidden"  value="<?=$email ?>"/>
			<input type="submit" value="上传头像" class="small_button" />
		</form>
	-->
	</div>
	
</div><!--#infobox-->
<!--include user_sidebar.php-->