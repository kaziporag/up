<?php 
global $post;
$usland_team_social = get_post_meta( $post->ID, 'usland_team_social', true );
?>
<?php if ( has_post_thumbnail() ): ?>
<div class="b-det-img">
    <?php the_post_thumbnail( 'usland-size1' );?>
</div>
<?php endif; ?>
<div class="det-content">
    <h3><?php the_title();?></h3>
    <div class="det-meta">
        <span>
            <i class="fa fa-user-o"></i> <?php esc_html_e( 'By', 'usland' );?> : <?php the_author_posts_link();?>
        </span>
        <span>
            <i class="fa fa-calendar"></i> <?php esc_html_e( 'Date', 'usland' );?>: <?php the_time( 'F j, Y' );?>
        </span>
        <span>
            <i class="fa fa-folder-o"></i> <?php the_category( ', ' );?>
        </span>
        <span>
            <i class="fa fa-commenting-o"></i> <?php echo '(' . esc_html( get_comments_number() . ')' );?>
        </span>
    </div>
    <?php the_content();?>
    <div class="blog-tags">
        <div class="row">
            <div class="col-md-8">
                <?php if ( has_tag() ): ?>
                    <span class="title"><?php esc_html_e( 'Tags', 'usland' );?> :  </span>
                    <?php echo wp_kses_post(get_the_term_list( $post->ID, 'post_tag')); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="blog-nav clearfix">
        <?php wp_link_pages();?>
    </div>
</div>