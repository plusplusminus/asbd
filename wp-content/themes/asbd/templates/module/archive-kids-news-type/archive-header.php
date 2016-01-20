<?php global $post; ?>
<?php global $jlfoundation_theme; ?>
<div class="post-head">

	<div class="container">

		<?php  $jlfoundation_theme->kids_news_menu('kids-news-type'); ?>

	</div>

	<div class="archive-header">

		<div class="container">
			<?php $categories = get_categories('');
				foreach($categories as $category) {
					$cat =  $category->category_nicename;
				}
			 ?>
			<h1 class="post-header--title"><?php the_archive_title(); ?></h1>
		</div>

	</div>
</div>