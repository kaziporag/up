<?php
if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
	$usland_title = woocommerce_page_title( false );
}
elseif ( is_404() ) {
	$usland_title = Usland::$options['error_title'];
}
elseif ( is_search() ) {
	$usland_title = __( 'Search Results for : ', 'usland' ) . get_search_query();
}
elseif ( is_home() ) {
	if ( get_option( 'page_for_posts' ) ) {
		$usland_title = get_the_title( get_option( 'page_for_posts' ) );
	}
	else {
		$usland_title = apply_filters( 'usland_blog_title', __( 'All Posts', 'usland' ) );
	}
}
elseif ( is_archive() ) {
	$usland_title = get_the_archive_title();
}
else{
	$usland_title = get_the_title();
}

if ( Usland::$options['menu_header_style'] == 'st1' || Usland::$options['menu_header_style'] == 'st3' ){
    $banner_heading = 'banner-heading';
}elseif( Usland::$options['menu_header_style'] == 'st2' || Usland::$options['menu_header_style'] == 'st4' ){
    $banner_heading = 'banner-heading-two';
}else{
    $banner_heading = 'banner-heading';
}

?>
<!-- Banner Section -->
<?php if ( Usland::$has_banner == '1' || Usland::$has_banner == 'on' ): ?>
<section class="banner-section">
    <div class="<?php echo esc_html( $banner_heading ); ?>">
        <h2><?php echo wp_kses_post( $usland_title );?></h2>
    </div>
    <div class="banner-link">
        <ul>
        <?php if ( Usland::$has_breadcrumb == '1' || Usland::$has_breadcrumb == 'on' ): ?>
            <?php get_template_part( 'template-parts/content', 'breadcrumb' );?>
        <?php endif; ?>
        </ul>
    </div>
</section>
<?php endif; ?>
<!--End Banner Section -->