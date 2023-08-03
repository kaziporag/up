<?php
if ( get_query_var('post_type') == "ulproperty" ) {

    get_template_part( "archive", get_query_var('post_type') );

} else {
// Layout class
if ( Usland::$layout == 'full-width' ) {
    $usland_layout_class = 'col-lg-12';
    $usland_sidebar_class = '';
}
elseif ( Usland::$layout == 'left-sidebar' ){
    $usland_layout_class = 'col-lg-9';
    $usland_sidebar_class = 'order-md-2';
}else{
    $usland_layout_class = 'col-lg-9';
    $usland_sidebar_class = 'order-md-1';
}
?>
<?php get_header(); ?>
<?php get_template_part('template-parts/content', 'banner');?>

<section class="single-blog-section section-padding-all">
    <div class="container">
        <div class="row clearfix">
            <div class="<?php echo esc_attr( $usland_layout_class );?> <?php echo esc_attr( $usland_sidebar_class );?>">
                <?php if ( have_posts() ) :?>
                <div class="row">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'template-parts/content', 'search' ); ?>
                    <?php endwhile; ?>
                </div>
                <?php else: ?>
                    <?php get_template_part( 'template-parts/content', 'none' );?>
                <?php endif; ?>
            </div>
            <?php 
                get_sidebar();
            ?>
        </div>
    </div>
</section>
<?php } ?>
<?php get_footer(); ?>