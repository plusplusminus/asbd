<?php
/*
Author: Sergio Pellegrini
URL: htp://www.plusplusminus.co.za
*/

require_once( 'library/navwalker.php' ); 
require_once( 'assets/functions/menu-functions.php' );

if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/library/admin/ReduxCore/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/library/admin/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/library/option-config.php' ) ) {
    require_once( dirname( __FILE__ ) . '/library/option-config.php' );
}

add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );

function be_initialize_cmb_meta_boxes() {
  if ( !class_exists( 'cmb_Meta_Box' ) ) {
    require_once( 'library/metabox/init.php' );
  }
}

require_once( 'library/bones.php' ); // if you remove this, bones will break
require_once( 'library/admin.php' ); // this comes turned off by default

require_once( 'assets/functions/admin-functions.php' ); 
require_once( 'assets/functions/jlfoundation-functions.php' ); 

$jlfoundation_theme = new jlfoundationTheme();

function main_nav($nav = 'secondary-nav',$class='nav_secondary') {
    // display the wp3 menu if available
    wp_nav_menu(array(
        'container' => false,                                       // remove nav container
        'container_class' => 'menu clearfix',                       // class of container (should you choose to use it)
        'menu' => __( 'The Secondary Menu', 'bonestheme' ),              // nav name
        'menu_class' => $class,              // adding custom nav class
        'theme_location' => $nav,                             // where it's located in the theme
        'before' => '',                                             // before the menu
        'after' => '',                                            // after the menu
        'link_before' => '',                                      // before each link
        'link_after' => '',                                       // after each link
        'depth' => 2,                                             // limit the depth of the nav
        'fallback_cb' => 'wp_bootstrap_navwalker::fallback',  // fallback               // for bootstrap nav
        'walker' => new wp_bootstrap_navwalker()                    // for bootstrap nav
    ));
} /* end bones main nav */

register_nav_menus(
    array(
        'main-nav' => __( 'The Main Menu', 'bonestheme' ),   // main nav in header
        'secondary-nav' => __( 'The Secondary Menu', 'bonestheme' ),   // main nav in header
        'footer-nav' => __( 'The Footer Menu', 'bonestheme' ),   // main nav in header
    )
);



add_filter('redux/options/jlfoundation/sections', 'child_sections');
function child_sections($sections){
    //$sections = array();
    $sections[] = array(
        'icon'          => 'ok',
        'icon_class'    => 'fa fa-gears',
        'title'         => __('Theme Options', 'peadig-framework'),
        'desc'          => __('<p class="description">Theme modifications</p>', 'ppm'),
        'fields' => array(
            array(
                'id'=>'site_logo',
                'type' => 'media', 
                'url'=> true,
                'title' => __('Site Logo', 'ppm'),
                'compiler' => 'true',
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'=> __('Select main logo from media gallery', 'ppm'),
                'default'=>array('url'=>'http://s.wordpress.org/style/images/codeispoetry.png'),
            ),
            array(
                'id'=>'booknow_image',
                'type' => 'media', 
                'url'=> true,
                'title' => __('Book Now Image', 'ppm'),
                'compiler' => 'true',
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'=> __('Select main menu book now from media gallery', 'ppm'),
                'default'=>array('url'=>'http://s.wordpress.org/style/images/codeispoetry.png'),
            ),
            array(
                'id'=>'preloader_image',
                'type' => 'media', 
                'url'=> true,
                'title' => __('Preloader Image', 'ppm'),
                'compiler' => 'true',
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'=> __('Select the preloader', 'ppm'),
                'default'=>array('url'=>'http://s.wordpress.org/style/images/codeispoetry.png'),
            ),
            array(
                'id'=>'footer_image',
                'type' => 'media', 
                'url'=> true,
                'title' => __('Footer Image', 'ppm'),
                'compiler' => 'true',
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'=> __('Select the footer banner', 'ppm'),
                'default'=>array('url'=>'http://s.wordpress.org/style/images/codeispoetry.png'),
            ),
            array(
                'id'=>'footer_logo',
                'type' => 'media', 
                'url'=> true,
                'title' => __('Footer Logo', 'ppm'),
                'compiler' => 'true',
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'=> __('Select the footer logo', 'ppm'),
                'default'=>array('url'=>'http://s.wordpress.org/style/images/codeispoetry.png'),
            ),
 
        )
    );


    $sections[] = array(
        'icon'          => 'ok',
        'icon_class'    => 'fa fa-heart',
        'title'         => __('Social Profiles', 'ppm-framework'),
        'desc'          => __('<p class="description">Singita Social Network URLS</p>', 'singita'),
        'fields' => array(
            array(
                'id'=>'twitter_url',
                'type' => 'text',
                'title' => __('Twitter', 'singita'),
                'desc' => __('Enter your Twitter url', 'singita'),
            ),  
            array(
                'id'=>'facebook_url',
                'type' => 'text',
                'title' => __('Facebook', 'singita'),
                'desc' => __('Enter your Facebook URL', 'singita'),
            ),  
            array(
                'id'=>'instagram_url',
                'type' => 'text',
                'title' => __('Instagram', 'singita'),
                'desc' => __('Enter your Instagram URL', 'singita'),
            ),  
            array(
                'id'=>'pinterest_url',
                'type' => 'text',
                'title' => __('Pinterest', 'singita'),
                'desc' => __('Enter your Pinterest URL', 'singita'),
            ),
            array(
                'id'=>'vimeo_url',
                'type' => 'text',
                'title' => __('Vimeo', 'singita'),
                'desc' => __('Enter your Vimeo URL', 'singita'),
            ),
        )
    );

    $sections[] = array(
        'icon'          => 'ok',
        'icon_class'    => 'fa fa-gears',
        'title'         => __('Navbar Options', 'singita'),
        'desc'          => __('<p class="description">Singita navigation options</p>', 'singita'),
        'fields' => array(
            array(
                'id'=>'navbar_cta_text',
                'type' => 'text',
                'title' => __('CTA Button Text', 'singita'),
                'desc' => __('Enter the text for the navbar call to action button...', 'singita'),
            ),
            array(
                'id'=>'navbar_cta_link',
                'type' => 'text',
                'title' => __('CTA Button Link', 'singita'),
                'desc' => __('Enter the text for the navbar call to action button url...', 'singita'),
            ), 
            array(
                'id'=>'call_cta_text',
                'type' => 'text',
                'title' => __('Call CTA Button Text', 'singita'),
                'desc' => __('Enter the text for the "call" cta button ...', 'singita'),
            ), 
            array(
                'id'=>'call_cta_header',
                'type' => 'text',
                'title' => __('Call CTA Dropdown Header', 'singita'),
                'desc' => __('Enter the text for the "call" cta header ...', 'singita'),
            ), 
            array(
                'id'=>'call_cta_content',
                'type' => 'textarea',
                'title' => __('Call CTA Dropdown Header Content', 'singita'),
                'desc' => __('Enter the text for the "call" cta content ...', 'singita'),
            ), 
            array(
                'id'=>'availability_cta_text',
                'type' => 'text',
                'title' => __('Availability CTA Button Text', 'singita'),
                'desc' => __('Enter the text for the Availability cta button ...', 'singita'),
            ), 
        )
    );

    $sections[] = array(
        'icon'          => 'ok',
        'icon_class'    => 'fa fa-gears',
        'title'         => __('Footer Options', 'singita'),
        'desc'          => __('<p class="description">Singita footer options</p>', 'singita'),
        'fields' => array(
            array(
                'id'=>'contact_email',
                'type' => 'text',
                'title' => __('Contact email address', 'singita'),
            ),
            array(
                'id'=>'contact_tel',
                'type' => 'text',
                'title' => __('Contact email phone number', 'singita'),
            ), 
            array(
                'id'=>'footer_image',
                'type' => 'media', 
                'url'=> true,
                'title' => __('Footer background image', 'ppm'),
                'compiler' => 'true',
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'=> __('Select the image for the footer background', 'ppm'),
                'default'=>array('url'=>'http://s.wordpress.org/style/images/codeispoetry.png'),
            ),
        )
    );

    return $sections;
}

add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'theme-slug' ),
        'id' => 'sidebar-1',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

}

function sergio($items) {
    echo '<pre>';
    print_r($items);
    echo '</pre>';
}

function new_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

add_image_size( 'blog-image-size', 548, 308, true ); 
add_image_size( 'square-image-size', 548, 335, true ); 
add_image_size( 'square-image', 360, 360, true ); 

// Support page Excerpts
add_action('init', 'my_custom_init');

function my_custom_init() {
    add_post_type_support( 'page', 'excerpt' );
}

// Add category to body class
add_filter('body_class','add_category_to_single');
function add_category_to_single($classes) {
    if (is_single() ) {
        global $post;
        foreach((get_the_category($post->ID)) as $category) {
            // add category slug to the $classes array
            $classes[] = $category->category_nicename . '__single--filter';
        }
    }
    // return the $classes array
    return $classes;
}


function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function siblings($link,$id) {
    global $post;
    $siblings = get_pages('child_of='.$id.'&parent='.$id);

    print_r($siblings);
    
    foreach ($siblings as $key=>$sibling){
        if ($id == $sibling->ID){
            $ID = $key;
        }
    }
    $closest = array('before'=>get_permalink($siblings[$ID-1]->ID),'after'=>get_permalink($siblings[$ID+1]->ID));

    if ($link == 'before' || $link == 'after') { echo $closest[$link]; } else { return $closest; }
}
?>