<?php
if ( post_password_required() ) {
    return;
}
?>
<div class="comment-section">
    <?php if ( have_comments() ): ?>
    <?php
        $usland_comment_count = get_comments_number();
        $usland_comments_text = number_format_i18n( $usland_comment_count ) . ' ';
        if ( $usland_comment_count > 1 ) {
            $usland_comments_text .= __( 'Comments', 'usland' );
        }
        else{
            $usland_comments_text .= __( 'Comment', 'usland' );
        }
    ?>
    <div class="all-title">
        <h3 class="sec-title">
            <span><?php echo esc_html( $usland_comments_text );?></span>
        </h3>
    </div>
    <?php $usland_avatar = get_option( 'show_avatars' ); ?>
    <?php echo empty( $usland_avatar ) ? ' avatar-disabled' : '';?>
    <?php
        wp_list_comments(
            array(
                'style'             => 'div',
                'callback'          => 'Usland_Helper::comments_callback',
                'reply_text'        => '<i class="fa fa-mail-reply-all"> </i>'. __( 'Reply', 'usland' ),
                'avatar_size'       => 130,
                'format'            => 'html5',
                ) 
        );
    ?>
    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :?>
        <nav class="pagination-area comment-navigation">
            <ul>
                <li><?php previous_comments_link( esc_html__( 'Older Comments', 'usland' ) ); ?></li>
                <li><?php next_comments_link( esc_html__( 'Newer Comments', 'usland' ) ); ?></li>
            </ul>
        </nav>
    <?php endif;?>
    <?php endif; ?>
    <?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'usland' ); ?></p>
    <?php endif;?>
</div>

<div class="blog-comment-form">
<?php
$usland_commenter = wp_get_current_commenter();
$usland_req = get_option( 'require_name_email' );
$usland_aria_req = ( $usland_req ? " required" : '' );

$usland_fields =  array(
    'author' =>
    '<div class="form-group mt-4"><input type="text" id="author" name="author" value="' . esc_attr( $usland_commenter['comment_author'] ) . '" placeholder="'.esc_attr__( 'Name', 'usland' ).( $usland_req ? ' *' : '' ).'" class="form-control"' . $usland_aria_req . '></div>',

    'email' =>
    '<div class="form-group mt-4"><input id="email" name="email" type="email" value="' . esc_attr(  $usland_commenter['comment_author_email'] ) . '" class="form-control" placeholder="'.esc_attr__( 'Email', 'usland' ).( $usland_req ? ' *' : '' ).'"' . $usland_aria_req . '></div>',
    );

$usland_args = array(
    'class_submit'      => 'btn btn_custom usland-r-btn btn-style-two',
    'submit_field'         => '<div class="form-group mt-4">%1$s %2$s</div>',
    'fields' => apply_filters( 'comment_form_default_fields', $usland_fields ),
    'comment_field' =>  '<div class="form-group mt-4"><textarea id="comment" name="comment" required placeholder="'.esc_attr__( 'Comment *', 'usland' ).'" class="form-control" rows="10" cols="40"></textarea></div>',
    );

    ?>
<?php comment_form( $usland_args );?>
</div>