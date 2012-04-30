<div class="header_shadow"></div>

<div class="container content_shadow">

	<div class="a_content">
		<h2><?=$article->title?></h2>
		<div class="tags">
			<?= date('Y-m-d',$article->adddate);?>
		</div>
		<div class="content">
			<p>
				<?=$article->content?>
			</p>
		</div>
	</div><!--#a_content-->

</div>
