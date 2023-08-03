<?php
add_action( 'template_redirect', 'usland_template_vars' );
function usland_template_vars() {
	// Single Pages
	if ( is_single() || is_page() ) {
		$post_type = get_post_type();
		$post_id = get_the_id();
		switch ( $post_type ) {
			case 'page':
			$prefix = 'page';
			break;
			case 'post':
			$prefix = 'single_post';
			break;
			case 'ulproperty':
			$prefix = 'property';
			break;
			case 'ulteam':
			$prefix = 'team';
			break;
			default:
			$prefix = 'single_post';
			break;
		}
		
		$layout          					= get_post_meta( $post_id, 'usland_layout_lay_default', true );
		$top_bar         					= get_post_meta( $post_id, 'usland_top_bar_default', true );
		$padding_top     					= get_post_meta( $post_id, 'usland_content_padding_top_default', true );
		$padding_bottom  					= get_post_meta( $post_id, 'usland_content_padding_bottom_default', true );
		$has_banner      					= get_post_meta( $post_id, 'usland_banner', true );
		$has_breadcrumb  					= get_post_meta( $post_id, 'usland_breadcrumb', true );
		$bgtype          					= get_post_meta( $post_id, 'usland_bgtype', true );
		$bgcolor         					= get_post_meta( $post_id, 'usland_bgcolor', true );
		$bgimg           					= get_post_meta( $post_id, 'usland_bgimg', true );
		$banner_padding_top_default        	= get_post_meta( $post_id, 'usland_banner_padding_top_default', true );
		$banner_padding_bottom_default      = get_post_meta( $post_id, 'usland_banner_padding_bottom_default', true );
		$revslider      					= get_post_meta( $post_id, 'usland_slider', true );
		
		if ( !empty( $bgimg ) ) {
			Usland::$bgimg =  $bgimg;
		}
		elseif ( !empty( Usland::$options[$prefix. '_bgimg']['id'] ) ) {
			$attch_url = wp_get_attachment_image_src( Usland::$options[$prefix. '_bgimg']['id'], 'usland-banner', true );
			Usland::$bgimg =  $attch_url[0];
		}
		else{
			Usland::$bgimg = USLAND_IMG_URL . 'banner.jpg';
		}
		
		Usland::$layout         = ( empty( $layout ) || $layout == 'default' ) ? Usland::$options[$prefix. '_layout']: $layout;

		Usland::$top_bar        = ( empty( $top_bar ) || $top_bar == 'default' ) ? Usland::$options['top_bar']: $top_bar;

		$padding_top             = ( empty( $padding_top ) || $padding_top == 'default' ) ? Usland::$options[$prefix. '_padding_top']: $padding_top;
		Usland::$padding_top    = (int) $padding_top;      

		$padding_bottom          = ( empty( $padding_bottom ) || $padding_bottom == 'default' ) ? Usland::$options[$prefix. '_padding_bottom']: $padding_bottom;
		Usland::$padding_bottom = (int) $padding_bottom; 
		
		Usland::$banner_padding_top_default = ( empty( $banner_padding_top_default ) || $banner_padding_top_default == 'default' ) ? Usland::$options[$prefix. '_banner_padding_top_default']: $banner_padding_top_default;
				
		Usland::$banner_padding_bottom_default = ( empty( $banner_padding_bottom_default ) || $banner_padding_bottom_default == 'default' ) ? Usland::$options[$prefix. '_banner_padding_bottom_default']: $banner_padding_bottom_default;
		
		Usland::$has_banner     = ( empty( $has_banner ) || $has_banner == 'default' ) ? Usland::$options[$prefix. '_banner']: $has_banner;

		Usland::$has_breadcrumb = ( empty( $has_breadcrumb ) || $has_breadcrumb == 'default' ) ? Usland::$options[$prefix. '_breadcrumb']: $has_breadcrumb;

		Usland::$bgtype         = ( empty( $bgtype ) || $bgtype == 'default' ) ? Usland::$options[$prefix. '_bgtype']: $bgtype;
		
		Usland::$bgcolor        = ( empty( $bgcolor ) || $bgcolor == 'default' ) ? Usland::$options[$prefix. '_bgcolor']: $bgcolor;
}
	// Blog and Archive
elseif ( is_home() || is_archive() || is_search() || is_404() ) {
	if ( is_search() ) {
		$prefix = 'search';
	}
	elseif( is_404() ){
		$prefix = 'error';
	}
	else{
		$prefix = 'blog';
	}
	
	//redux
	Usland::$layout         					= Usland::$options[$prefix. '_layout'];
	Usland::$top_bar        					= Usland::$options['top_bar'];
	Usland::$padding_top    					= Usland::$options[$prefix. '_padding_top'];
	Usland::$padding_bottom 					= Usland::$options[$prefix. '_padding_bottom'];
	Usland::$banner_padding_top_default    		= Usland::$options[$prefix. '_banner_padding_top_default'];
	Usland::$banner_padding_bottom_default 		= Usland::$options[$prefix. '_banner_padding_bottom_default'];
	Usland::$has_banner     					= Usland::$options[$prefix. '_banner'];
	Usland::$has_breadcrumb 					= Usland::$options[$prefix. '_breadcrumb'];
	Usland::$bgtype         					= Usland::$options[$prefix. '_bgtype'];
	Usland::$bgcolor        					= Usland::$options[$prefix. '_bgcolor'];
	Usland::$bgimg        	 					= Usland::$options[$prefix. '_bgimg'];

	if ( !empty( $bgimg ) ) {
			Usland::$bgimg =  $bgimg;
	}
	elseif ( !empty( Usland::$options[$prefix. '_bgimg']['id'] ) ) {
		$attch_url = wp_get_attachment_image_src( Usland::$options[$prefix. '_bgimg']['id'], 'usland-banner', true );
		Usland::$bgimg =  $attch_url[0];
	}
	else{
		Usland::$bgimg = USLAND_IMG_URL . 'banner.jpg';
	}		
}
}

// Add body class
add_filter( 'body_class' , 'usland_body_classes' );
function usland_body_classes( $classes ) {
	$classes[] = 'non-stick';
	$classes[] = ( Usland::$layout == 'full-width' ) ? 'no-sidebar' : 'has-sidebar';

	if ( isset( $_COOKIE["shopview"] ) && $_COOKIE["shopview"] == 'list' ) {
		$classes[] = 'product-list-view';
	}
	else {
		$classes[] = 'product-grid-view';
	}

	return $classes;
}