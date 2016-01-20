<?php


if (have_posts()) : $count = 0; while (have_posts()) : the_post(); $count++;
	echo '<div class="article--container">';
		get_template_part('templates/module/culture/feed','block');
	echo '</div>';
endwhile; endif; wp_reset_query();

?>