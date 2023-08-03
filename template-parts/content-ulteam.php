
<?php
global $post;
$usland_team_desi                  = get_post_meta( $post->ID, 'usland_team_desi', true );
$usland_team_social                = get_post_meta( $post->ID, 'usland_team_social', true );

$post_page_column = Usland::$options['post_page_column'];
if ($post_page_column == '1-column') {
    $usland_col = 'col-md-12'; 
} elseif ($post_page_column == '2-columns') {
    $usland_col = 'col-md-6 dis-style';
} else {
    $usland_col = 'col-md-4 dis-style';
}
?>
<div class="<?php echo esc_attr( $usland_col );?> mb-4">
    <div class="team-box-all text-center">
        <div class="team-img">
        <a href="<?php the_permalink();?>">
            <?php the_post_thumbnail('usland-size2', array( 'class' => 'img-fluid' ));?>
        </a>
        <?php if ( !empty( $usland_team_social ) ): ?>
        <div class="team_social">
            <ul class="mb-0 text-center">
            <?php foreach ( $usland_team_social as $usland_key => $usland_team_socials ): ?>
                <?php echo empty( $usland_team_socials['team_social_media_url'] ) || empty( $usland_team_socials['team_social_media_icon'] ) ? '': '<li class="list-inline-item"><a href="'. esc_attr( $usland_team_socials['team_social_media_url'] ).'" class="team-det-social"><i class="'.esc_attr( $usland_team_socials['team_social_media_icon'] ).'"></i></a></li>';?>
            <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>
        </div>
        <div class="mt-3 mb-3">
            <h2 class="mb-0 font-weight-bold"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
            <?php echo empty( $usland_team_desi ) ? '': '<p class="text-muted team-work">'. esc_html( $usland_team_desi ) .'</p>'; ?>
        </div>
    </div>
</div>