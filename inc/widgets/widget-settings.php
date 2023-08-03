<?php
add_action( 'widgets_init', 'usland_widgets_init' );
function usland_widgets_init() {

	// Register Custom Widgets
	register_widget( 'Usland_Contact_Info_Widget' );
	register_widget( 'Usland_Category_Widget' );
	register_widget( 'Usland_Recent_Post_Widget' );
	register_widget( 'Usland_Tags_Widget' );

	// Register Widget Areas
	$footer_count = wp_get_sidebars_widgets();
	$footer_count = empty( $footer_count['footer'] ) ? 4 : count( $footer_count['footer'] );
	switch ( $footer_count ) {
		case '1':
		$footer_class = 'col-lg-12 col-sm-12 col-xs-12';
		break;
		case '2':
		$footer_class = 'col-lg-6 col-sm-6 col-md-6 col-xs-12';
		break;
		case '3':
		$footer_class = 'col-lg-4 col-sm-4 col-md-4 col-xs-12';
		break;		
		default:
		$footer_class = 'col-lg-3 col-sm-6 col-md-6 col-xs-12';
		break;
	}

	register_sidebar( array(
		'name'          => __( 'Sidebar', 'usland' ),
		'id'            => 'sidebar',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="all-title"><h3><span>',
		'after_title'   => '</span></h3></div>',
		) );
	register_sidebar( array(
		'name'          => __( 'Footer', 'usland' ),
		'id'            => 'footer',
		'before_widget' => '<div class="footer-col '.$footer_class.'">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
		) );
}