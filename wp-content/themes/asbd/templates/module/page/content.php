<?php global $post; ?>
<?php global $jlfoundation_theme; ?>

<div class="page-content">
	<div class="container">
	
		<div class="page-content__entry">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>    
					<div class="entry__header">
						<h1 class="entry__header--title"><?php the_title(); ?></h1>
					</div>
					<div class="entry__content">
						<?php the_content(); ?>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	
	</div><!--/.container-->
</div><!--/.page-content-->