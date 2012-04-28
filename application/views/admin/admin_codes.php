<!--body-->
<div class="admin_body">
<br /><br /> <div>
	<form action="admin/cx_admin/createcodes" method="post">
		
		<input type="submit" value="生成邀请码" />
		
	</form>
</div><br /><br />
	<table style="width:90%;line-height:40px;"> 
				<tr> 
					<th style="width:25%" class="name">序号</th> 
					<th style="width:25%" class="intro">邀请码</th> 
					
					
				</tr> 
				<?php foreach($codes as $item): ?>
				<tr> 
					<td><?=$item->icodeid?></td> 
					<td><?=$item->code?></td> 
				
					
				</tr>	
				<?php endforeach; ?>				
	</table> 
	
	
</div>
<!--#body-->
</body>
</html>
