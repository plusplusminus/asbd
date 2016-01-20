<?php
// Fix for the WordPress 3.0 "paged" bug.

$paged = 1;
if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
if ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
$paged = intval( $paged );

// Exclude categories on the homepage.

$query_args = array('post_type' =>'culture-item','orderby'=>'date', 'order'=>'desc');

query_posts( $query_args );

if (have_posts()) : $count = 0; while (have_posts()) : the_post(); $count++;
	echo '<div class="article--container">';
		get_template_part('templates/module/culture/feed','block');
	echo '</div>';
endwhile; endif; wp_reset_query();

?>