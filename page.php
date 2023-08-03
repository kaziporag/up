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
<?php if ( is_home() && ! is_front_page() ) : ?>
<?php get_template_part('template-parts/content', 'banner');?>
<?php elseif ( is_front_page()) : ?>
<?php get_template_part('template-parts/content', 'slider');?>
<?php elseif ( is_home()) : ?>
<?php get_template_part('template-parts/content', 'banner');?>
<?php else: ?>
<?php get_template_part('template-parts/content', 'banner');?>
<?php endif ?>

<section id="post-<?php the_ID(); ?>" <?php post_class('section-padding-all'); ?>>
    <?php if ( Usland::$layout == 'left-sidebar' || Usland::$layout == 'right-sidebar' ) : ?><div class="container"><?php endif; ?>
        <div class="row clearfix">
            <div class="<?php echo esc_attr( $usland_layout_class );?> <?php echo esc_attr( $usland_sidebar_class );?>">
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'template-parts/content', 'page' ); ?>
                    <?php
                    if ( comments_open() || get_comments_number() ){
                        comments_template();
                    }
                    ?>
                <?php endwhile; ?>	
            </div>
            <?php 
                get_sidebar();
            ?>
        </div>
    <?php if ( Usland::$layout == 'left-sidebar' || Usland::$layout == 'right-sidebar' ) : ?></div><?php endif; ?>
</section>

<?php get_footer(); ?>