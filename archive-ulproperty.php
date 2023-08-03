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

$post_type = get_query_var('post_type');

$args = array(
    'post_type' => $post_type, 
    'order' => 'DESC',
    'posts_per_page'   => -1
);

if( isset( $_POST['location'] ) && $_POST['location'] || isset( $_POST['size'] ) && $_POST['size'] || isset( $_POST['price'] ) && $_POST['price'] )
$args['meta_query'] = array( 'relation'=>'AND' );

if( isset( $_POST['location'] ) && $_POST['location'] ) { 
    $args['meta_query'][] = array( 
        'key'=> 'usland_pro_adress',
        'value' => $_POST['location'],
        'compare' => 'LIKE'
    ); 
}else{
    if( isset( $_POST['location'] ) && $_POST['location'] )
        $args['meta_query'][] = array( 
            'key'=> 'usland_pro_adress',
            'value' => $_POST['location'],
            'compare' => 'LIKE'
        );
    if( isset( $_POST['size'] ) && $_POST['size'] )
        $args['meta_query'][] = array( 
            'key'=> 'usland_pro_property_size',
            'value' => $_POST['size'],
            'compare' => 'LIKE'
        );
    if( isset( $_POST['price'] ) && $_POST['price'] )
        $args['meta_query'][] = array( 
            'key'=> 'usland_pro_selling_price',
            'value' => $_POST['price'],
            'compare' => 'LIKE'
        );
}
?>
<?php get_header(); ?>
<?php get_template_part('template-parts/content-properties', 'filter');?>
<section class="single-blog-section section-padding-all">
    <div class="container">
        <div class="row clearfix">
            <div class="<?php echo esc_attr( $usland_layout_class );?> <?php echo esc_attr( $usland_sidebar_class );?>">
                <?php 
                $ulquery = new WP_Query( $args ); 
                if ( $ulquery->have_posts() ) :
                ?>
                <div class="row">
                    <?php while ( $ulquery->have_posts() ) : $ulquery->the_post(); ?>
                        <?php get_template_part( 'template-parts/content', get_post_type() ); ?>
                    <?php endwhile; ?>
                </div>
                <?php else:?>
                    <?php get_template_part( 'template-parts/content-property', 'none' );?>
                <?php endif;?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>