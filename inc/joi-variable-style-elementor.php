<?php
$usland_primary_color   			= Usland::$options['primary_color'];
$usland_secondery_color 			= Usland::$options['secondery_color'];
?>
.price-active .font-weight-bold,
.price-active .plan-price,
.price-active .business-plan-price .text_custom {
    color: <?php echo esc_html( $usland_secondery_color ); ?>;
}
.price-active .btn-style-two{
	color: <?php echo esc_html( $usland_primary_color ); ?>;
}

.price-active .btn-style-two:hover {
    background: <?php echo esc_html( $usland_primary_color ); ?>;
    color: #ffffff;
}

<?php if ( Usland::$layout == 'left-sidebar' || Usland::$layout == 'right-sidebar' ) : ?>
.elementor-widget-container {
        margin-left: 0;
        margin-right: 0;
}
<?php endif; ?>