<!--body-->
<div class="admin_body">
<div class="info">
	<form action="admin/cx_admin/createcodes" method="post">
		
		<input type="submit" value="生成邀请码" />
		
	</form>
</div>
		<div class="content">
			<table class="table"> 
				<tr class="head"> 
					<th style="width:25%" class="name">序号</th> 
					<th style="width:75%" class="intro">邀请码</th> 
					
					
				</tr> 
				<?php foreach($codes as $item): ?>
				<tr> 
					<td><?=$item->icodeid?></td> 
					<td><?=$item->code?></td> 
				
					
				</tr>	
				<?php endforeach; ?>				
			</table> 
		</div>
	
	
</div>
<!--#body-->
</body>
</html>
