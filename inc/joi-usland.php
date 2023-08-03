<?php
class Usland {

	protected static $instance = null;
	public $slug = 'usland';
	public $prefix = 'usland_';

	// Sitewide static variables
	public static $options = null;
	public static $por_team_social_fields = null;

	// Template specific variables
	public static $layout = null;
	public static $top_bar = null;
	public static $padding_top = null;
	public static $padding_bottom = null;
	public static $has_banner = null;
	public static $has_breadcrumb = null;
	public static $bgtype = null;
	public static $bgimg = null;
	public static $bgcolor = null;
	public static $opt_rgba = null;
	public static $banner_padding_top_default = null;
	public static $banner_padding_bottom_default = null;

	private function __construct() {
		$this->redux_init();
		add_action( 'after_setup_theme', array( $this, 'set_redux_option' ) );
		add_action( 'after_setup_theme', array( $this, 'set_redux_compability' ) );
		add_action( 'init', array( $this, 'rewrite_flush_check' ) );
	}

	public static function instance() {
		if ( null == self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}
	
	public function redux_init() {
		add_action( 'admin_menu', array( $this, 'remove_redux_menu' ), 12 );
		add_action( 'redux/options/usland/saved', array( $this, 'flush_redux_saved' ), 10, 2 );
		add_action( 'redux/options/usland/section/reset', array( $this, 'flush_redux_reset' ));
		add_action( 'redux/options/usland/reset', array( $this, 'flush_redux_reset' ) );
	}

	public function set_redux_option(){
		if ( ! class_exists( 'Redux' ) ) {
			include USLAND_INC_DIR . 'joi-redux-data.php';
			self::$options = json_decode( $usland_redux_data, true );
			return;
		}		
		global $usland;
		self::$options = $usland;
	}

	// Backward compability for newly added options
	public function set_redux_compability(){
		$new_options = array(
			'logo_width'        => 2,
			'class_time_format' => 12,
		);
		foreach ( $new_options as $key => $value ) {
			if ( !isset( Usland::$options[$key] ) ) {
				Usland::$options[$key] = $value;
			}	    	
		}
	}

	public function remove_redux_menu() {
		remove_submenu_page('tools.php','redux-about');
	}

	// Flush rewrites
	public function flush_redux_saved( $saved_options, $changed_options ){
		if ( empty( $changed_options ) ) {
			return;
		}
		$flush = false;
		$slugs = array( 'por_team_slug' );
		foreach ( $slugs as $slug ) {
			if ( array_key_exists( $slug, $changed_options ) ) {
				$flush = true;
			}
		}

		if ( $flush ) {
			update_option( 'usland_rewrite_flash', true );
		}
	}

	public function flush_redux_reset(){
		update_option( 'usland_rewrite_flash', true );
	}

	public function rewrite_flush_check() {
		if ( get_option('usland_rewrite_flash') == true ) {
			flush_rewrite_rules();
			update_option( 'usland_rewrite_flash', false );
		}
	}
}

Usland::instance();