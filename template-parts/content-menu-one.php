
<?php
    $usland_logo = empty( Usland::$options['logo']['url'] ) ? USLAND_IMG_URL . 'logo.png' : Usland::$options['logo']['url'];

    if ( Usland::$options['menu_header_style'] == 'st1' || Usland::$options['menu_header_style'] == 'st3' ){
        $header_style = 'style-one';
    }elseif( Usland::$options['menu_header_style'] == 'st2' || Usland::$options['menu_header_style'] == 'st4' ){
        $header_style = 'style-two';
    }else{
        $header_style = 'style-one';
    }

    $usland_pagemenu = false;
    if ( ( is_single() || is_page() ) ) {
        $usland_menuid = get_post_meta( get_the_id(), 'usland_main_menu_default', true );
        if ( !empty( $usland_menuid ) && $usland_menuid != 'default' ) {
            $usland_pagemenu = $usland_menuid;
        }else{
				$usland_pagemenu = 'primary';
		}
    }
?>
<header class="usland-header <?php echo esc_html( $header_style ); ?>">
    <!--Header Top-->
    <?php
    if ( Usland::$options['menu_header_style'] == 'st1' || Usland::$options['menu_header_style'] == 'st4' ) {
        if ( Usland::$top_bar == 1 || Usland::$top_bar == 'top_bar_on' ){
            $usland_socials = array(
                'social_facebook' => array(
                    'icon' => 'fa fa-facebook',
                    'url'  => Usland::$options['social_facebook'],
                    ),
                'social_twitter' => array(
                    'icon' => 'fa fa-twitter',
                    'url'  => Usland::$options['social_twitter'],
                    ),
                'social_linkedin' => array(
                    'icon' => 'fa fa-linkedin',
                    'url'  => Usland::$options['social_linkedin'],
                    ),
                'social_youtube' => array(
                    'icon' => 'fa fa-youtube',
                    'url'  => Usland::$options['social_youtube'],
                    ),
                'social_pinterest' => array(
                    'icon' => 'fa fa-pinterest',
                    'url'  => Usland::$options['social_pinterest'],
                    ),
                'social_instagram' => array(
                    'icon' => 'fa fa-instagram',
                    'url'  => Usland::$options['social_instagram'],
                    ),
                );
            $usland_socials = array_filter( $usland_socials, array( 'Usland_Helper' , 'filter_social' ) );
    ?>
    <div class="header-top">
        <div class="container">
            <div class="clearfix">
                <!--Top Left-->
                <div class="top-left">
                    <ul class="header-info-list">
                    <?php if ( !empty( Usland::$options['top_email'] ) ): ?>
                        <li><i class="icon fa fa-envelope"></i><a href="mailto:<?php echo esc_attr( Usland::$options['top_email'] );?>"><?php echo esc_html( Usland::$options['top_email'] );?></a></li>
                    <?php endif; ?>
                    <?php if ( !empty( Usland::$options['top_address'] ) ): ?>
                        <li><i class="icon fa fa-map-marker"></i><?php echo esc_html( Usland::$options['top_address'] );?></li>
                    <?php endif; ?>
                    <?php if ( !empty( Usland::$options['top_phone'] ) ): ?>
                        <li><i class="icon fa fa-headphones"></i> <a href="tel:<?php echo esc_attr( Usland::$options['top_phone'] );?>"><?php echo esc_html( Usland::$options['top_phone'] );?></a></li>
                    <?php endif; ?>
                    </ul>
                </div>
                <!--Top Right-->
                <?php if ( !empty( $usland_socials ) ): ?>
                <div class="top-right">
                    <!--Social Box-->
                    <ul class="social-box">
                        <?php foreach ( $usland_socials as $usland_social ): ?>
                            <li><a href="<?php echo esc_url( $usland_social['url'] );?>" title=""><i class="<?php echo esc_attr( $usland_social['icon'] );?>"></i></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php } } ?>

    <!--Header-Upper-->
    <div class="header-upper">
        <div class="container">
            <div class="clearfix">

                <div class="pull-left logo-box">
                    <div class="logo">
                        <a href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $usland_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
                    </div>
                </div>

                <div class="nav-outer clearfix">

                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md">
                        <div class="navbar-header">
                            <button class="navbar-toggler"  type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                            </button>
                        </div>
                        <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                        <?php
                            if ( has_nav_menu( 'primary' ) ) {
                                
                                wp_nav_menu( array(
                                    'menu'            => $usland_pagemenu,
                                    'container'       => 'nav',
                                    'container_class' => 'navigation',
                                    'container_id'    => 'navigation',
                                    'theme_location'  => 'primary'
                                ) );

                            }else{
                            echo '<ul class="nav-not-set">';
                                echo esc_html__('Primary navigation menu is missing. Add one from ', 'usland');
                                echo '<li><a href="'.esc_url(get_admin_url() . 'nav-menus.php').'"><strong>'.esc_html__(' Appearance -> Menus','usland').'</strong></a></li>';
                            echo '</ul>';
                            }
                        ?>
                        </div>
                    
                    </nav>
                    <?php if ( Usland::$options['ask_bar'] == 1 || Usland::$options['ask_bar'] == 'ask_bar_on' ){ ?>
                    <!--Button Box-->
                    <div class="button-box">
                        <a href="<?php echo esc_html(Usland::$options['ask_page_link']); ?>" class="usland-r-btn btn-style-one"><?php echo esc_html(Usland::$options['ask_page_link_text']); ?></a>
                    </div>
                    <?php } ?>
                    <?php if ( Usland::$options['search_icon'] == 1 || Usland::$options['search_icon'] == 'on' ){ ?>
                    <!--Search Box Outer-->
                    <div class="menu-search-box">
                        <div class="dropdown">
                            <button class="menu-sb-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-search"></i></button>
                            <ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu3">
                                <li class="panel-outer">
                                    <div class="form-container">
                                        <form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                            <div class="form-group">
                                                <input type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr( 'Search here ...', 'usland' ); ?>">
                                                <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- Example single danger button -->
                </div>
            </div>
        </div>
    </div>
    <!--End Header Upper-->
    <!--Sticky Header-->
    <?php if( class_exists( 'Redux' ) && Usland::$options['sticky_menu'] == 1 ) : ?>
        <div class="sticky-header">
            <div class="container clearfix">
                <!--Logo-->
                <div class="logo pull-left">
                    <a class="img-responsive" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $usland_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
                </div>
                <div class="right-col pull-right">
                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md">
                        <div class="navbar-header">
                            <button class="navbar-toggler"  type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                            </button>
                        </div>
                        <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent1">
                            <?php
                                if ( has_nav_menu('primary') ) {
                                
                                    wp_nav_menu( array(
                                        'menu'            => $usland_pagemenu,
                                        'container'       => 'nav',
                                        'container_class' => 'navigation',
                                        'container_id'    => 'navigation',
                                        'theme_location'  => 'primary'
                                    ) );

                                }else{
                                echo '<ul class="nav-not-set">';
                                    echo esc_html__('Primary navigation menu is missing. Add one from ', 'usland');
                                    echo '<li><a href="'.esc_url(get_admin_url() . 'nav-menus.php').'"><strong>'.esc_html__(' Appearance -> Menus','usland').'</strong></a></li>';
                                echo '</ul>';
                                }
                            ?>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </header>
