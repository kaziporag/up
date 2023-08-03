<?php
global $post;
$usland_pro_type    		                = get_post_meta( $post->ID, 'usland_pro_type', true );
$usland_pro_status_title   	                = get_post_meta( $post->ID, 'usland_pro_status_title', true );
$usland_pro_status    		                = get_post_meta( $post->ID, 'usland_pro_status', true );
$usland_pro_adress_title                    = get_post_meta( $post->ID, 'usland_pro_adress_title', true );
$usland_pro_adress        	                = get_post_meta( $post->ID, 'usland_pro_adress', true );
$usland_pro_manager_name        	        = get_post_meta( $post->ID, 'usland_pro_manager_name', true );
$usland_pro_property_size_title             = get_post_meta( $post->ID, 'usland_pro_property_size_title', true );
$usland_pro_property_size         	        = get_post_meta( $post->ID, 'usland_pro_property_size', true );
$usland_pro_property_specification_no_title = get_post_meta( $post->ID, 'usland_pro_property_specification_no_title', true );
$usland_pro_property_specification_no       = get_post_meta( $post->ID, 'usland_pro_property_specification_no', true );
$usland_pro_market_value_title              = get_post_meta( $post->ID, 'usland_pro_market_value_title', true );
$usland_pro_market_value                    = get_post_meta( $post->ID, 'usland_pro_market_value', true );
$usland_pro_selling_price_tile              = get_post_meta( $post->ID, 'usland_pro_selling_price_tile', true );
$usland_pro_selling_price                   = get_post_meta( $post->ID, 'usland_pro_selling_price', true );
$usland_pro_gmap                            = get_post_meta( $post->ID, 'usland_pro_gmap', true );
$usland_pro_video                           = get_post_meta( $post->ID, 'usland_pro_video', true );
$usland_property_images                     = get_post_meta( $post->ID, 'usland_property_images', true );

$usland_pro_rating        		            = get_post_meta( $post->ID, 'usland_pro_rating', true );
$usland_por_team_social        		        = get_post_meta( $post->ID, 'usland_por_team_social', true );
?>
<div class="col-md-8 us-position">
    <?php echo empty( $usland_pro_type ) ? '': '<span class="pro-type single-pro">'. esc_html( 'For ', 'usland-core' ) . esc_html( $usland_pro_type ) .'</span>'; ?>
    <div class="project-thumb single-item-carousel">
        <?php if ( !empty( $usland_property_images ) ){ ?>
            <?php foreach ( $usland_property_images as $usland_key => $usland_property_image ): ?>
                <?php echo empty( $usland_property_image ) ? '': '<img src="'. esc_url($usland_property_image) .'">';?>
            <?php endforeach; ?>
        <?php }else{ ?>
            <?php the_post_thumbnail('usland-size1', array( 'class' => 'img-fluid' ));?>
        <?php } ?>
    </div>
    <div class="video-holder-property">
    <?php echo empty( $usland_pro_video ) ? '': '<a href="'. esc_url($usland_pro_video) .'" class="lightbox-image overlay-holder-property"><span class="fa fa-play"></span></a>'; ?>
    </div>
</div>
<div class="col-md-4">
    <div class="info">
        <ul>
            <?php echo empty( $usland_pro_status_title ) || empty( $usland_pro_status ) ? '': '<li>'. esc_html( $usland_pro_status_title ) .': <span class="'. esc_html( $usland_pro_status ) .'">'. esc_html( $usland_pro_status ) .'</span></li>'; ?>
            <?php echo empty( $usland_pro_adress_title ) || empty( $usland_pro_adress ) ? '': '<li>'. esc_html( $usland_pro_adress_title ) .': <span>'. esc_html( $usland_pro_adress ) .'</span></li>'; ?>
            <?php echo empty( $usland_pro_property_size_title ) || empty( $usland_pro_property_size ) ? '': '<li>'. esc_html( $usland_pro_property_size_title ) .': <span>'. esc_html( $usland_pro_property_size ) .'</span></li>'; ?>
            <?php echo empty( $usland_pro_property_specification_no_title ) || empty( $usland_pro_property_specification_no ) ? '': '<li>'. esc_html( $usland_pro_property_specification_no_title ) .': <span>'. esc_html( $usland_pro_property_specification_no ) .'</span></li>'; ?>
            <?php echo empty( $usland_pro_market_value_title ) || empty( $usland_pro_market_value ) ? '': '<li>'. esc_html( $usland_pro_market_value_title ) .': <span>'. esc_html( $usland_pro_market_value ) .'</span></li>'; ?>
            <?php echo empty( $usland_pro_selling_price_tile ) || empty( $usland_pro_selling_price ) ? '': '<li>'. esc_html( $usland_pro_selling_price_tile ) .': <span>'. esc_html( $usland_pro_selling_price ) .'</span></li>'; ?>
            <?php if(!empty($usland_pro_rating)) : ?>
            <li>
                <?php if($usland_pro_rating == '0'): ?>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <?php elseif($usland_pro_rating == '0.5'): ?>
                <i class="fa fa-star-half-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <?php elseif($usland_pro_rating == '1'): ?>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <?php elseif($usland_pro_rating == '1.5'): ?>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <?php elseif($usland_pro_rating == '2'): ?>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <?php elseif($usland_pro_rating == '2.5'): ?>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <?php elseif($usland_pro_rating == '3'): ?>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <?php elseif($usland_pro_rating == '3.5'): ?>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
                <i class="fa fa-star-o"></i>
                <?php elseif($usland_pro_rating == '4'): ?>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <?php elseif($usland_pro_rating == '4.5'): ?>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
                <?php elseif($usland_pro_rating == '5'): ?>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <?php endif; ?>
            </li>
            <?php endif; ?>
        </ul>
    </div>
    <?php if ( !empty( $usland_por_team_social ) ): ?>
    <ul class="property-social">
    <?php foreach ( $usland_por_team_social as $usland_key => $usland_por_team_socials ): ?>
        <?php echo empty( $usland_por_team_socials['por_team_social_media_url'] ) || empty( $usland_por_team_socials['por_team_social_media_icon'] ) ? '': '<li><a href="'. esc_attr( $usland_por_team_socials['por_team_social_media_url'] ).'" class="property-det-social"><i class="'.esc_attr( $usland_por_team_socials['por_team_social_media_icon'] ).'"></i></a></li>';?>
    <?php endforeach; ?>
    </ul>
    <?php endif; ?>
</div>
<div class="col-md-12 det-content">
    <h3><?php the_title();?></h3>
    <?php the_content();?>
    <div class="property-tags">
        <div class="row">
            <div class="col-md-6">
                <div class="all-tag">
                    <?php if ( !empty(get_the_term_list( $post->ID, 'ulproperty_tag')) ): ?>
                        <strong><?php esc_html_e('Tags: ', 'usland'); ?></strong>
                        <?php echo wp_kses_post(get_the_term_list( $post->ID, 'ulproperty_tag' )); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="all-tag">
                    <?php if ( !empty(get_the_term_list( $post->ID, 'ulproperty_category')) ): ?>
                        <strong><?php esc_html_e('Category: ', 'usland'); ?></strong>
                        <?php echo wp_kses_post(get_the_term_list( $post->ID, 'ulproperty_category' )); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-2 mb-3">
                <div class="contact-mang">
                    <?php echo empty( $usland_pro_manager_name ) ? '': '<a class="btn usland-r-btn btn-style-one" href="'. esc_url( get_permalink( $usland_pro_manager_name ) ) .'">'. esc_html( 'Contact Now', 'usland' ) .'</a>'; ?>
                </div>
            </div>
            <div class="col-md-12">
                <?php echo empty( $usland_pro_gmap ) ? '': '<iframe class="sing-prorerty-map-size" src="'.esc_url( $usland_pro_gmap ).'" allowfullscreen="" loading="lazy"></iframe>'; ?>
            </div>
        </div>
    </div>
    <div class="blog-nav clearfix">
        <?php previous_post_link( '%link', '<i class="fa fa-angle-left"></i>', '', 'blog-prev' ); ?>
        <?php next_post_link( '%link', '<i class="fa fa-angle-right"></i>', '', 'blog-next' ); ?>
    </div>
</div>
<?php get_template_part( 'template-parts/content-more', 'property' );?>