<?php
if ( Usland::$options['menu_header_style'] == 'st1' || Usland::$options['menu_header_style'] == 'st3' ){
    $banner_heading = 'banner-heading';
}elseif( Usland::$options['menu_header_style'] == 'st2' || Usland::$options['menu_header_style'] == 'st4' ){
    $banner_heading = 'banner-heading-two';
}else{
    $banner_heading = 'banner-heading';
}

?>
<?php if ( Usland::$has_banner == '1' || Usland::$has_banner == 'on' ): ?>
<section class="banner-section">
    <div class="<?php echo esc_html( $banner_heading ); ?>">
        <h2><?php echo wp_kses_post( 'Property Search', 'usland' );?></h2>
        <div class="property-filter">
            <form method="POST" id="searchform">
                <input type="text" name="location" placeholder="Location"/>
                <input type="text" name="size" placeholder="Size"/>
                <input type="text" name="price" placeholder="Price"/>
                <input type="hidden" name="post_type" value="ulproperty" />
                <input class="btn-style-one property-filter-btn" type="submit" alt="Search" value="Search" />
            </form>
        </div>
    </div>
</section>
<?php endif; ?>