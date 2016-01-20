<?php global $post; ?>

<?php $tax_text = get_post_meta($post->ID,'_jlfoundation_tax_text',1); ?>

<section class="tax">

	<div class="container-fluid">

		<div class="tax--row">

			<div class="tax__image">
				<img class="tax__image--img" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/img_irs.jpg" />
			</div>

			<div class="tax__body">
			
				<?php if (!empty($tax_text)) : ?>
					<div class="tax__header">
						<h1 class="tax__header--title"><em>Tax</em><br>Information</h1>
					</div><!--/.header-->
					
					<div class="tax__content">
						<p class="tax__content--text"><?php echo $tax_text ?></p>
					</div><!--/.content-->

					<div class="tax__foooter">
						<a href="https://www.irs.gov/" target="_blank" class="tax__footer--btn">Visit the IRS website <i class="icon icon-externallink"></i></a>
					</div><!--./footer-->

				<?php endif; ?>

			</div>

		</div><!--/.row-->

	</div>

</section><!--/.tax-->