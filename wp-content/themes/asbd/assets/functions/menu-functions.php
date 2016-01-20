<?php
class ppm_menu_functions {

	public function __construct() {
		$this->_cache = array();

	}

	function social_menu($class="nav-social",$condensed = true) {
		global $singita;

		$menu_wrapper_start = '<ul class="'.$class.'">';
		$menu_wrapper_end = '</ul>';
		$menu_item = '';


		if ($singita['twitter_url']) 
			$menu_item .= '<li class="'.$class.'__item"><a title="Twitter" target="_blank" href="'.$singita['twitter_url'].'"><i class="icon icon-twitter"></i></a></li>';

		if ($singita['facebook_url']) 
			$menu_item .= '<li class="'.$class.'__item"><a title="Facebook" target="_blank" href="'.$singita['facebook_url'].'"><i class="icon icon-facebook"></i></a></li>';

		if ($singita['instagram_url']) 
			$menu_item .= '<li class="'.$class.'__item"><a title="Instagram" target="_blank" href="'.$singita['instagram_url'].'"><i class="icon icon-instagram"></i></a></li>';

		if ($singita['vimeo_url'] && !$condensed) 
			$menu_item .= '<li class="'.$class.'__item"><a title="Vimeo" target="_blank" href="'.$singita['vimeo_url'].'"><i class="icon icon-vimeo"></i></a></li>';

		if ($singita['pinterest_url'] && !$condensed) 
			$menu_item .= '<li class="'.$class.'__item"><a title="Pinterest" target="_blank" href="'.$singita['pinterest_url'].'"><i class="icon icon-pinterest-p"></i></a></li>';

		$output = sprintf("%s %s %s", $menu_wrapper_start, $menu_item,$menu_wrapper_end);

		return $output;
	}

	public function lodges_region_query() {


		if (empty($this->_cache['regions-lodges-nav'])) {

			$this->_cache['regions-lodges-nav'] = new WP_Query( array(
			  'connected_type' => 'lodges_to_regions',
			  'connected_items' => get_queried_object(),
			  'nopaging' => true,
			) );

		}

		
		return $this->_cache['regions-lodges-nav'];
	
	}

	public function lodges_layout_query() {


		if (empty($this->_cache['lodges-nav'])) {
			$items = $this->items_menu('lodges-nav');

			$this->_cache['lodges-nav'] = new WP_Query( 
				array(
					'post_type' => 'lodges',
					'posts_per_page' => -1,
					'post__in' => $items,
					'orderby' => 'post__in',
				) 
			);
		}

		
		return $this->_cache['lodges-nav'];
	
	}

	public function community_layout_query() {


		if (empty($this->_cache['community-nav'])) {
			$items = $this->items_menu('community-nav');

			$this->_cache['community-nav'] = new WP_Query( 
				array(
					'post_type' => 'community',
					'posts_per_page' => -1,
					'post__in' => $items,
					'orderby' => 'post__in',
				) 
			);
		}

		
		return $this->_cache['community-nav'];
	
	}

	public function archive_layout_query($post_type) {
		$nav = $post_type.'-nav';

		if (empty($this->_cache[$nav])) {
			$items = $this->items_menu($nav);

			$this->_cache[$nav] = new WP_Query( 
				array(
					'post_type' => $post_type,
					'posts_per_page' => -1,
					'post__in' => $items,
					'orderby' => 'post__in',
				) 
			);
		}
		
		return $this->_cache[$nav];
	
	}

	public function children_layout_query($id,$post_type='page') {
		$nav = $id.'-children';

		if (empty($this->_cache[$nav])) {
			$items = $this->items_menu($nav);

			$this->_cache[$nav] = new WP_Query( 
				array(
					'post_type' => $post_type,
					'posts_per_page' => -1,
					'post_parent' => $id,
					'orderby'=>'menu_order'
				) 
			);
		}
		
		return $this->_cache[$nav];
	
	}

	public function lodges_modal_menu($lodge_id,$modal_id,$class="modal-menu") {

		$links = array();

		$brochure_file = get_post_meta($lodge_id,'_singita_page_brochure',1);
		$brochure_title = get_post_meta($lodge_id,'_singita_page_brochure_title',1);
		
		$child_brochure_title = get_post_meta($modal_id,'_singita_page_brochure_title',1);
		$child_brochure_file = get_post_meta($modal_id,'_singita_page_brochure',1);

		if ($brochure_file) {
			$links[] = array('link'=>$brochure_file,'title'=>$brochure_title);
		}

		if ($child_brochure_file) {
			$links[] = array('link'=>$child_brochure_file,'title'=>$child_brochure_title);
		}
		


		$menu_list_start = '<ul class="'.$class.'">';
		$menu_list_end = '</ul>';
		$menu_list = '';

		foreach ( $links as $link ) {
			$title = $link['title'];
			$link = $link['link'];

			$menu_list .= sprintf('<li class="%s__item"><a class="%s__link" target="_download" href="%s" title="%s"><span class="icon icon-download"></span>	Download %s</a></li>',$class,$class,$link,$title,$title);
		}

		$menu_list .= sprintf('<li class="%s__item"><a class="js-print %s__link" href="#" title="Print this page"><span class="icon icon-print"></span>	Print this Page</a></li>',$class,$class);
		$menu_list .= sprintf('<li class="%s__item"><a class="%s__link" href="#" title="Print this page"><span class="icon icon-phone"></span>	Contact Us</a></li>',$class,$class);

		return sprintf("%s%s%s",$menu_list_start,$menu_list,$menu_list_end);


	}

	public function cc_modal_menu($cc_id,$class="modal-menu") {

		$links = array();

		$brochure_file = get_post_meta($cc_id,'_singita_page_brochure',1);
		

		if ($brochure_file) {
			$brochure_title = get_post_meta($cc_id,'_singita_page_brochure_title',1);
			$links[] = array('link'=>$brochure_file,'title'=>$brochure_title);
		}
	
		$menu_list_start = '<ul class="'.$class.'">';
		$menu_list_end = '</ul>';
		$menu_list = '';

		foreach ( $links as $link ) {
			$title = $link['title'];
			$link = $link['link'];

			$menu_list .= sprintf('<li class="%s__item"><a class="%s__link" target="_download" href="%s" title="%s"><span class="icon icon-download"></span>	Download %s</a></li>',$class,$class,$link,$title,$title);
		}

		$menu_list .= sprintf('<li class="%s__item"><a class="%s__link" href="#" title="Print this page"><span class="icon icon-email"></span>	Enquire Now</a></li>',$class,$class);

		return sprintf("%s%s%s",$menu_list_start,$menu_list,$menu_list_end);


	}

	public function lodge_sub_menu($menu) {

		
		$menu_list_start = '<ul class="'.$menu['class'].'">';
		$menu_list_end = '</ul>';
		$menu_list = '';

		foreach ( (array) $menu['items'] as $key => $menu_item ) {
				$title = $menu_item['title'];
				$link = $menu_item['link'];
				
				if ($menu_item['type'] == 'internal') {
					$menu_list .= sprintf('<li class="%s__item js-scrollto"><a class="nav-link" href="%s" title="%s">%s</a></li>',$menu['class'],$link,$title,$title);
				} else {
					$menu_list .= sprintf('<li class="%s__item"><a href="%s" class="nav-link" title="%s">%s</a></li>',$menu['class'],$link,$title,$title);
				}
		}

		return sprintf("%s%s%s",$menu_list_start,$menu_list,$menu_list_end);
		

	}

}

global $ppm_menus;
$ppm_menus = new ppm_menu_functions();


?>