<?php global $post; ?>
<?php $meta1 = get_post_meta($post->ID,'_jlfoundation_kids_news_item_meta_1',1); ?>
<?php $meta2 = get_post_meta($post->ID,'_jlfoundation_kids_news_item_meta_2',1); ?>
<?php $item_link = get_post_meta($post->ID,'_jlfoundation_kids_news_item_link',1); ?>
<?php $term_list = wp_get_post_terms($post->ID, 'kids-news-type' , array("fields" => "all")); ?>
<?php 
	
	$term_list_slug = $term_list[0]->slug;
	$term_icon = get_term_meta( $term_list[0]->term_id, '_jlfoundation_terms_cat-icon', true );
	
 ?>

<?php if ( has_post_thumbnail() ) :
	$thumb_test = "has-image";
	else:
	$thumb_test = "no-image";
endif ?>

<article class="article-block article-block--<?php echo $term_list_slug; ?> <?php echo $thumb_test; ?>">

	<!-- <figure class="article-block__bg"> -->
		
	<!-- </figure> -->

	<span class="article-block__icon">
		<i class="icon <?php echo $term_icon;?>"></i>
	</span><!--/.icon-->

	<div class="article-block__header">	
		<h2 class="article-block__header--title"><?php the_title(); ?></h2>
		<?php if (!empty($meta1)) : ?>
			<div class="article-block__header--meta-author"><?php echo $meta1 ?></div>
		<?php endif; ?>
		<?php if (!empty($meta2)) : ?>
			<div class="article-block__header--meta-subtitle"><?php echo $meta2 ?></div>
		<?php endif; ?>
	</div><!--/.header-->

	<div class="article-block__content">	
		<div class="article-block__content--description"><?php the_excerpt(); ?></div>
	</div><!--/.content-->

	<div class="article-block__footer">	
		<div class="article-block__footer--meta-date"><?php the_time( get_option( 'date_format' ) ); ?></div>
		<span class="article-block__footer--cta">Read More <i class="icon icon-arrowlong"></i></span>
	</div><!--/.footer-->

	<?php if (!empty($item_link)) : ?>
		<a href="<?php echo $item_link; ?>" target="_blank" class="abs-link"></a>
	<?php else: ?>	
		<a href="<?php the_permalink() ?>" class="abs-link"></a>
	<?php endif; ?>

</article>						


