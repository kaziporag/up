<?php
class Usland_Contact_Info_Widget extends WP_Widget {
	public function __construct() {
		parent::__construct(
            'usland_contact_info',
            __( 'Usland: Contact Info', 'usland' ),
            array( 'description' => __( 'Usland: Contact Info Widget', 'usland' ) )
            );
	}

	public function widget( $args, $instance ){
		echo wp_kses_post( $args['before_widget'] );
		?>
		<?php
			if ( ! empty( $instance['title'] ) ) {
				echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title', esc_html( $instance['title'] ) ) . wp_kses_post( $args['after_title'] );
			}
		?>
		<div class="footer-widget logo-widget">
			<div class="logo">
				<?php if( !empty( $instance['logo'] ) ) : ?>
				<a href="<?php echo esc_url( $instance['url'] ); ?>"><img src="<?php if( !empty( $instance['logo'] ) ) echo esc_url( $instance['logo'] ); ?>" alt="logo" /></a>
				<?php endif; ?>
			</div>
			<?php if( !empty( $instance['address'] ) ) : ?>
			<div class="text"><?php echo esc_html( $instance['address'] ); ?></div>
			<?php endif; ?>
			<ul class="list-style-one">
				<?php if( !empty( $instance['phone'] ) ) : ?>
				<li><i class="fa fa-phone"></i>  <?php echo esc_html( $instance['phone'] ); ?></li>
				<?php endif; ?>
				<?php if( !empty( $instance['email'] ) ) : ?>
				<li><i class="fa fa-envelope-o"></i>  <?php echo esc_html( $instance['email'] ); ?></li>
				<?php endif; ?>
				<?php if( !empty( $instance['open'] ) ) : ?>
				<li><i class="fa fa-clock-o"></i>  <?php echo esc_html( $instance['open'] ); ?></li>
				<?php endif; ?>
			</ul>
			<ul class="social-icon">
				<?php if( !empty( $instance['facebook'] ) ) : ?>
				<li><a href="<?php echo esc_url( $instance['facebook'] ); ?>"><i class="fa fa-facebook"></i></a></li>
				<?php endif; ?>
				<?php if( !empty( $instance['linkedin'] ) ) : ?>
				<li><a href="<?php echo esc_url( $instance['linkedin'] ); ?>"><i class="fa fa-linkedin"></i></a></li>
				<?php endif; ?>
				<?php if( !empty( $instance['youtube'] ) ) : ?>
				<li><a href="<?php echo esc_url( $instance['youtube'] ); ?>"><i class="fa fa-youtube"></i></a></li>
				<?php endif; ?>
				<?php if( !empty( $instance['pinterest'] ) ) : ?>
				<li><a href="<?php echo esc_url( $instance['pinterest'] ); ?>"><i class="fa fa-pinterest"></i></a></li>
				<?php endif; ?>
				<?php if( !empty( $instance['twitter'] ) ) : ?>
				<li><a href="<?php echo esc_url( $instance['twitter'] ); ?>"><i class="fa fa-twitter"></i></a></li>
				<?php endif; ?>
				<?php if( !empty( $instance['instagram'] ) ) : ?>
				<li><a href="<?php echo esc_url( $instance['instagram'] ); ?>"><i class="fa fa-instagram"></i></a></li>
				<?php endif; ?>
			</ul>
		</div>
		<?php
		echo wp_kses_post( $args['after_widget'] );
	}

	public function update( $new_instance, $old_instance ){
		$instance                  	= array();
		$instance['title']         	= ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['logo']   		= ( ! empty( $new_instance['logo'] ) ) ? wp_kses_post( $new_instance['logo'] ) : '';
		$instance['url']   			= ( ! empty( $new_instance['url'] ) ) ? wp_kses_post( $new_instance['url'] ) : '';
		$instance['address']   		= ( ! empty( $new_instance['address'] ) ) ? wp_kses_post( $new_instance['address'] ) : '';
		$instance['phone']   		= ( ! empty( $new_instance['phone'] ) ) ? wp_kses_post( $new_instance['phone'] ) : '';
		$instance['email']   		= ( ! empty( $new_instance['email'] ) ) ? wp_kses_post( $new_instance['email'] ) : '';
		$instance['open']   		= ( ! empty( $new_instance['open'] ) ) ? wp_kses_post( $new_instance['open'] ) : '';
		$instance['facebook']   	= ( ! empty( $new_instance['facebook'] ) ) ? wp_kses_post( $new_instance['facebook'] ) : '';
		$instance['twitter']   		= ( ! empty( $new_instance['twitter'] ) ) ? wp_kses_post( $new_instance['twitter'] ) : '';
		$instance['linkedin']   	= ( ! empty( $new_instance['linkedin'] ) ) ? wp_kses_post( $new_instance['linkedin'] ) : '';
		$instance['pinterest']   	= ( ! empty( $new_instance['pinterest'] ) ) ? wp_kses_post( $new_instance['pinterest'] ) : '';
		$instance['instagram']   	= ( ! empty( $new_instance['instagram'] ) ) ? wp_kses_post( $new_instance['instagram'] ) : '';
		$instance['youtube']   		= ( ! empty( $new_instance['youtube'] ) ) ? wp_kses_post( $new_instance['youtube'] ) : '';
		return $instance;
	}

	public function form( $instance ){
		$defaults = array(
			'title'          => __( 'About Company' , 'usland' ),
			'logo'    		=> __( 'Company Logo' , 'usland' ),
			'url'    		=> '',
			'address'    	=> '',
			'phone'    		=> '',
			'email'    		=> '',
			'open'    		=> '',
			'facebook'    	=> '',
			'twitter'    	=> '',
			'linkedin'    	=> '',
			'pinterest'    	=> '',
			'instagram'    	=> '',
			'youtube'    	=> '',
			);
		$instance = wp_parse_args( (array) $instance, $defaults );

		$fields = array(
			'title'          	=> array(
				'label'   		=> __( 'Title', 'usland' ),
				'type'       	=> 'text',
				),
			'logo'          	=> array(
				'label'    		=> __( 'Company Logo', 'usland' ),
				'type'       	=> 'url',
				),
			'url'       => array(
				'label'    		=> __( 'URL', 'usland' ),
				'type'       	=> 'url',
				),
			'address'       => array(
				'label'    		=> __( 'Address', 'usland' ),
				'type'       	=> 'text',
				),
			'phone'       => array(
				'label'    		=> __( 'Phone', 'usland' ),
				'type'       	=> 'text',
				),
			'email'       => array(
				'label'    		=> __( 'Email', 'usland' ),
				'type'       	=> 'text',
				),
			'open'       => array(
				'label'    		=> __( 'Working Hours', 'usland' ),
				'type'       	=> 'text',
				),
			'facebook'   => array(
				'label'    		=> __( 'Facebook', 'usland' ),
				'type'       	=> 'url',
				),
			'twitter'    => array(
				'label'    		=> __( 'Twitter', 'usland' ),
				'type'       	=> 'url',
				),
			'linkedin'   => array(
				'label'    		=> __( 'Linkedin', 'usland' ),
				'type'       	=> 'url',
				),
			'pinterest'  => array(
				'label'    		=> __( 'Pinterest', 'usland' ),
				'type'       	=> 'url',
				),
			'instagram'  => array(
				'label'    		=> __( 'Instagram', 'usland' ),
				'type'       	=> 'url',
				),
			'youtube'    => array(
				'label'    		=> __( 'YouTube', 'usland' ),
				'type'       	=> 'url',
				),
			);
		
			JWidget_Fields::display( $fields, $instance, $this );
	}
}


