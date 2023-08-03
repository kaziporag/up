<?php
class Usland_Tags_Widget extends WP_Widget {
	public function __construct() {
		parent::__construct(
            'usland_tags',
            __( 'Usland: Post Tags', 'usland' ),
            array( 'description' => __( 'Usland: Post Tags Widget', 'usland' ) )
            );
	}
	
	 public function widget($args,$instance) {
        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Tags', 'usland' ) : $instance['title'], $instance, $this->id_base );
         echo wp_kses_post($args['before_widget']);  ?>
        <div class="blog-tags">
        <?php
         if ( $title ) {
                echo wp_kses_post($args['before_title'] . $title . $args['after_title']);
        } 
        ?>
            <?php echo the_tags( '',' ' ); ?>

        </div>
        <?php 
        echo wp_kses_post($args['after_widget']); 
        }
	
	public function form($instance) {
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title') ?>"><?php __( 'Title:', 'usland' ); ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('title') ?>" name="<?php echo $this->get_field_name('title') ?>" 
            value="<?php if(isset($title)) echo esc_attr($title); ?>" />
        </p>
        <?php
    }
} 

