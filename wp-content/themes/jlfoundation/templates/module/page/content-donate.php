<?php global $post; ?>

<div class="page-content">

	<div class="container">
		<div class="page-content__entry">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>    
					<?php the_content(); ?>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div><!--/.container-->
	
</div><!--/.page-content-->