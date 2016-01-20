<?php
class jlfoundationTheme {

	public function __construct() {

		$this->prefix = '_jlfoundation_'; 
		$this->_cache = array();
		$this->invType = array();
		$this->type = '';		
		
	}
	public function main_menu($menu_name='main-nav',$class="main-menu") {
	    if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
		$menu_items = wp_get_nav_menu_items($menu->term_id);

			$menu_list_start = '<ul class="nav-items">';
			$menu_list_end = '</ul>';
			$menu_list = '';

			foreach ( (array) $menu_items as $key => $menu_item ) {
					$title = $menu_item->title;
					$link = $menu_item->url;

					$menu_list .= sprintf('<li class="nav-items__item"><a class="nav-items__item--link" href="%s" title="%s">%s</a></li>',$link,$title,$title);
			}

			return sprintf("%s%s%s",$menu_list_start,$menu_list,$menu_list_end);
		}
		
	}

	public function footer_menu($menu_name='footer-nav',$class="footer-menu") {
	    if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
		$menu_items = wp_get_nav_menu_items($menu->term_id);

			$menu_list_start = '<ul class="nav-items">';
			$menu_list_end = '</ul>';
			$menu_list = '';

			foreach ( (array) $menu_items as $key => $menu_item ) {
					$title = $menu_item->title;
					$link = $menu_item->url;

					$menu_list .= sprintf('<li class="nav-items__item"><a class="nav-items__item--link" href="%s" title="%s">%s</a></li>',$link,$title,$title);
			}

			return sprintf("%s%s%s",$menu_list_start,$menu_list,$menu_list_end);
		}
		
	}

	public function home_page_menu() {

		global $post;

		$ancestors = get_post_ancestors( $post->ID );
		/* Get the top Level page->ID count base 1, array base 0 so -1 */ 
		$exclude = ($ancestors) ? $ancestors[0]: $post->ID;

		$args =  array();
		$args['post_type'] = 'page';
		$args['post__in'] = $this->menu_query_ids('main-nav',$exclude);
		$args['orderby'] = 'post__in';

		$query = new WP_Query($args);

		if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();

			get_template_part('templates/module/home/nav','block');

		endwhile; endif;

		wp_reset_query();

	}

	public function child_page_menu($type="condensed") {
	    global $post;

	    $ancestors = get_post_ancestors( $post->ID );
		/* Get the top Level page->ID count base 1, array base 0 so -1 */ 
		$parent = ($ancestors) ? $ancestors[0]: $post->ID;

	    $args =  array();
		$args['post_type'] = 'page';
		$args['orderby'] = 'menu_order';
		$args['order'] = 'ASC';
		$args['post_parent'] = $parent;

		$query = new WP_Query($args);
		$tmp = $post->ID;
		if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
			$post->old = $tmp;
			get_template_part('templates/module/home/nav',$type);

		endwhile; endif;

		wp_reset_query();
		
	}
		
	
	public function child_nav_pagination($parent=null) {
		global $post;
    	
    	if ($post->post_parent == 0) {
    		$children = get_pages( array(
				'sort_column' => 'menu_order',
				'sort_order'  => 'asc',
				'child_of'	  => $post->ID
			) );
			$pages = array(  );
			foreach( $children as $page )
				$pages[] += $page->ID;
				
			$prev = "";
			
			$next = (array_key_exists(0,$pages)) ? $pages[0] : "";
			
			return array('next'=>$next,'prev'=>$prev);

    	} else {
    		$child  = $post->ID;
			$parent = ( null !== $parent ) ? $parent : $post->post_parent;
			
			$children = get_pages( array(
						'sort_column' => 'menu_order',
						'sort_order'  => 'ASC',
						'child_of'	  => $parent
						) );
			
			$pages = array( $parent );
			foreach( $children as $page )
				$pages[] += $page->ID;
			
			if( ! in_array( $child, $pages ) && ! is_page( $parent ) )
				return;
			
			$current = array_search( $child, $pages );
				
			$prev = (array_key_exists($current-1,$pages)) ? $pages[$current-1] : "";
			$next = (array_key_exists($current+1,$pages)) ? $pages[$current+1] : "";
			
			return array('next'=>$next,'prev'=>$prev);
    	}
	}	

	private function menu_query_ids($menu_name='main-nav',$exclude="") {
	    if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
		$menu_items = wp_get_nav_menu_items($menu->term_id);

			$arr = array();

			foreach ( (array) $menu_items as $key => $menu_item ) {
				if ($menu_item->object_id == $exclude) continue;
				$arr[] = $menu_item->object_id;				
			}

			return $arr;
		}
		
	}

	public function category_menu($tax="culture-type") {
		$terms = get_terms( $tax );

		echo '<ul class="filter-list">';

		foreach ( $terms as $term ) {

		    // The $term is an object, so we don't need to specify the $taxonomy.
		    $term_link = get_term_link( $term );
		   
		    // If there was an error, continue to the next term.
		    if ( is_wp_error( $term_link ) ) {
		        continue;
		    }

		    $term_icon = get_term_meta( $term->term_id, '_jlfoundation_terms_cat-icon', true );
		    // We successfully got a link. Print it out.
		    echo '<li class="filter-list__item filter-list__item--filter-'.$term->slug.'"> <i class="icon '.$term_icon.'"></i> <a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></li>';
		}
		
		echo '</ul>';

	}

	public function community_news_menu($tax="community-news-type") {
		$terms = get_terms( $tax );

		echo '<ul class="filter-list">';

		foreach ( $terms as $term ) {

		    // The $term is an object, so we don't need to specify the $taxonomy.
		    $term_link = get_term_link( $term );
		   
		    // If there was an error, continue to the next term.
		    if ( is_wp_error( $term_link ) ) {
		        continue;
		    }

		    $term_icon = get_term_meta( $term->term_id, '_jlfoundation_terms_cat-icon', true );
		    // We successfully got a link. Print it out.
		    echo '<li class="filter-list__item filter-list__item--filter-'.$term->slug.'"> <i class="icon '.$term_icon.'"></i> <a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></li>';
		}
		
		echo '</ul>';

	}

	public function kids_news_menu($tax="kids-news-type") {
		$terms = get_terms( $tax );

		echo '<ul class="filter-list">';

		foreach ( $terms as $term ) {

		    // The $term is an object, so we don't need to specify the $taxonomy.
		    $term_link = get_term_link( $term );
		   
		    // If there was an error, continue to the next term.
		    if ( is_wp_error( $term_link ) ) {
		        continue;
		    }

		    $term_icon = get_term_meta( $term->term_id, '_jlfoundation_terms_cat-icon', true );
		    // We successfully got a link. Print it out.
		    echo '<li class="filter-list__item filter-list__item--filter-'.$term->slug.'"> <i class="icon '.$term_icon.'"></i> <a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></li>';
		}
		
		echo '</ul>';

	}

	public function kids_store_menu($tax="kids-store-type") {
		$terms = get_terms( $tax );

		echo '<ul class="filter-list">';

		foreach ( $terms as $term ) {

		    // The $term is an object, so we don't need to specify the $taxonomy.
		    $term_link = get_term_link( $term );
		   
		    // If there was an error, continue to the next term.
		    if ( is_wp_error( $term_link ) ) {
		        continue;
		    }

		    $term_icon = get_term_meta( $term->term_id, '_jlfoundation_terms_cat-icon', true );
		    // We successfully got a link. Print it out.
		    echo '<li class="filter-list__item filter-list__item--filter-'.$term->slug.'"> <i class="icon '.$term_icon.'"></i> <a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></li>';
		}
		
		echo '</ul>';

	}
}
?>