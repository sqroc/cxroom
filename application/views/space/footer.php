<div class="container">
	<div class="space_line"></div>
</div>
<div id="space_footer">
	<div class="l_f">
		<p>
			<a href="">关于我们</a>
			<a href="">联系方式</a>
			<a href="">合作洽谈</a>
			<a href="">网站服务</a>
			<a href="">服务条款</a>
		</p>
		<p>
			©2012- 创新空间版权所有
		</p>	
		
	</div>
	<div class="logo_footer">
		<img src="<?=base_url()?>images/space/icon_footer.gif" />
	</div>
</div>

<!--dialog-->
<div id="t_dialog" style="display:none;">
	<div class="box">
		<div class="box_top">
			<span class="replyto">回复框</span>
			<span id="close_dialog" class="close_dialog"> </span>
		</div>
		<form action="<?=base_url()?>user_space/replycomment" method="post">
	
			<input type="hidden" value="" id="reply_comment_id" name="comment_id" />
			<input type="hidden" name="uid" id="reply_uid" value="<?=$uid ?>"/>
			<input type="hidden" name="replyspace" id="reply_replyspace" value="<?=$replyspace ?>"/>
			
			<div class="item_box">
				<textarea rows="4"  name="comment_content" id="reply_content"></textarea>
			</div>
			
			<div class="item_box">
				<input type="button" class="small_button" id="send_reply" value="提交内容" />
			</div>
			
		</form>
		<div class="clear0"></div>
	</div>
</div>


<div id="t2_dialog" style="display:none;">
	<div class="box">
		<div class="box_top">
			<span>给 <?=$username ?> 发送站内信</span>
			<span id="close_dialog2" class="close_dialog"> </span>
		</div>
		<form action="<?=base_url()?>user_space/replycomment" method="post">
	
		
			<input type="hidden" name="uid" id="reply_uid2" value="<?=$uid ?>"/>

			
			<div class="item_box">
				<textarea rows="4"  name="comment_content" id="reply_content2"></textarea>
			</div>
			
			<div class="item_box">
				<input type="button" class="small_button" id="send_reply2" value="发送消息" />
			</div>
			
		</form>
		<div class="clear0"></div>
	</div>
</div>
</body>
</html>
