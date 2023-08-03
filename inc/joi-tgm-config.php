<?php
add_action( 'tgmpa_register', 'usland_register_required_plugins' );
function usland_register_required_plugins() {
	$plugins = array(
		// Bundled
		array(
			'name'         => 'Usland Core',
			'slug'         => 'usland-core',
			'source'       => 'usland-core.zip',
			'required'     =>  true,
			'external_url' => 'https://themehurst.net',
			'version'      => '1.0.2'
		),
		array(
			'name'         => 'Revolution Slider',
			'slug'         => 'revslider',
			'source'       => 'revslider.zip',
			'required'     => false,
			'external_url' => 'https://www.sliderrevolution.com/',
			'version'      => '6.6.12'
		),
		// Repository
		array(
			'name'      => 'Elementor Page Builder',
			'slug'      => 'elementor',
			'required'  => true,
		  ),
		array(
			'name'     => 'CMB2',
			'slug'     => 'cmb2',
			'required' => true,
		),
		array(
			'name'     => 'Redux Framework',
			'slug'     => 'redux-framework',
			'required' => true,
		),
		array(
			'name'     => 'Breadcrumb NavXT',
			'slug'     => 'breadcrumb-navxt',
			'required' => true,
		),
		array(
			'name'     => 'Contact Form 7',
			'slug'     => 'contact-form-7',
			'required' => false,
		),
	);

	$config = array(
		'id'           => 'usland',             // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => 'https://demo.themehurst.net/download-plugins/usland_plugins/',   // Default absolute path to bundled plugins.
		'menu'         => 'usland-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
