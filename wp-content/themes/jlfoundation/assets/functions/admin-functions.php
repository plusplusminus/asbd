<?php
class ckCustomPostTypes {

	public function __construct() {

		add_action( 'cmb2_init', array($this,'jlfoundation_custom_meta'));
		add_action( 'cmb2_admin_init', array($this,'taxonomy_register_taxonomy_metabox' ));
		add_action('init',array($this,'jlfoundation_custom_posts'));
		add_action('init',array($this,'jlfoundation_taxonomies'));
		
	}

/**---------------------
 ** Term Meta **
 ----------------------*/

		function taxonomy_register_taxonomy_metabox() {

		$prefix = '_jlfoundation_terms_';

		/**
		 * Metabox to add fields to categories and tags
		 */
		$cmb_term = new_cmb2_box( array(
			'id'               => $prefix . 'cat-options',
			'title'            => __( 'Category Options', 'cmb2' ),
			'object_types'     => array( 'term' ), // Tells CMB2 to use term_meta vs post_meta
			'taxonomies'       => array( 'culture-type','community-news-type','kids-news-type','kids-store-type' ), // Tells CMB2 which taxonomies should have these fields
			'new_term_section' => true, // Will display in the "Add New Category" section
		) );


		$cmb_term->add_field( array(
			'name' => __( 'Term Icon', 'cmb2' ),
			'desc' => __( 'Icon for the category', 'cmb2' ),
			'id'   => $prefix . 'cat-icon',
			'type' => 'text',
		) );

	}

/**---------------------
 ** Custom Post Types **
 ----------------------*/

    public function jlfoundation_custom_posts(){
		
		register_post_type(	'culture-item', 
			array(	
				'label' 			=> __('Community Items'),
				'labels' 			=> array(	'name' 					=> __('Culture Items'),
												'singular_name' 		=> __('Items'),
												'add_new' 				=> __('Add New'),
												'add_new_item' 			=> __('Add New Culture Item'),
												'edit' 					=> __('Edit'),
												'edit_item' 			=> __('Edit Culture Item'),
												'new_item' 				=> __('New Culture Item'),
												'view_item'				=> __('View Culture Item'),
												'search_items' 			=> __('Search Culture Items'),
												'not_found' 			=> __('No Culture Item found'),
												'not_found_in_trash' 	=> __('No Culture Item found in trash')	),
				'public' 			=> true,
				'can_export'		=> true,
				'show_ui' 			=> true, 
				'_builtin' 			=> false, 
				'_edit_link' 		=> 'post.php?post=%d',
				'capability_type' 	=> 'post',
				'menu_icon' 		=> 'dashicons-admin-home',
				'hierarchical' 		=> true,
				'has_archive' 		=> true,
				'rewrite' 			=> array(	"slug" => "culture-item"	), 
				'query_var' 		=> "culture-item", 
				'supports' 			=> array(	'title',																
												'editor',
												'excerpt',
												'page-attributes',
												'thumbnail'
												),
				'show_in_nav_menus'	=> true ,
				'taxonomies'		=> array( "culture-type")
			)
		);



		register_post_type(	'community-news-item', 
			array(	
				'label' 			=> __('Community News Items'),
				'labels' 			=> array(	'name' 					=> __('Community News'),
												'singular_name' 		=> __('Items'),
												'add_new' 				=> __('Add New'),
												'add_new_item' 			=> __('Add New News Item'),
												'edit' 					=> __('Edit'),
												'edit_item' 			=> __('Edit News Item'),
												'new_item' 				=> __('New News Item'),
												'view_item'				=> __('View News Item'),
												'search_items' 			=> __('Search News Items'),
												'not_found' 			=> __('No News Item found'),
												'not_found_in_trash' 	=> __('No News Item found in trash')	),
				'public' 			=> true,
				'can_export'		=> true,
				'show_ui' 			=> true, 
				'_builtin' 			=> false, 
				'_edit_link' 		=> 'post.php?post=%d',
				'capability_type' 	=> 'post',
				'menu_icon' 		=> 'dashicons-admin-home',
				'hierarchical' 		=> true,
				'has_archive' 		=> true,
				'rewrite' 			=> array(	"slug" => "community-news-item"	), 
				'query_var' 		=> "community-news-item", 
				'supports' 			=> array(	'title',																
												'editor',
												'excerpt',
												'page-attributes',
												'thumbnail'
												),
				'show_in_nav_menus'	=> true ,
				'taxonomies'		=> array( "community-news-type")
			)
		);

		register_post_type(	'kids-news-item', 
			array(	
				'label' 			=> __('Kids News Items'),
				'labels' 			=> array(	'name' 					=> __('Kids News'),
												'singular_name' 		=> __('Items'),
												'add_new' 				=> __('Add New'),
												'add_new_item' 			=> __('Add New News Item'),
												'edit' 					=> __('Edit'),
												'edit_item' 			=> __('Edit News Item'),
												'new_item' 				=> __('New News Item'),
												'view_item'				=> __('View News Item'),
												'search_items' 			=> __('Search News Items'),
												'not_found' 			=> __('No News Item found'),
												'not_found_in_trash' 	=> __('No News Item found in trash')	),
				'public' 			=> true,
				'can_export'		=> true,
				'show_ui' 			=> true, 
				'_builtin' 			=> false, 
				'_edit_link' 		=> 'post.php?post=%d',
				'capability_type' 	=> 'post',
				'menu_icon' 		=> 'dashicons-admin-home',
				'hierarchical' 		=> true,
				'has_archive' 		=> true,
				'rewrite' 			=> array(	"slug" => "kids-news-item"	), 
				'query_var' 		=> "kids-news-item", 
				'supports' 			=> array(	'title',																
												'editor',
												'excerpt',
												'page-attributes',
												'thumbnail'
												),
				'show_in_nav_menus'	=> true ,
				'taxonomies'		=> array( "kids-news-type")
			)
		);


		register_post_type(	'kids-store-item', 
			array(	
				'label' 			=> __('Kids Store Items'),
				'labels' 			=> array(	'name' 					=> __('Kids Store'),
												'singular_name' 		=> __('Items'),
												'add_new' 				=> __('Add New'),
												'add_new_item' 			=> __('Add New Store Item'),
												'edit' 					=> __('Edit'),
												'edit_item' 			=> __('Edit Store Item'),
												'new_item' 				=> __('New Store Item'),
												'view_item'				=> __('View Store Item'),
												'search_items' 			=> __('Search Store Items'),
												'not_found' 			=> __('No Store Item found'),
												'not_found_in_trash' 	=> __('No Store Item found in trash')	),
				'public' 			=> true,
				'can_export'		=> true,
				'show_ui' 			=> true, 
				'_builtin' 			=> false, 
				'_edit_link' 		=> 'post.php?post=%d',
				'capability_type' 	=> 'post',
				'menu_icon' 		=> 'dashicons-admin-home',
				'hierarchical' 		=> true,
				'has_archive' 		=> true,
				'rewrite' 			=> array(	"slug" => "kids-store-item"	), 
				'query_var' 		=> "kids-store-item", 
				'supports' 			=> array(	'title',																
												'editor',
												'excerpt',
												'page-attributes',
												'thumbnail'
												),
				'show_in_nav_menus'	=> true ,
				'taxonomies'		=> array( "kids-store-type")
			)
		);


		register_post_type(	'kids-dyk-item', 
			array(	
				'label' 			=> __('Kids DYK Items'),
				'labels' 			=> array(	'name' 					=> __('Kids DYK'),
												'singular_name' 		=> __('Items'),
												'add_new' 				=> __('Add New'),
												'add_new_item' 			=> __('Add New DYK Item'),
												'edit' 					=> __('Edit'),
												'edit_item' 			=> __('Edit DYK Item'),
												'new_item' 				=> __('New DYK Item'),
												'view_item'				=> __('View DYK Item'),
												'search_items' 			=> __('Search DYK Items'),
												'not_found' 			=> __('No DYK Item found'),
												'not_found_in_trash' 	=> __('No DYK Item found in trash')	),
				'public' 			=> true,
				'can_export'		=> true,
				'show_ui' 			=> true, 
				'_builtin' 			=> false, 
				'_edit_link' 		=> 'post.php?post=%d',
				'capability_type' 	=> 'post',
				'menu_icon' 		=> 'dashicons-admin-home',
				'hierarchical' 		=> true,
				'has_archive' 		=> true,
				'rewrite' 			=> array(	"slug" => "kids-dyk-item"	), 
				'query_var' 		=> "kids-dyk-item", 
				'supports' 			=> array(	'title',																
												'editor',
												'page-attributes',
												'thumbnail'
												),
				'show_in_nav_menus'	=> true ,
			)
		);
	}
/**---------------------
 ** Custom Post Types Taxonomies**
 ----------------------*/
 public function jlfoundation_taxonomies() {	

	$labels = array(
		'name'              => __( 'Culture Item Type', 'taxonomy general name' ),
		'singular_name'     => __( 'Culture Item Type', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Type' ),
		'all_items'         => __( 'All Types' ),
		'parent_item'       => __( 'Parent Type' ),
		'parent_item_colon' => __( 'Parent Type:' ),
		'edit_item'         => __( 'Edit Type' ),
		'update_item'       => __( 'Update Type' ),
		'add_new_item'      => __( 'Add New Type' ),
		'new_item_name'     => __( 'New Type Name' ),
		'menu_name'         => __( 'Culture Type' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'culture-type' ),
	);

	register_taxonomy( 'culture-type', array('culture-item'), $args );

	$labels = array(
		'name'              => __( 'Community News Item Type', 'taxonomy general name' ),
		'singular_name'     => __( 'Community News Item Type', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Type' ),
		'all_items'         => __( 'All Types' ),
		'parent_item'       => __( 'Parent Type' ),
		'parent_item_colon' => __( 'Parent Type:' ),
		'edit_item'         => __( 'Edit Type' ),
		'update_item'       => __( 'Update Type' ),
		'add_new_item'      => __( 'Add New Type' ),
		'new_item_name'     => __( 'New Type Name' ),
		'menu_name'         => __( 'News Type' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'community-news-type' ),
	);

	register_taxonomy( 'community-news-type', array('community-news-item'), $args );

	$labels = array(
		'name'              => __( 'Kids News Item Type', 'taxonomy general name' ),
		'singular_name'     => __( 'Kids News Item Type', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Type' ),
		'all_items'         => __( 'All Types' ),
		'parent_item'       => __( 'Parent Type' ),
		'parent_item_colon' => __( 'Parent Type:' ),
		'edit_item'         => __( 'Edit Type' ),
		'update_item'       => __( 'Update Type' ),
		'add_new_item'      => __( 'Add New Type' ),
		'new_item_name'     => __( 'New Type Name' ),
		'menu_name'         => __( 'News Type' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'kids-news-type' ),
	);

	register_taxonomy( 'kids-news-type', array('kids-news-item'), $args );

	$labels = array(
		'name'              => __( 'Kids Store Item Type', 'taxonomy general name' ),
		'singular_name'     => __( 'Kids Store Item Type', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Type' ),
		'all_items'         => __( 'All Types' ),
		'parent_item'       => __( 'Parent Type' ),
		'parent_item_colon' => __( 'Parent Type:' ),
		'edit_item'         => __( 'Edit Type' ),
		'update_item'       => __( 'Update Type' ),
		'add_new_item'      => __( 'Add New Type' ),
		'new_item_name'     => __( 'New Type Name' ),
		'menu_name'         => __( 'Store Item Type' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'kids-store-type' ),
	);

	register_taxonomy( 'kids-store-type', array('kids-store-item'), $args );


}

/**---------------------
 ** Custom Meta Boxes **
 ----------------------*/

	public function jlfoundation_custom_meta() {

		$prefix = '_jlfoundation_';
		// NEW META
	 	$parent_page_meta = new_cmb2_box( array(
			'id'            => $prefix . 'parent_page_meta',
			'title'         => __( 'Parent Page Options', 'cmb2' ),
			'object_types'  => array( 'page' ), // Post type
	        'show_on'       => array( 'key' => 'page-template', 'value' => 'template-parent.php' ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
		) );

		$parent_page_meta->add_field( array(
			'name'       => __( 'Hero Text', 'cmb2' ),
			'desc'       => __( 'Text to appear over hero image', 'cmb2' ),
			'id'         => $prefix . 'parent_hero_text',
			'type'       => 'wysiwyg',
			'options' => array(
				'teeny' => true,
				'wpautop' => true,
				'textarea_rows' => get_option('default_post_edit_rows', 1),
				'media_buttons' => false
			),
		) );

	 	$page_meta = new_cmb2_box( array(
			'id'            => $prefix . 'page_meta',
			'title'         => __( 'General Page Options', 'cmb2' ),
			'object_types'  => array( 'page' ), // Post type
	        'show_on'       => array( 'key' => 'page-template', 'value' => array('template-parent.php','template-home.php','template-donate.php') ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
		) );


		$page_meta->add_field( array(
			'name'       => __( 'Short Menu Title', 'cmb2' ),
			'id'         => $prefix . 'short_title',
			'type'       => 'text',
		) );

		$page_meta->add_field( array(
			'name'       => __( 'Page Sub Title', 'cmb2' ),
			'id'         => $prefix . 'page_subtitle',
			'type'       => 'text',
		) );

		$page_meta->add_field( array(
			'name'       => __( 'Page Introduction', 'cmb2' ),
			'desc'       => __( 'Introduction paragraph for page', 'cmb2' ),
			'id'         => $prefix . 'page_intro',
			'show_on_cb'  => 'cmb_id_not_home',
			'type'       => 'wysiwyg',
			'options' => array(
				'teeny' => true,
				'textarea_rows' => get_option('default_post_edit_rows', 5),
				'media_buttons' => true
			),
		) );

		$page_meta->add_field( array(
			'name'       => __( 'Page Details', 'cmb2' ),
			'desc'       => __( 'More detailed paragraph for page', 'cmb2' ),
			'id'         => $prefix . 'page_details',
			'show_on_cb'  => 'cmb_id_donate',
			'type'       => 'wysiwyg',
			'options' => array(
				'teeny' => true,
				'textarea_rows' => get_option('default_post_edit_rows', 5),
				'media_buttons' => false
			),
		) );

	 	$culture_meta = new_cmb2_box( array(
			'id'            => $prefix . 'page_culture_meta',
			'title'         => __( 'Culture Page Options', 'cmb2' ),
			'object_types'  => array( 'page' ), // Post type
			'show_on'       => array( 'key' => 'page-template', 'value' => array('template-culture.php') ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
		) );

		$culture_meta->add_field( array(
			'name'       => __( 'Walt Whitman Caption', 'cmb2' ),
			'id'         => $prefix . 'page_whitman_caption',
			'show_on_cb'  => 'cmb_id_culture',
			'priority'      => 'low',
			'type'       => 'wysiwyg',
			'priority'      => 'low',
			'options' => array(
				'teeny' => true,
				'textarea_rows' => get_option('default_post_edit_rows', 5),
				'media_buttons' => false
			),
		) );

		$culture_meta->add_field( array(
			'name'       => __( 'Walt Whitman Title', 'cmb2' ),
			'id'         => $prefix . 'page_whitman_title',
			'show_on_cb'  => 'cmb_id_community',
			'priority'      => 'low',
			'type'       => 'wysiwyg',
			'priority'      => 'low',
			'options' => array(
				'teeny' => true,
				'textarea_rows' => get_option('default_post_edit_rows', 5),
				'media_buttons' => false
			),
		) );

		$culture_meta->add_field( array(
			'name'       => __( 'Walt Whitman Details', 'cmb2' ),
			'desc'       => __( 'More detailed paragraph for page', 'cmb2' ),
			'id'         => $prefix . 'page_whitman_details',
			'show_on_cb'  => 'cmb_id_community',
			'type'       => 'wysiwyg',
			'priority'      => 'low',
			'options' => array(
				'teeny' => true,
				'textarea_rows' => get_option('default_post_edit_rows', 5),
				'media_buttons' => false
			),
		) );


	 	$child_page_meta = new_cmb2_box( array(
			'id'            => $prefix . 'child_page_meta',
			'title'         => __( 'Child Page Options', 'cmb2' ),
			'object_types'  => array( 'page' ), // Post type
			'context'       => 'normal',
			'priority'      => 'low',
			'show_names'    => true,
		) );

		$child_page_meta->add_field( array(
			'name'       => __( 'Short Menu Title', 'cmb2' ),
			'id'         => $prefix . 'short_title',
			'type'       => 'text',
		) );

		$child_page_meta->add_field( array(
			'name'       => __( 'Child Page Introduction', 'cmb2' ),
			'desc'       => __( 'Introduction paragraph for child page', 'cmb2' ),
			'id'         => $prefix . 'child_page_intro',
			'type'       => 'wysiwyg',
			'options' => array(
				'wpautop' => true,
				'teeny' => true,
				'textarea_rows' => get_option('default_post_edit_rows', 5),
				'media_buttons' => false
			),
		) );

	 	$donate_meta = new_cmb2_box( array(
			'id'            => $prefix . 'donate_meta',
			'title'         => __( 'Donation Options', 'cmb2' ),
			'object_types'  => array( 'page' ), // Post type
	        'show_on'       => array( 'key' => 'page-template', 'value' => array('template-donate.php') ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
		) );

		$donate_meta->add_field( array(
			'name'       => __( 'Tax Information', 'cmb2' ),
			'id'         => $prefix . 'tax_text',
			'type'       => 'textarea',
		) );


	 	$news_item_meta = new_cmb2_box( array(
			'id'            => $prefix . 'news_item_meta',
			'title'         => __( 'News Item Options', 'cmb2' ),
			'object_types'  => array( 'community-news-item' ), // Post type
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
		) );

		$news_item_meta->add_field( array(
			'name'       => __( 'Item Link', 'cmb2' ),
			'desc'       => __( 'Link to where the post should direct', 'cmb2' ),
			'id'         => $prefix . 'news_item_link',
			'type'       => 'text_url',
		) );

		$news_item_meta->add_field( array(
			'name'       => __( 'Item Meta 1', 'cmb2' ),
			'desc'       => __( '1st Line of Aditional info to appear below title', 'cmb2' ),
			'id'         => $prefix . 'news_item_meta_1',
			'type'       => 'text',
		) );

		$news_item_meta->add_field( array(
			'name'       => __( 'Item Meta 2', 'cmb2' ),
			'desc'       => __( '2nd line of Aditional info', 'cmb2' ),
			'id'         => $prefix . 'news_item_meta_2',
			'type'       => 'text',
		) );


	 	$kids_news_item_meta = new_cmb2_box( array(
			'id'            => $prefix . 'kids_news_item_meta',
			'title'         => __( 'News Item Options', 'cmb2' ),
			'object_types'  => array( 'kids-news-item' ), // Post type
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
		) );

		$kids_news_item_meta->add_field( array(
			'name'       => __( 'Item Link', 'cmb2' ),
			'desc'       => __( 'Link to where the post should direct', 'cmb2' ),
			'id'         => $prefix . 'kids_news_item_link',
			'type'       => 'text_url',
		) );

		$kids_news_item_meta->add_field( array(
			'name'       => __( 'Item Meta 1', 'cmb2' ),
			'desc'       => __( '1st Line of Aditional info to appear below title', 'cmb2' ),
			'id'         => $prefix . 'kids_news_item_meta_1',
			'type'       => 'text',
		) );

		$kids_news_item_meta->add_field( array(
			'name'       => __( 'Item Meta 2', 'cmb2' ),
			'desc'       => __( '2nd line of Aditional info', 'cmb2' ),
			'id'         => $prefix . 'kids_news_item_meta_2',
			'type'       => 'text',
		) );

	 	$kids_store_item_meta = new_cmb2_box( array(
			'id'            => $prefix . 'kids_store_item_meta',
			'title'         => __( 'Store Item Options', 'cmb2' ),
			'object_types'  => array( 'kids-store-item' ), // Post type
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
		) );

		$kids_store_item_meta->add_field( array(
			'name'       => __( 'Item Link', 'cmb2' ),
			'desc'       => __( 'Link to where the post should direct', 'cmb2' ),
			'id'         => $prefix . 'kids_store_item_link',
			'type'       => 'text_url',
		) );

	 	$culture_item_meta = new_cmb2_box( array(
			'id'            => $prefix . 'culture_item_meta',
			'title'         => __( 'Culture Item Options', 'cmb2' ),
			'object_types'  => array( 'culture-item' ), // Post type
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
		) );

		$culture_item_meta->add_field( array(
			'name'       => __( 'Item Link', 'cmb2' ),
			'desc'       => __( 'Link to where the post should direct', 'cmb2' ),
			'id'         => $prefix . 'culture_item_link',
			'type'       => 'text_url',
		) );

		$culture_item_meta->add_field( array(
			'name'       => __( 'Item Meta 1', 'cmb2' ),
			'desc'       => __( '1st Line of Aditional info to appear below title', 'cmb2' ),
			'id'         => $prefix . 'culture_item_meta_1',
			'type'       => 'text',
		) );

		$culture_item_meta->add_field( array(
			'name'       => __( 'Item Meta 2', 'cmb2' ),
			'desc'       => __( '2nd line of Aditional info', 'cmb2' ),
			'id'         => $prefix . 'culture_item_meta_2',
			'type'       => 'text',
		) );


		//---
		// CMB2 Conditional Functions
		//---

		// Page Title on Home Page
		function cmb_id_home($field) { global $post; return ($post->ID == 50) ; }

		function cmb_id_not_home($field) { global $post; return ($post->ID != 50) ; }

		// Donate page detailed intro
		function cmb_id_donate($field) { global $post; return ($post->ID == 20) ; }

		// Community page
		function cmb_id_culture($field) { global $post; return ($post->ID == 31) ; }

		
	} 
}

global $cpt; 
$cpt = new ckCustomPostTypes(); 