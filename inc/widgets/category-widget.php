<?php
class Usland_Category_Widget extends WP_Widget {
	public function __construct() {
		parent::__construct(
            'usland_category', // Base ID
            __( 'Usland: Categories', 'usland' ), // Name
            array( 'description' => __( 'Usland: Categories Widget', 'usland' ) ) // Args
            );
	}
	 
	public function widget( $args, $instance ){ 
		$categories = get_categories( array(
			'orderby' => 'name',
			'order'   => 'ASC'
		) );
		echo wp_kses_post( $args['before_widget'] );?>
		<?php
			if ( ! empty( $instance['title'] ) ) {
				echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title', esc_html( $instance['title'] ) ) . wp_kses_post( $args['after_title'] );
			}
		?>
		<div class="footer-widget links-widget">
			<ul class="footer-link">
				<?php foreach($categories as $category) { ?>
				<li><a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a></li>
				<?php } ?>
			</ul>
		</div>
		<?php echo wp_kses_post( $args['after_widget'] ); 
	}	
	public function update( $new_instance, $old_instance ){
		$instance              = array();
		$instance['title']     = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		return $instance;
	}
	
	public function form( $instance ){
		$defaults = array(
			'title'   => __( 'Categories', 'usland' ), 
			);
		$instance = wp_parse_args( (array) $instance, $defaults );

		$fields = array(
			'title'          => array(
				'label'    => __( 'Title', 'usland' ),
				'type'       => 'text',
				),
			);

			JWidget_Fields::display( $fields, $instance, $this );
	}
}


