<div class="clear"></div>
<div class="container help_body">
	<div class="leftpart">
		<div class="banner">
			<img src="<?=base_url()?>images/help/banner_team.png" />
		</div>
		<div class="warm">
			创新空间认证服务是完全免费的，我们不会向用户收取任何费用，任何付费认证都是虚假欺骗行为。
		</div>
		
		<div class="title">
			认证账号要求
		</div>
		<div class="box2">
			<ul>
				<li>已经上传头像</li>
				<li>拥有五个以上的好友</li>
				<li>账号资料完成度80%以上</li>
				<li>账号名必须为真实姓名或者被大众泛知的网名</li>
			</ul>
		</div>
		<script src="<?=base_url()?>js/space_myhome.js" type="text/javascript"></script> 
		<div class="doctor">
			<div class="d_title">
				<span class="left_part">账号医生</span>
				<span class="left_part" id="percent">诊断中</span>
				<div class="slide_button">收起化验单</div>
			</div>
			<div id="d_info">
				<img src="<?=base_url()?>images/common/loading.gif" />
			</div>
			<script type="text/javascript">
				$(document).ready(function(){
					var d_url = "<?= base_url() ?>/user_space/aid/<?=$userreply->uid?>?timestamp=" + new Date().getTime();
					var avatar ="";
					var avatar_ok = "你已上传了头像。";
					var avatar_no = "你未上传头像，建议上传头像以便获得更多人关注。";
					var intro ="";
					var intro_ok= "你已填写个人简介，也可以继续完善它，让他人更好了解你。";
					var intro_no = "你未填写个人简介，向大家介绍下你吧。";
					var skill ="";
					var skill_ok = "你已经添加了技能，也可以继续添加新的技能。";
					var skill_no = "你一个技能也没添加，快向大家展示下自己的才华吧？";
					var friend = "你没有关注任何人，赶快找找感兴趣的人吧。";
				
					
					$.getJSON(d_url,function(data){
						
						var avatar_tmp = "";
						var intro_tmp ="";
						var skills_tmp ="";
						var ask_tmp ="";
						var score_tmp ="";
						var ask_tmp="";
						var friends_tmp ="";
						var n = 0;
						var score = 9;
						var total_score = 12;
						//avatar
						if(data.avatar == 'f'){
							avatar = avatar_no;
							total_score--;
						} else {
							avatar = avatar_ok;
						}
						avatar_tmp = '<li class=\"'+data.avatar+'\">'+avatar+'<span><a href=\"<?=base_url()?>user_info/photo\" >上传头像</a></span></li>';
						//intro
						if(data.intro == 'f'){
							intro = intro_no;
							total_score--;
						} else {
							intro = intro_ok;
						}
						intro_tmp = '<li class=\"'+data.intro+'\">'+intro+'<span><a href=\"<?=base_url()?>user_info\" >修改基本资料</a></span></li>';
						//skills
						if(data.skills == 'f'){
							skill = skill_no;
							total_score--;
						} else {
							skill = skill_ok;
						}
						skills_tmp = '<li class=\"'+data.skills+'\">'+skill+'<span><a href=\"<?=base_url()?>user_info/skills\" >添加技能</a></span></li>';
						//ask9
						for(n=0; n<9; n++){
							if(data.asks[n] == 'f'){
								score--; 
							}
						}
						var last = 9-score;
						if(last==0){
							s = 't';
						} else {
							s = 'f';
						}
						var ask_tmp = '<li class=\"'+s+'\">你回答了九问中的'+score+'个问题,还剩'+last+'个需要回答。<span><a href=\"<?=base_url()?>user_info/nineask\" >完善九问</a></span></li>';
						//friend
						if(data.friends == '0'){
							friends_tmp = '<li class="f">'+friend+'<span><a href=\"<?=base_url()?>space/space_userlist/userlist\" >看看有谁在这</a></span></li>';
						} else {
							friends_tmp ="";
						}
						//tmp
						var w = (total_score-9+score)/12*100;
						score_tmp = '<div class="finish_wrap"><div class="finish_wrap_in" style=\"width:'+ w +'%;\"></div></div>';	
						tmp = score_tmp + '<div class="doctor_info"><ul>' + avatar_tmp + intro_tmp + skills_tmp +ask_tmp+friends_tmp+ '</ul></div>';
						$('#d_info').html(tmp);
					
						$('#percent').text('资料完成度 '+parseInt(w)+'%');	
						
						var tt = false;
						if(w>60){
							tt = true;
						}
						doctor_fade();
						doctor_slide(tt);
						//auto_height();
						h();
					
					});
				});
				
				
			</script>	
		</div><!--doctor-->
		<div class="title">
			认证对象
		</div>
	
		<div class="box2">
			<ul>
				<li>创新空间入驻项目团队账号</li>
				<li>社会创新创业机构账号</li>
				<li>高校大型创业组织社团官方账号</li>
				<li>知名团队</li>
				
			</ul>
		</div>
		
		<div class="title">
			申请途径
		</div>
		<div class="box2">
			<ul>
				<li>通过创新空间邀请注册的创业团队，只需要完善资料，即可通过认证，而无需再提交资料审核。</li>
				<li>除创新空间官方邀请的项目外，其余项目申请认证请使用你注册账号的邮箱发送团队资料到我们的认证邮箱c@cxroom.com</li>
				
				
			</ul>
		</div>
	</div>
	<div class="rightbar">
		<ul class="listmenu">
			<li class="normal"><img src="<?=base_url()?>images/c/c_personal_little.gif" /> <a href="<?=base_url()?>help">个人认证帮助</a></li>
			<li class="current"><img src="<?=base_url()?>images/c/c_team_little.gif" /> <a href="<?=base_url()?>help/team">团体认证帮助</a></li>
		</ul>
	</div>
	<script type="text/javascript">
		//window.onload = h;
		function h(){
			//$('.help_body').css('height', 'auto');
			var h = $('.help_body').height();
			$('.help_body').css('height', h);
		}
	</script>
</div>
