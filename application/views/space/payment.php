	<div class="mid fl">
		
		
		<div class="spacecol" style="padding:0;">		
				<h3>用户充值中心</h3>	
				
				<ul class="notice">		
					<form name=alipayment action="<?=base_url()?>pay/alipayto.php" method=post target="_blank">
					 <input type="hidden" name="subject" value="创新空间" />
					<br />
					充值金额： 
					<input type="radio"  name="total_fee" value="0.01" />10元
    				<input type="radio"  name="total_fee" value="50" />50元
    				<input type="radio"  name="total_fee" value="100" />100元
    				<input type="radio"  name="total_fee" value="500" />500元
    				<input type="radio"  name="total_fee" value="5000" />5000元
    				 <br /><br />
					 <input type="hidden" name="alibody" value="创新空间充值系统，有疑问可咨询cxroom@foxmail.com" />
					 <input type="hidden" name="uid" value="<?=$uid ?>" />
					  <input type="hidden" name="username" value="<?=$username ?>" />
					<input type="submit" value="确认付款" />
								
				</ul>
				
		</div><!--#space_col-->
		
		
	</div><!--#mid-->

