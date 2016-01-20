<?php global $post; ?>

<?php global $jlfoundation_theme; ?>

<?php if ( is_page('our-science') ) { ?>
    <div class="lab-partners">
    	<div class="container">
    		<div class="row">
    			<div class="lab-partners__wrapper">
    				<div class="row">
		    			<div class="lab-partners__image">
		    				<a href="http://spauldingrehab.org/" target="_blank"><img class="lab-partners__image--img" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/lab-1.png"></a>
		    			</div>
		    			<div class="lab-partners__image">
		    				<a href="http://www.neuromodulationlab.org" target="_blank"><img class="lab-partners__image--img" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/lab-2.png"></a>
		    			</div>
		    		</div>
		    	</div>
    		</div>
    	</div>
    </div>
<?php } ?>

<?php if ( is_page('body-electric-continuing-medical-education') ) { ?>
    <div class="cme-partners">
    	<div class="container">
    		<div class="row">
    			<div class="cme-partners__wrapper">
    				<div class="row">
		    			<div class="cme-partners__image">
		    				<a href="http://www.spauldingrehab.org" target="_blank"><img class="lab-partners__image--img" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/cme-1.png"></a>
		    			</div>
		    			<div class="cme-partners__image">
		    				<a href="http://www.neuromodulationlab.org" target="_blank"><img class="lab-partners__image--img" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/cme-2.png"></a>
		    			</div>
		    		</div>
		    	</div>
    		</div>
    	</div>
    </div>
<?php } ?>

<div id="page" class="page-content">

	<div class="container">
		<div class="page-content__entry">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>    
					<?php the_content(); ?>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div><!--/.container-->

	<?php $pagination = $jlfoundation_theme->child_nav_pagination(); ?>

	<?php if ( !empty( $pagination['prev']) || !empty( $pagination['next'])) : ?>

		<div class="page-content__pagination">

			<?php if ( !empty( $pagination['prev'] )) : ?>
				<a href="<?php echo get_permalink($pagination['prev']);?>" class="page-content__pagination--btn btn-previous"><i class="icon icon-arrow-long-left"></i> <?php echo get_the_title($pagination['prev']);?></a>
			<?php endif; ?>
			<?php if ( !empty( $pagination['next'] )) : ?>
				<a href="<?php echo get_permalink($pagination['next']);?>" class="page-content__pagination--btn btn-next"><?php echo get_the_title($pagination['next']);?> <i class="icon icon-arrowlong"></i></a>
			<?php endif; ?>
			<div class="clearfix"></div>
		</div>

	<?php endif; ?>

	<a href="#submenu" title="Scroll up to see more" class="page-content--uplink js-scroll">
		<i class="icon icon-arrowup"></i>
	</a>

</div><!--/.page-content-->