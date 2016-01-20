<?php global $post; ?>
<?php global $jlfoundation_theme; ?>
<div class="page-feed">

	<div class="page-feed__feed">
		<div class="container">
			<div class="page-feed__row js-equal">
				<?php get_template_part('templates/module/archive-kids-store-type/content','feed'); ?>					
			</div><!--/.row-->

			<div class="page-feed__pagination">
				<a class="page-feed__pagination--btn btn-more">Load More</a>
			</div>

		</div><!--/.container-->
	</div>

</div><!--/.page-content-->