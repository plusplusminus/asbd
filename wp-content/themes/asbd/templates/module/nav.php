<?php global $jlfoundation; ?>
<?php global $jlfoundation_theme; ?>
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
				<button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#menu-primary">
					&#9776;
				</button>
			</div>

			<div id="menu-primary" class="navbar__main-nav collapse navbar-toggleable-md">
				<?php main_nav('main-nav','nav-items'); ?>
			</div>

		</div>
	</nav>