<?php
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
                        <?php get_template_part( 'template-parts/content', get_post_type() ); ?>
                    <?php endwhile; ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php Usland_Helper::pagination();?>
                </div>
                </div>
                <?php else:?>
                    <?php get_template_part( 'template-parts/content', 'none' );?>
                <?php endif;?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>