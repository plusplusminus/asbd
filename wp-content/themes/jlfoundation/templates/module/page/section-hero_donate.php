<?php global $post; ?>

<?php $hero_text = get_post_meta($post->ID,'_jlfoundation_parent_hero_text',1); ?>

<header class="hero hero--donation">
	
	<?php if (!empty($hero_text)) : ?>
		<div class="hero__heading">
			<h1 class="hero__heading--title"><?php echo $hero_text ?></h1>
		</div>
	<?php endif; ?>

</header>

<div class="hero__image">
	<?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?>
	<a href="#" title="Scroll down to see more" class="page-nav--downlink">
		<i class="icon icon-arrowdown"></i>
	</a>
</div>
