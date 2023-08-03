<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php 
	$usland_favicon = empty( Usland::$options['f_icon']['url'] ) ? USLAND_IMG_URL . 'icon.png' : Usland::$options['f_icon']['url'];
	?>
    <!--== Favicon ==-->
    <link rel="shortcut icon" href="<?php echo esc_url($usland_favicon); ?>" type="image/x-icon" />
    
    <?php wp_head(); ?>
    <?php        
        if ( Usland::$options['menu_header_style'] == 'st1' || Usland::$options['menu_header_style'] == 'st3' ){
            $header_style = 'style-one';
        }elseif( Usland::$options['menu_header_style'] == 'st2' || Usland::$options['menu_header_style'] == 'st4' ){
            $header_style = 'style-two';
        }else{
            $header_style = 'style-one';
        }
    ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="page-wrapper">
        <?php if( class_exists( 'Redux' ) && Usland::$options['prelo_type'] == 'prelo_yes' ) : ?>
        <!-- Preloader -->
        <div class="preloader"></div>
        <?php endif; ?>
        <!-- Main Header-->
        <?php if ( Usland::$options['menu_header_style'] == 'st1' || Usland::$options['menu_header_style'] == 'st3' || Usland::$options['menu_header_style'] == 'st2' || Usland::$options['menu_header_style'] == 'st4' ){
            get_template_part( 'template-parts/content-menu', 'one' ); 
        }elseif(Usland::$options['menu_header_style'] == 'st5'){ 
            get_template_part( 'template-parts/content-menu', 'two' );
        }
        
        ?>