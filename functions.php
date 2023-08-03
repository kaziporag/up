<?php
$usland_theme_data = wp_get_theme();
define( 'USLAND_THEME_VERSION', ( WP_DEBUG ) ? time() : $usland_theme_data->get( 'Version' ) );
define( 'USLAND_THEME_AUTHOR_URI', $usland_theme_data->get( 'AuthorURI' ) );

// DIR
define( 'USLAND_BASE_DIR',  	get_template_directory(). '/' );
define( 'USLAND_INC_DIR',   	USLAND_BASE_DIR . 'inc/' );
define( 'USLAND_LIB_DIR',   	USLAND_BASE_DIR . 'lib/' );
define( 'USLAND_WID_DIR',     	USLAND_INC_DIR . 'widgets/' );
define( 'USLAND_PLUGINS_DIR', 	USLAND_INC_DIR . 'plugins/' );
define( 'USLAND_JS_DIR',      	USLAND_BASE_DIR . 'assets/js/' );

// URL
define( 'USLAND_BASE_URL',    get_template_directory_uri(). '/' );
define( 'USLAND_ASSETS_URL',  USLAND_BASE_URL . 'assets/' );
define( 'USLAND_CSS_URL',     USLAND_ASSETS_URL . 'css/' );
define( 'USLAND_JS_URL',      USLAND_ASSETS_URL . 'js/' );
define( 'USLAND_IMG_URL',     USLAND_ASSETS_URL . 'images/' );


// Includes
require_once USLAND_INC_DIR . 'joi-redux-config.php';
require_once USLAND_INC_DIR . 'joi-usland.php';
require_once USLAND_INC_DIR . 'joi-helper-functions.php';
require_once USLAND_INC_DIR . 'joi-general.php';
require_once USLAND_INC_DIR . 'joi-scripts.php';
require_once USLAND_INC_DIR . 'joi-template-vars.php';
require_once USLAND_INC_DIR . 'joi-vc-settings.php';


// Widgets
require_once USLAND_WID_DIR . 'widget-settings.php';
require_once USLAND_WID_DIR . 'widget-fields.php';
require_once USLAND_WID_DIR . 'contact-widget.php';
require_once USLAND_WID_DIR . 'category-widget.php'; 
require_once USLAND_WID_DIR . 'recent-posts-widget.php'; 
require_once USLAND_WID_DIR . 'tags-widget.php';

// TGM Plugin Activation
if ( is_admin() ) {
	require_once USLAND_LIB_DIR . 'class-tgm-plugin-activation.php';
	require_once USLAND_INC_DIR . 'joi-tgm-config.php';
}