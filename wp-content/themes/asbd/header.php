<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
	<?php global $jlfoundation; ?>
	<?php global $jlfoundation_theme; ?>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title(''); ?></title>

    <!-- typekit -->
	<script src="https://use.typekit.net/cht4ztd.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>
    
    <?php wp_head(); ?>
    
</head>

<body <?php body_class(); ?> data-spy="scroll" data-target="#navbar-submenu">	

	<?php // get_template_part('templates/module/home/section','parralax'); ?>

	<nav class="navbar navbar--main">
		<div class="container-fluid">
			<div class="navbar-logo">
				<?php if ( ( '' != $jlfoundation['site_logo']['url'] ) ) {
					$logo_url = $jlfoundation['site_logo']['url'];
					$site_url = get_bloginfo('url');
					$site_name = get_bloginfo('name');
					$site_description = get_bloginfo('description');
					if ( is_ssl() ) $logo_url = str_replace( 'http://', 'https://', $logo_url );
					echo '<a href="' . esc_url( $site_url ) . '" title="' . esc_attr( $site_description ) . '"><img data-pin-no-hover="true" src="'.$logo_url.'" alt="'.esc_attr($site_name).'"/></a>' . "\n";
					
				} // End IF Statement */
				?>
				<button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#aboutMenu">
					&#9776;
				</button>
			</div>

			<div class="navbar__main-nav">
				<?php main_nav('main-nav','nav-items'); ?>
			</div>

		</div>
	</nav>