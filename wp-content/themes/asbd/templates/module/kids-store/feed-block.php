<?php global $post; ?>
<?php $item_link = get_post_meta($post->ID,'_jlfoundation_kids_store_item_link',1); ?>
<?php $term_list = wp_get_post_terms($post->ID, 'kids-store-type' , array("fields" => "all")); ?>
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

	<span class="article-block__icon">
		<i class="icon <?php echo $term_icon;?>"></i>
	</span><!--/.icon-->

	<figure class="article-block__image">
		<?php the_post_thumbnail('full',array('class'=>'img-responsive article-block__img')); ?>
	</figure>

	<div class="article-block__header">	
		<h2 class="article-block__header--title"><?php the_title(); ?></h2>
	</div><!--/.header-->

	<div class="article-block__content">	
		<div class="article-block__content--description"><?php the_excerpt(); ?></div>
	</div><!--/.content-->

	<div class="article-block__footer">	
		<span class="article-block__footer--cta">Look at this <i class="icon icon-arrowlong"></i></span>
	</div><!--/.footer-->

	<?php if (!empty($item_link)) : ?>
		<a href="<?php echo $item_link; ?>" target="_blank" class="abs-link"></a>
	<?php else: ?>	
		<a href="<?php the_permalink() ?>" class="abs-link"></a>
	<?php endif; ?>

</article>						


