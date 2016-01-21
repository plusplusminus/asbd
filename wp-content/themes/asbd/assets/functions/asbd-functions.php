<?php
class asbdTheme {

	public function __construct() {

		$this->prefix = '_asbd_'; 
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
}
?>