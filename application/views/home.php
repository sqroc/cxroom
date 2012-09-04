<div class="container">
	<div id="banner">
		<div id="close_banner">
			收起
		</div>
		<div class="banner1">
			<p>
				梦想总是遥不可及 是不是该放弃？<br/>
在创新空间 人们因为梦想而相聚 而相识 而付之行动<br/>
				<a href="">马上加入</a>
			</p>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#close_banner').click(function(){
				if($('#banner').height() != 30){
					$('#banner').animate({'height': 30});
					$(this).text('展开');	
				} else {
					$('#banner').animate({'height': 200});	
					$(this).text('收起');	
				}
				
			})
		});
	</script>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		var url = BASE_URL + "/talent/search_condition";
		$.post(url, {
			offset : 0,
			num : 9

		}, function(data) {
			$('.list_container').html(data);	
			dis_more();
			aim_detail();
		}, "html");
		
		function dis_more(){
			$('.talent_info').hover(function(){
				$(this).find('.more').css('display', 'block');
				
				
			},function(){
				$(this).find('.more').css('display', 'none');
				
			});
		}
		
		function aim_detail(){
			$('.aims').hover(function(){	
				$(this).find('p').css('display', 'block');
				var n = 0;
				$(this).find('li').each(function(){
					n++;
					$(this).removeClass('ab' + n);
				});
				
			},function(){
				$(this).find('p').css('display', 'none');
				var m = 0;
				$(this).find('li').each(function(){
					m++;
					$(this).addClass('ab' + m);
				});
			});
		}
		
	});
</script>
<div class="container shadow_box">
	<div class="lshadow"></div>
	<div class="rshadow"></div>
	<div class="tshadow"></div>
	<div class="list_container">
		
	</div>
</div>
<div class="container">
	<div id="getmore">
			查看更多↓
	</div>	
</div>
