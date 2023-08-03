<?php
if (!isset($content_width)) {
	$content_width = 1200;
}

add_action('after_setup_theme', 'usland_setup');
function usland_setup() {
	// Language
	load_theme_textdomain('usland', USLAND_BASE_DIR . 'languages');

	// Theme support
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('automatic-feed-links');
	add_theme_support( 'custom-header' );
	add_theme_support( "custom-background");
	add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));

	// Image sizes
	add_image_size( 'usland-banner', 1920, 397, true );
	add_image_size( 'usland-size', 1200, 500, true );
	add_image_size( 'usland-size1', 1600, 1010, true );
	add_image_size( 'usland-size2', 460, 460, true );
	add_image_size( 'usland-size3', 370, 270, true );
	add_image_size( 'usland-size4', 200, 200, true );
	add_image_size( 'usland-size5', 80, 80, true );
	add_image_size( 'usland-size6', 254, 300, true );
	add_image_size( 'usland-size7', 480, 400, true );
	add_image_size( 'usland-size8', 750, 430, true );

	// Register menus
	register_nav_menus(array(
		'primary' => esc_html__('Primary', 'usland'),
		'footer'  => esc_html__('Footer', 'usland'),
	));
}

add_editor_style();

function remove_wp_update_notifications( $value ){
    if ( isset( $value ) && is_object( $value ) ){
		unset( $value->response[ 'revslider/revslider.php' ] );
    }
    return $value;
}
add_filter( 'site_transient_update_plugins', 'remove_wp_update_notifications' );

add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );