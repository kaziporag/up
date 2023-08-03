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
				<div id="post-<?php the_ID(); ?>" <?php post_class('blog-detail mt-30'); ?>>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'template-parts/content-single', get_post_type() );?>
						<?php
						if ( comments_open() || get_comments_number() ){
							comments_template();
						}
						?>
					<?php endwhile; ?>
				</div>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>