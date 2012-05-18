	<div class="mid fl">
		
		<div id="learn">
			<div class="shut"></div>
			<h3>充电时间 <span>今日词条:<?=$lab->name?></span></h3>
			<p><?=$lab->content?></p>
			<div class="mess">
				<!--<span class="author">提供人:<a href="">小样儿</a></span>-->
				<span class="write"><a href="<?=$lab->articleurl?>"><?=$lab->articletitle?></a></span>
				<!--<span class="catch"><a href="">我知道了</a></span>-->
			</div>
		</div>
		<div id="honor">
			
		</div>
		<div class="spacecol">
			<h3 class="skill">我的技能<span>显示结果用于展示用户各个技能相对侧重水平，为自主评分，仅供参考</span></h3>
			<dl><?php foreach($myskills as $item): ?>
				<dt><?=$item->skillname?>  <span><?=$item->skillscore?></span> 分</dt>
				<dd><?=$item->skillintro?></dd>
				<?php endforeach; ?>
			</dl>
		</div>
		<div class="spacecol">
			<h3 class="comment">留言交流</h3>
			<div class="clear"></div>
				<ul class="comments">
					<li>
						<div class="comment_box">
							<div class="avatar">
								<img src="http://localhost/ci/images/user_head/head_default.gif" />
							</div>
							<div class="reply w600">
								<span><a href="">没事留个言</a></span><br>
								<p>别怕，我只是一条留言而已</p>
							</div>
						</div>
						
							
					</li>
					
					<li>
						<div class="comment_box">
							<div class="avatar">
								<img src="http://localhost/ci/images/user_head/head_default.gif" />
							</div>
							<div class="reply w600">
								<span><a href="">没事留个言</a></span><br>
								<p>别怕，我只是一条留言而已</p>
							</div>
						</div>
						
							
					</li>
					
					
				</ul>
				<div class="leave_reply">
					<form >
						<textarea name="reply" cols="60" rows="8"></textarea> <br>
						<input type="submit" value="发表留言" class="submit"/>
					</form>
				</div>
			
			
		</div>
		
	</div><!--#mid-->