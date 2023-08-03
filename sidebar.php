<?php 
if ( Usland::$layout == 'full-width' ) { 
    $usland_sidebar_class = 'default-none';
} elseif ( Usland::$layout == 'left-sidebar' ) { 
    $usland_sidebar_class = 'order-md-1';
} else {
    $usland_sidebar_class = 'order-md-2';
}
 ?>
<div class="col-md-3 <?php echo esc_attr( $usland_sidebar_class );?>">
	<?php
    if ( is_active_sidebar( 'sidebar' ) ) {
        dynamic_sidebar( 'sidebar' );
    }
    ?>
</div>