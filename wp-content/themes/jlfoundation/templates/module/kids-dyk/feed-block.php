<?php global $post; ?>
<?php $item_link = get_post_meta($post->ID,'_jlfoundation_kids_store_item_link',1); ?>

<?php if ( has_post_thumbnail() ) :
	$thumb_test = "has-image";
	else:
	$thumb_test = "no-image";
endif ?>

<article class="article-block article-block--dyk <?php echo $thumb_test; ?>">

	<figure class="article-block__image">
		<?php the_post_thumbnail('full',array('class'=>'img-responsive article-block__img')); ?>
	</figure>

	<div class="article-block__header">	
		<h2 class="article-block__header--title"><?php the_title(); ?></h2>
	</div><!--/.header-->

	<div class="article-block__footer">	
		<span class="article-block__footer--cta">Learn More <i class="icon icon-arrowlong"></i></span>
	</div><!--/.footer-->
	
	<a href="#" data-toggle="modal" data-target="#myModal" class="abs-link"></a>

</article>