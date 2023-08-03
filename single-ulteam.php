<?php get_header(); ?>

<?php get_template_part('template-parts/content', 'banner');?>
<section <?php post_class('single-property-section section-padding-all'); ?>>
    <div class="container">
        <div class="row clearfix">
			<?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'template-parts/content-single', 'team' );?>
            <?php endwhile; ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>

