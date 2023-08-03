<?php
global $post;
$usland_team_desi_subtitle         = get_post_meta( $post->ID, 'usland_team_desi_subtitle', true );
$usland_team_desi                  = get_post_meta( $post->ID, 'usland_team_desi', true );
$usland_team_email                 = get_post_meta( $post->ID, 'usland_team_email', true );
$usland_team_phone                 = get_post_meta( $post->ID, 'usland_team_phone', true );
$usland_team_rating                = get_post_meta( $post->ID, 'usland_team_rating', true );
$usland_team_social                = get_post_meta( $post->ID, 'usland_team_social', true );
$usland_team_contact_title         = get_post_meta( $post->ID, 'usland_team_contact_title', true );
$usland_team_contact_url           = get_post_meta( $post->ID, 'usland_team_contact_url', true );
?>

<div class="image-column col-lg-5 md-mb-50">
    <div class="team-member-info mb-50 md-mb-0">
        <div class="image">
            <?php the_post_thumbnail('usland-size2', array( 'class' => 'img-fluid' ));?>
        </div>
        <div class="team-content text-center">
            <h3><?php the_title();?></h3>
            <?php echo empty( $usland_team_desi ) ? '': '<div class="sub-text">'. esc_html( $usland_team_desi ) .'</div>'; ?>
            <ul class="personal-info">
                <?php if( !empty( $usland_team_email ) ) : ?>
                <li class="email">
                    <span><i class="fa fa-envelope"></i></span>
                    <a href="mailto:<?php echo esc_html( $usland_team_email ); ?>"><?php echo esc_html( $usland_team_email ); ?></a>
                </li>
                <?php endif; if( !empty( $usland_team_phone ) ) : ?>
                <li class="phone">
                    <span><i class="fa fa-phone"></i></span>
                    <a href="tel:<?php echo esc_html( $usland_team_phone ); ?>"><?php echo esc_html( $usland_team_phone ); ?></a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="social-box">
            <?php if ( !empty( $usland_team_social ) ): ?>
            <ul class="team-social">
            <?php foreach ( $usland_team_social as $usland_key => $usland_team_socials ): ?>
                <?php echo empty( $usland_team_socials['team_social_media_url'] ) || empty( $usland_team_socials['team_social_media_icon'] ) ? '': '<li><a href="'. esc_attr( $usland_team_socials['team_social_media_url'] ).'" class="team-det-social"><i class="'.esc_attr( $usland_team_socials['team_social_media_icon'] ).'"></i></a></li>';?>
            <?php endforeach; ?>
            </ul>
            <?php endif; ?>
        </div>
        <ul class="star-align">
            <?php if(!empty($usland_team_rating)) : ?>
            <li>
                <?php if($usland_team_rating == '0'): ?>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <?php elseif($usland_team_rating == '0.5'): ?>
                <i class="fa fa-star-half-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <?php elseif($usland_team_rating == '1'): ?>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <?php elseif($usland_team_rating == '1.5'): ?>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <?php elseif($usland_team_rating == '2'): ?>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <?php elseif($usland_team_rating == '2.5'): ?>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <?php elseif($usland_team_rating == '3'): ?>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <?php elseif($usland_team_rating == '3.5'): ?>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
                <i class="fa fa-star-o"></i>
                <?php elseif($usland_team_rating == '4'): ?>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <?php elseif($usland_team_rating == '4.5'): ?>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
                <?php elseif($usland_team_rating == '5'): ?>
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
</div>
<div class="team-content-column col-lg-7 pl-60 pt-50 md-pl-15 md-pt-0">
    <div class="team-inner-column">
        <h2><?php the_title();?></h2>
        <?php echo empty( $usland_team_desi_subtitle ) ? '': '<h3>'. esc_html( $usland_team_desi_subtitle ) .'</h3>'; ?>
        <?php the_content();?>
    </div>
    <div class="button-box text-right mt-5">
        <?php echo empty( $usland_team_contact_title ) || empty( $usland_team_contact_url ) ? '': '<a href="'. esc_url( $usland_team_contact_url ) .'" class="usland-r-btn btn-style-one">'. esc_html( $usland_team_contact_title ) .'</a>'; ?>
    </div>
</div>
<?php get_template_part( 'template-parts/content-manager', 'property' );?>