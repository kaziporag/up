
<?php
    $usland_logo = empty( Usland::$options['logo']['url'] ) ? USLAND_IMG_URL . 'logo.png' : Usland::$options['logo']['url'];

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
<!--Header Top-->
<?php if( class_exists( 'Redux' ) && Usland::$options['sticky_menu'] != 1 ) : ?>

  <style type="text/css" scoped>
    .header-wrapper.usland-header.fixed-header{
      position: relative;
    }
  </style>

<?php endif; ?>
<!--== Start Header Wrapper ==-->
<header class="header-wrapper usland-header">
    <div class="header-top-area">
      <div class="header-top-align">
        <div class="header-top-align-left">
          <div class="header-logo-area">
            <a href="./">
              <img class="logo-main" src="<?php echo esc_url( $usland_logo );?>" height="56" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>" />
            </a>
          </div>
        </div>
        <div class="header-top-align-right">
          <div class="header-info-items">
            <?php if ( !empty( Usland::$options['top_text_1'] ) || !empty( Usland::$options['top_text_2'] ) ): ?>
            <div class="info-items">
              <div class="inner-content">
                <div class="icon">
                <i class="fa fa-hourglass-o"></i>
                </div>
                <div class="content">
                  <p><?php echo esc_html( Usland::$options['top_text_1'] );?><br><?php echo esc_html( Usland::$options['top_text_2'] );?></p>
                </div>
              </div>
            </div>
            <?php endif; ?>
            <?php if ( !empty( Usland::$options['top_address'] ) ): ?>
            <div class="info-items">
              <div class="inner-content">
                <div class="icon">
                  <i class="fa fa-address-card-o"></i>
                </div>
                <div class="content">
                  <p><?php echo esc_html( Usland::$options['top_address'] );?></p>
                </div>
              </div>
            </div>
            <?php endif; ?>
          </div>
          <div class="header-appointment-button">
            <a class="appointment-btn" href="#">Appointment</a>
          </div>
        </div>
      </div>
    </div>
    <div class="header-area header-default">
      <div class="container">
        <div class="row no-gutter align-items-center position-relative">
          <div class="col-12">
            <div class="header-align">
              <div class="header-align-left">
                <div class="mobile-header-logo">
                  <a href="./">
                    <img class="logo-light" src="<?php echo esc_url( $usland_logo );?>"  height="56" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>" />
                  </a>
                </div>
                <?php
                  if ( has_nav_menu( 'primary' ) ) {
                      
                      wp_nav_menu( array(
                          'menu'            => $usland_pagemenu,
                          'container'       => 'nav',
                          'container_class' => 'header-navigation-area',
                          'container_id'    => 'navigation',
                          'menu_class'      => 'main-menu nav',
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
              <div class="header-align-right">
                <button class="btn-menu" type="button" data-bs-toggle="offcanvas" data-bs-target="#AsideOffcanvasMenu" aria-controls="AsideOffcanvasMenu">
                  <i class="fa fa-align-left"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!--== End Header Wrapper ==-->

  <!--== Start Aside Menu ==-->
  <aside class="off-canvas-wrapper offcanvas offcanvas-start" tabindex="-1" id="AsideOffcanvasMenu" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <h1 class="d-none" id="offcanvasExampleLabel">Aside Menu</h1>
      <button class="btn-menu-close" data-bs-dismiss="offcanvas" aria-label="Close">menu <i class="fa fa-chevron-left"></i></button>
    </div>
    <div class="offcanvas-body">
      <!-- Mobile Menu Start -->
      
        <?php
          if ( has_nav_menu( 'primary' ) ) {
              
              wp_nav_menu( array(
                  'menu'            => $usland_pagemenu,
                  'container'       => 'div',
                  'container_class' => 'mobile-menu-items',
                  'container_id'    => 'navigation',
                  'menu_class'      => 'nav-menu',
                  'theme_location'  => 'primary'
              ) );

          }else{
          echo '<ul class="nav-not-set">';
              echo esc_html__('Primary navigation menu is missing. Add one from ', 'usland');
              echo '<li><a href="'.esc_url(get_admin_url() . 'nav-menus.php').'"><strong>'.esc_html__(' Appearance -> Menus','usland').'</strong></a></li>';
          echo '</ul>';
          }
        ?>
      <!-- Mobile Menu End -->
      <div class="mobile-menu-info">
        <?php if ( !empty( Usland::$options['top_text_1'] ) || !empty( Usland::$options['top_text_2'] ) ): ?>
        <div class="info-item">
          <div class="icon">
            <i class="fa fa-hourglass-o"></i>
          </div>
          <div class="content">
            <p><?php echo esc_html( Usland::$options['top_text_1'] );?><br><?php echo esc_html( Usland::$options['top_text_2'] );?></p>
          </div>
        </div>
        <?php endif; ?>
        <?php if ( !empty( Usland::$options['top_address'] ) ): ?>
        <div class="info-item">
          <div class="icon">
            <i class="fa fa-address-card-o"></i>
          </div>
          <div class="content">
            <p><?php echo esc_html( Usland::$options['top_address'] );?></p>
          </div>
        </div>
        <?php endif; ?>
      </div>
      <a class="mobile-menu-btn" href="#">Appointment</a>
    </div>
  </aside>
  <!--== End Aside Menu ==-->
