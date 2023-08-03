<?php
$search_page_column = Usland::$options['search_page_column'];
if ($search_page_column == '1-column') {
    $usland_col = 'col-md-12'; 
} elseif ($search_page_column == '2-columns') {
    $usland_col = 'col-md-6';
} else {
    $usland_col = 'col-md-4';
}
?>
<div class="<?php echo esc_html( $usland_col );?> mb-4">
    <div class="img_blog">
        <div class="carousel-item active">
            <?php the_post_thumbnail('usland-size1', array( 'class' => 'img-fluid mx-auto d-block' ));?>
        </div>
    </div>
    <div class="blog-box-detail p-4">
        <div class="mt-0">
        <p class="labal text-muted"><span><i class="fa fa-folder-o"></i><?php the_category( ', ' );?></span><span><i class="fa fa-user-o"></i><?php the_author_posts_link();?></span><span><i class="fa fa-calendar"></i><?php the_time( 'j' );?> <?php the_time( 'M' );?> <?php the_time( 'Y' );?></span></p>
            <h2 class="font-weight-bold"><a href="<?php the_permalink();?>" class="read-more"><?php the_title();?></a></h2>
            <p class="text-muted"><?php echo esc_html( Usland_Helper::get_excerpt(150)); ?></p>
            <a class="read-more text-uppercase font-weight-bold" href="<?php the_permalink();?>"><?php esc_html_e( 'Read More', 'usland' );?></a>
        </div>
    </div>
</div>