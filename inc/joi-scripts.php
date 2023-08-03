<?php
function usland_fonts_url(){
	$fonts_url = '';
	if ( 'off' !== _x( 'on', 'Google fonts - Open Sans and Roboto : on or off', 'usland' ) ) {
		$fonts_url = add_query_arg( 'family', urlencode( 'Open Sans:300,300i,400,400i,700,800|Roboto:100,100i,300,400,500,700,900&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
	}
	return $fonts_url;
}

/*add_action( 'wp_enqueue_scripts', 'usland_register_scripts', 12 );
function usland_register_scripts(){

}*/

add_action( 'wp_enqueue_scripts', 'usland_enqueue_scripts', 20 );
function usland_enqueue_scripts() {
	/*CSS*/
	wp_enqueue_style( 'bootstrap',            	USLAND_CSS_URL . 'bootstrap.min.css', array(), USLAND_THEME_VERSION );
	wp_enqueue_style( 'animate',         		USLAND_CSS_URL . 'animate.css', array(), USLAND_THEME_VERSION );
	wp_enqueue_style( 'awesome',   				USLAND_CSS_URL . 'font-awesome.css', array(), USLAND_THEME_VERSION );
	wp_enqueue_style( 'fancybox',       		USLAND_CSS_URL . 'jquery.fancybox.min.css', array(), USLAND_THEME_VERSION );
	wp_enqueue_style( 'usland-slick', 			USLAND_CSS_URL . 'slick.css', array(), USLAND_THEME_VERSION );
	wp_enqueue_style( 'usland-slick-theme', 	USLAND_CSS_URL . 'slick-theme.css', array(), USLAND_THEME_VERSION );
	wp_enqueue_style( 'usland-responsive',  	USLAND_CSS_URL . 'responsive.css', array(), USLAND_THEME_VERSION );
	wp_enqueue_style( 'usland-style',  			USLAND_CSS_URL . 'style.css', array(), USLAND_THEME_VERSION );
	if ( Usland::$options['menu_header_style'] == 'st1' || Usland::$options['menu_header_style'] == 'st3' ){
		wp_enqueue_style( 'usland-header-style-01',  USLAND_CSS_URL . 'header-01.css', array(), USLAND_THEME_VERSION );
	}elseif( Usland::$options['menu_header_style'] == 'st2' || Usland::$options['menu_header_style'] == 'st4' ){
		wp_enqueue_style( 'usland-header-style-02',  USLAND_CSS_URL . 'header-01.css', array(), USLAND_THEME_VERSION );
	}elseif( Usland::$options['menu_header_style'] == 'st5' ){
		wp_enqueue_style( 'usland-header-style-03',  USLAND_CSS_URL . 'header-02.css', array(), USLAND_THEME_VERSION );
	}else{
		wp_enqueue_style( 'usland-header-style-01',  USLAND_CSS_URL . 'header-01.css', array(), USLAND_THEME_VERSION );
	}
	ob_start();
	include USLAND_INC_DIR . 'joi-variable-style.php';
	include USLAND_INC_DIR . 'joi-variable-style-elementor.php';
	$variable_css  = ob_get_clean();
	$variable_css .= wp_kses_post( Usland::$options['custom_css'] ); // custom css
	wp_add_inline_style( 'usland-responsive', $variable_css );

	/*JS*/
	wp_enqueue_script( 'jquery',             	USLAND_JS_URL . 'jquery.min.js', array( 'jquery' ), USLAND_THEME_VERSION, true );
	wp_enqueue_script( 'popper-min',          	USLAND_JS_URL . 'popper.min.js', array( 'jquery' ), USLAND_THEME_VERSION, true );
	//if( Usland::$options['menu_header_style'] == 'st5' ){
	wp_enqueue_script( 'bootstrap-bundle-min',       	USLAND_JS_URL . 'bootstrap.bundle.min.js', array( 'jquery' ), USLAND_THEME_VERSION, true );
	//}
	wp_enqueue_script( 'jquery-fancybox',       USLAND_JS_URL . 'jquery.fancybox.js', array( 'jquery' ), USLAND_THEME_VERSION, true );
	wp_enqueue_script( 'appear',       			USLAND_JS_URL . 'appear.js', array( 'jquery' ), USLAND_THEME_VERSION, true );
	wp_enqueue_script( 'mixitup',       		USLAND_JS_URL . 'mixitup.js', array( 'jquery' ), USLAND_THEME_VERSION, true );
	wp_enqueue_script( 'slick',       			USLAND_JS_URL . 'slick.min.js', array( 'jquery' ), USLAND_THEME_VERSION, true );
	wp_enqueue_script( 'wow',     				USLAND_JS_URL . 'wow.js', array( 'jquery' ), USLAND_THEME_VERSION, true );
	wp_enqueue_script( 'script',       			USLAND_JS_URL . 'script.js', array( 'jquery' ), USLAND_THEME_VERSION, true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

// Admin Scripts
add_action( 'admin_enqueue_scripts', 'usland_admin_scripts', 12 );
function usland_admin_scripts(){
	global $pagenow, $typenow;

	wp_enqueue_style( 'font-awesome',	USLAND_CSS_URL . 'font-awesome.min.css', array(), USLAND_THEME_VERSION );
	
	if( !in_array( $pagenow, array('post.php', 'post-new.php', 'edit.php') ) ) return;
	
	if( $typenow == 'wlshowcasesc' ){
		wp_enqueue_style( 'usland-logo-showcase', USLAND_CSS_URL . 'admin-logo-showcase.css', array(), USLAND_THEME_VERSION );
	}
}