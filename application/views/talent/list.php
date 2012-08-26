<div class="header_shadow"></div>
<div class="container talent_box">
<script type="text/javascript">
			$(document).ready(function() {
				var url = BASE_URL + "/talent/search_condition";
				$.post(url, {
					offset : 0,
					num : 10,

				}, function(data) {
					$('#list').html(data);	
				}, "html");
			});
		</script>
	<div class="list_box">
		<div class="select_box" id="type1">
			<input type="radio" name="g" value="1"/>
			男
			<input type="radio" name="g" value="0"/>
			女

		</div>
		<script type="text/javascript">
			$(document).ready(function() {
				t_select('type1', {
					1 : '男',
					0 : '女'
				}, 'radio', '性别');
			});
		</script>

		<div class="select_box" id="type2">
			<input type="radio" name="role" value="0"/>
			从业者
			<input type="radio" name="role" value="1"/>
			在校生
			<input type="radio" name="role" value="2"/>
			创业者
			<input type="radio" name="role" value="3"/>
			投资人

		</div>
		<script type="text/javascript">
			$(document).ready(function() {
				t_select('type2', {
					0 : '从业者',
					1 : '在校生',
					2 : '创业者',
					3 : '投资人'
				}, 'radio', '身份');
			});
		</script>

		<ul id="list">
			

		</ul>
		<div class="pages">
			<ul>
				<li>
					1
				</li>
				<li>
					2
				</li>
				<li>
					3
				</li>
			</ul>
		</div>
	</div><!--#List_box-->
	<div class="side_bar">
		<ul class="cate_list">
			<li id="find_talent" class="current">
				找人才<span>做伯乐 找人才 </span>
			</li>
			<!--<li id="find_friend" class="un">
				找朋友<span>找志趣相同的朋友</span>
			</li>-->
			<li id="find_new" class="nu">
				看新人<span>欢迎下最新成员</span>
			</li>
		</ul>
	</div>
</div>
<div id="contact_form" style="display:none;">
	<textarea name="test" style="width:370px;height:100px;">test</textarea>
</div>
