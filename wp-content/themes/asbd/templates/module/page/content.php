<?php global $post; ?>

<?php $page_title = get_post_meta($post->ID,'_asbd_page_title',true); ?>

<?php 
	$tmp = $post->ID;
	$args = array(
		'order'          	=> 'ASC',
		'post_type'      	=> 'page',
		'post_parent'    	=> $post->ID,
		'posts_per_page'    => -1,
	);
	$child_pages = new WP_Query( $args );
?>
<div class="page-content">
	<div class="container">
	
		<?php if ( $child_pages->have_posts() ) : $count = 0; ?>
			<div class="page-content__entry page-content__entry--children">
				<?php while ( $child_pages->have_posts() ) : $child_pages->the_post(); $count++;?>
					
					<?php $page_quote_author = get_post_meta($post->ID,'_asbd_page_quote_author',true); ?>
					<?php $page_quote_content = get_post_meta($post->ID,'_asbd_page_quote_content',true); ?>
					<?php $page_title = get_post_meta($post->ID,'_asbd_page_title',true); ?>
					<?php $page_btn_label = get_post_meta($post->ID,'_asbd_page_btn_label',true); ?>
					<?php $page_btn_link = get_post_meta($post->ID,'_asbd_page_btn_link',true); ?>

					<div id="child-<?php echo $post->ID;?>" class="page-content__entry--child">
						<?php if (!empty($page_quote_content)): ?>
							<div class="entry__quote">
								<div class="entry__quote--content">
									<?php echo $page_quote_content; ?>
								</div>
								<p class="entry__quote--author"><?php echo $page_quote_author; ?></p>
							</div><!--/.quote-->
						<?php endif; ?>
						<div class="entry__header">
							<?php the_post_thumbnail('full',array('class' => 'entry__header--img img-responsive')); ?>
							<h2 class="entry__header--title">
								<?php if (!empty($page_title)): ?>
									<?php echo $page_title; ?>
								<?php else: ?>
									<?php the_title(); ?>
								<?php endif; ?>
							</h2>
						</div>
						<div class="entry__content">
							<?php the_content(); ?>
							<?php if (!empty($page_btn_label)): ?>
								<a class="entry__content--btn" href="<?php echo $page_btn_link;?>"><?php echo $page_btn_label;?></a>
							<?php endif; ?>
						</div>
					</div><!--/.child-->
				<?php endwhile; ?>
			</div><!--/.children-->

		<?php else : ?>

		<div class="page-content__entry">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>    
					<div class="entry__header">
						<h1 class="entry__header--title">
							<?php if (!empty($page_title)): ?>
								<?php echo $page_title; ?>
							<?php else: ?>
								<?php the_title(); ?>
							<?php endif; ?>
						</h1>
					</div>
					<div class="entry__content">
						<?php the_content(); ?>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div><!--/.entry-->

		<?php endif; // End IF Statement ?>
	
	</div><!--/.container-->
</div><!--/.page-content-->