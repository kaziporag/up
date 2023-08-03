<?php
// Layout class
if ( Usland::$layout == 'full-width' ) {
	$usland_layout_class = 'col-md-12 col-sm-12 col-xs-12';
}
else{
	$usland_layout_class = 'col-sm-9 col-md-9 col-xs-12';
}
?>
<?php get_header();?>
<?php get_template_part('template-parts/content', 'banner');?>

<section  <?php post_class('error-404-section section-padding-all');?>>
	<div class="container">
		<div class="row clearfix">
			<div class="<?php echo esc_attr( $usland_layout_class );?>">
				<?php get_template_part( 'template-parts/content', 'error' );?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>