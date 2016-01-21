<?php
class ckCustomPostTypes {

	public function __construct() {

		add_action( 'cmb2_init', array($this,'asbd_custom_meta'));
		
	}

/**---------------------
 ** Custom Meta Boxes **
 ----------------------*/

	public function asbd_custom_meta() {

		$prefix = '_asbd_';
		// NEW META
	 	$page_meta = new_cmb2_box( array(
			'id'            => $prefix . 'page_meta',
			'title'         => __( 'Page Options', 'cmb2' ),
			'object_types'  => array( 'page' ), // Post type
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
		) );

		$page_meta->add_field( array(
			'name'       => __( 'Page Title', 'cmb2' ),
			'desc'       => __( 'Alternate page title', 'cmb2' ),
			'id'         => $prefix . 'page_title',
			'type'    => 'wysiwyg',
			'options' => array(
			    'wpautop' => true, // use wpautop?
			    'media_buttons' => false, // show insert/upload button(s)
			    'textarea_rows' => get_option('default_post_edit_rows', 3), // rows="..."
			    'teeny' => true, // output the minimal editor config used in Press This
			),
		) );

		$page_meta->add_field( array(
			'name'       => __( 'Page Sub Title', 'cmb2' ),
			'id'         => $prefix . 'page_sub_title',
			'type'       => 'text',
		) );


		$page_meta->add_field( array(
			'name'       => __( 'Page Quote Author', 'cmb2' ),
			'id'         => $prefix . 'page_quote_author',
			'type'       => 'text',
		) );

		$page_meta->add_field( array(
			'name'       => __( 'Page Quote Text', 'cmb2' ),
			'id'         => $prefix . 'page_quote_content',
			'type'       => 'textarea',
		) );

		$page_meta->add_field( array(
			'name'       => __( 'Button Label', 'cmb2' ),
			'id'         => $prefix . 'page_btn_label',
			'type'       => 'text',
			'show_on_cb'  => 'cmb_id_is_cta',
		) );

		$page_meta->add_field( array(
			'name'       => __( 'Button Link', 'cmb2' ),
			'id'         => $prefix . 'page_btn_link',
			'type'       => 'text_url',
			'show_on_cb'  => 'cmb_id_is_cta',
		) );


		//---
		// CMB2 Conditional Functions
		//---
		
		function cmb_id_is_cta($field) { global $post; return ($post->ID == 69) ; }
		
	} 
}

global $cpt; 
$cpt = new ckCustomPostTypes(); 