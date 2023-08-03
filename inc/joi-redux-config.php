<?php
if ( ! class_exists( 'Redux' ) ) {
    return;
}

$opt_name = "usland";

$opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

$theme = wp_get_theme();
$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'disable_tracking' => true,
    'display_name'         => $theme->get( 'Name' ),
    // Name that appears at the top of your panel
    'display_version'      => $theme->get( 'Version' ),
    // Version that appears at the top of your panel
    'menu_type'            => 'submenu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => __( 'Usland Options', 'usland' ),
    'page_title'           => __( 'Usland Options', 'usland' ),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    //'google_api_key'       => 'AIzaSyC2GwbfJvi-WnYpScCPBGIUyFZF97LI0xs',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => true,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-admin-settings',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => false,
    // Show the time the page took to load, etc
    'update_notice'        => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

    // OPTIONAL -> Give you extra features
    'page_priority'        => 30,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => 'usland-options',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => true,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
);

Redux::setArgs( $opt_name, $args );

// Fields
Redux::setSection( $opt_name, array(
    'title'            => __( 'General', 'usland' ),
    'id'               => 'general_section',
    'heading'          => '',
    'icon'             => 'el el-network',
    'fields' => array(
        array(
            'id'       => 'primary_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => __( 'Primary Color', 'usland' ),
            'default'  => '#ee2d50',
        ),
        array(
            'id'       => 'secondery_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => __( 'Secondery Color', 'usland' ),
            'default'  => '#303030',
        ),
        array(
            'id'       => 'back_to_top',
            'type'     => 'switch',
            'title'    => __( 'Back to Top Arrow', 'usland' ),
            'on'       => __( 'Enabled', 'usland' ),
            'off'      => __( 'Disabled', 'usland' ),
            'default'  => true,
        ),
		array(
            'id'       => 'prelo_type',
            'type'     => 'button_set',
            'title'    => __( 'Preloader Type', 'usland' ),
            'options'  => array(
                'prelo_yes'  => __( 'Preloader Yes', 'usland' ),
				'prelo_no'   => __( 'Preloader No', 'usland' ),
            ),
            'default' => 'prelo_yes',
        ),
        array(
            'id'       => 'prelo_yes',
            'type'     => 'media',
            'title'    => __( 'Preloader gif/svg', 'usland' ),
			'default'  => array(
							'url'=> USLAND_IMG_URL . 'preloader.svg'
						  ),
            'required' => array( 'prelo_type', 'equals', 'prelo_yes' )
        ),
        array(
            'id'       => 'f_icon',
            'type'     => 'media',
            'title'    => __( 'Favicon', 'usland' ),
            'default'  => array('url'=> USLAND_IMG_URL . 'favicon.png'),
        ),
    )            
) 
);

Redux::setSection( $opt_name, array(
    'title'            => __( 'Header', 'usland' ),
    'id'               => 'header_section',
    'heading'          => '',
    'icon'             => 'el el-caret-up',
    'fields' => array(
        array(
            'id'       => 'logo',
            'type'     => 'media',
            'title'    => __( 'Logo', 'usland' ),
            'default'  => array('url'=> USLAND_IMG_URL . 'logo.png'),
        ),
		// array(
        //     'id'       => 'favicon',
        //     'type'     => 'media',
        //     'title'    => __( 'Favicon', 'usland' ),
        //     'default'  => array(
        //         'url'=> USLAND_IMG_URL . 'favicon.png'
        //     ),
        // ),
        array(
            'id'       => 'menu_header_style',
            'type'     => 'image_select',
            'title'    => __( 'Header Style', 'usland' ),
            'default'  => 'st1',
            'options' => array(
                'st1' => array(
                    'title' => '<b>'. __( '', 'usland' ) . '</b>',
                    'img' => USLAND_IMG_URL . 'header-01.png',
                ),
                'st2' => array(
                    'title' => '<b>'. __( '', 'usland' ) . '</b>',
                    'img' => USLAND_IMG_URL . 'header-02.png',
                ),
                'st3' => array(
                    'title' => '<b>'. __( '', 'usland' ) . '</b>',
                    'img' => USLAND_IMG_URL . 'header-03.png',
                ),
                'st4' => array(
                    'title' => '<b>'. __( '', 'usland' ) . '</b>',
                    'img' => USLAND_IMG_URL . 'header-04.png',
                ),
                'st5' => array(
                    'title' => '<b>'. __( '', 'usland' ) . '</b>',
                    'img' => USLAND_IMG_URL . 'header-05.png',
                ),
            ),
        ),
        array(
            'id'       => 'section-topbar',
            'type'     => 'section',
            'title'    => __( 'Top Bar Section', 'usland' ),
            'indent'   => true,
            'subtitle' => __( 'If you want to hide any field simply keep it empty', 'usland' ),
        ),
        array(
            'id'       => 'top_bar',
            'type'     => 'button_set',
            'title'    => __( 'Top Bar Enable / Disable', 'usland' ),
            'options'  => array(
                'top_bar_on'  => __( 'Enabled', 'usland' ),
				'top_bar_off'   => __( 'Disabled', 'usland' ),
            ),
            'default'  => 'top_bar_off',
        ),
        array(
            'id'       => 'top_address',
            'type'     => 'text',
            'title'    => __( 'Address', 'usland' ),
            'required' =>  array( 'top_bar', 'equals', 'top_bar_on' ),
        ),
        array(
            'id'       => 'top_text_1',
            'type'     => 'text',
            'title'    => __( 'Text Line 1', 'usland' ),
            'required' => array( 'top_bar', 'equals', 'top_bar_on' ),
        ),
        array(
            'id'       => 'top_text_2',
            'type'     => 'text',
            'title'    => __( 'Text Line 2', 'usland' ),
            'required' => array( 'top_bar', 'equals', 'top_bar_on' ),
        ),
        array(
            'id'       => 'top_phone',
            'type'     => 'text',
            'title'    => __( 'Phone', 'usland' ),
            'required' => array( 'top_bar', 'equals', 'top_bar_on' ),
        ),
        array(
            'id'       => 'top_email',
            'type'     => 'text',
            'title'    => __( 'Email', 'usland' ),
            'validate' => 'email',
            'required' => array( 'top_bar', 'equals', 'top_bar_on' ),
        ),
        array(
            'id'       => 'social_facebook',
            'type'     => 'text',
            'title'    => __( 'Facebook', 'usland' ),
            'required' => array( 'top_bar', 'equals', 'top_bar_on' ),
        ),
        array(
            'id'       => 'social_twitter',
            'type'     => 'text',
            'title'    => __( 'Twitter', 'usland' ),
            'required' => array( 'top_bar', 'equals', 'top_bar_on' ),
        ),
        array(
            'id'       => 'social_linkedin',
            'type'     => 'text',
            'title'    => __( 'Linkedin', 'usland' ),
            'required' => array( 'top_bar', 'equals', 'top_bar_on' ),
        ),
        array(
            'id'       => 'social_youtube',
            'type'     => 'text',
            'title'    => __( 'Youtube', 'usland' ),
            'required' => array( 'top_bar', 'equals', 'top_bar_on' ),
        ),
        array(
            'id'       => 'social_pinterest',
            'type'     => 'text',
            'title'    => __( 'Pinterest', 'usland' ),
            'required' => array( 'top_bar', 'equals', 'top_bar_on' ),
        ),
        array(
            'id'       => 'social_instagram',
            'type'     => 'text',
            'title'    => __( 'Instagram', 'usland' ),
            'required' => array( 'top_bar', 'equals', 'top_bar_on' ),
        ),
    )            
) 
);

Redux::setSection( $opt_name, array(
    'title'            => __( 'Main Menu', 'usland' ),
    'id'               => 'menu_section',
    'heading'          => '',
    'icon'             => 'el el-book',
    'fields' => array(
        array(
            'id'       => 'sticky_menu',
            'type'     => 'switch',
            'title'    => __( 'Sticky Menu', 'usland' ),
            'on' 	   => __( 'On', 'usland' ),
            'off'      => __( 'Off', 'usland' ),
            'default'  => true,
        ), 
        array(
            'id'       => 'menu_typo',
            'type'     => 'typography',
            'title'    => __( 'Menu Font', 'usland' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Roboto',
                'google'      => true,
                'font-size'   => '14px',
                'font-weight' => '400',
                'line-height' => '20px',
            ),
        ),
        array(
            'id'       => 'search_icon',
            'type'     => 'switch',
            'title'    => __( 'Search Icon', 'usland' ),
            'on'       => __( 'Enabled', 'usland' ),
            'off'      => __( 'Disabled', 'usland' ),
            'default'  => true,
        ),
        array(
            'id'       => 'ask_bar',
            'type'     => 'button_set',
            'title'    => __( 'Ask For Quote Enable / Disable', 'usland' ),
            'options'  => array(
                'ask_bar_on'  => __( 'Enabled', 'usland' ),
				'ask_bar_off'   => __( 'Disabled', 'usland' ),
            ),
            'default'  => 'ask_bar_on',
        ),
        array(
            'id'       => 'ask_page_link_text',
            'type'     => 'text',
            'title'    => __( 'Ask For Quote Button Text', 'usland' ),
            'required' => array( 'ask_bar', 'equals', 'ask_bar_on' ),
            'default'  => 'Ask For Quote',
        ),
        array(
            'id'       => 'ask_page_link',
            'type'     => 'text',
            'title'    => __( 'Ask For Quote Button URL', 'usland' ),
            'required' => array( 'ask_bar', 'equals', 'ask_bar_on' ),
            'default'  => 'http://example.com',
        ),
    )
) 
);

Redux::setSection( $opt_name, array(
    'title'            => __( 'Footer', 'usland' ),
    'id'               => 'footer_section',
    'heading'          => '',
    'icon'             => 'el el-caret-down',
    'fields' => array(
        array(
            'id'       => 'copyright_text',
            'type'     => 'textarea',
            'title'    => __( 'Copyright Text', 'usland' ),
            'default'  => '&copy; Copyright Usland 2021. All Right Reserved.',
        ),
    )
    ) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Typography', 'usland' ),
    'id'               => 'typo_section',
    'icon'             => 'el el-text-width',
    'fields' => array(
        array(
            'id'       => 'typo_body',
            'type'     => 'typography',
            'title'    => __( 'Body', 'usland' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-style'   => false,
            'font-weight'   => true,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Open Sans',
                'google'      => true,
                'font-size'   => '15px',
                'font-weight' => '400',
                'line-height'   => '26px',
            ),
        ),
        array(
            'id'       => 'typo_h1',
            'type'     => 'typography',
            'title'    => __( 'Header h1', 'usland' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-style'   => false,
            'font-weight'   => true,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Roboto',
                'google'      => true,
                'font-size'   => '40px',
                'font-weight' => '600',
                'line-height'   => '44px',
            ),
        ),
        array(
            'id'       => 'typo_h2',
            'type'     => 'typography',
            'title'    => __( 'Header h2', 'usland' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-style'   => false,
            'font-weight'   => true,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Roboto',
                'google'      => true,
                'font-size'   => '28px',
                'font-weight' => '600',
                'line-height' => '31px',
            ),
        ),
        array(
            'id'       => 'typo_h3',
            'type'     => 'typography',
            'title'    => __( 'Header h3', 'usland' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-style'   => false,
            'font-weight'   => true,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Roboto',
                'google'      => true,
                'font-size'   => '20px',
                'font-weight' => '600',
                'line-height' => '26px',
            ),
        ),
        array(
            'id'       => 'typo_h4',
            'type'     => 'typography',
            'title'    => __( 'Header h4', 'usland' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-style'   => false,
            'font-weight'   => true,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Roboto',
                'google'      => true,
                'font-size'   => '16px',
                'font-weight' => '600',
                'line-height' => '18px',
            ),
        ),
        array(
            'id'       => 'typo_h5',
            'type'     => 'typography',
            'title'    => __( 'Header h5', 'usland' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-style'   => false,
            'font-weight'   => true,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Roboto',
                'google'      => true,
                'font-size'   => '14px',
                'font-weight' => '600',
                'line-height' => '16px',
            ),
        ),
        array(
            'id'       => 'typo_h6',
            'type'     => 'typography',
            'title'    => __( 'Header h6', 'usland' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-style'   => false,
            'font-weight'   => true,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Roboto',
                'google'      => true,
                'font-size'   => '12px',
                'font-weight' => '600',
                'line-height' => '14px',
            ),
        ),
    )            
) );

// Generate Common post type fields
function usland_redux_post_type_fields( $prefix ){
    return array(
        array(
            'id'       => $prefix. '_layout',
            'type'     => 'button_set',
            'title'    => __( 'Layout', 'usland' ),
            'options'  => array(
                'left-sidebar'  => __( 'Left Sidebar', 'usland' ),
                'full-width'    => __( 'Full Width', 'usland' ),
                'right-sidebar' => __( 'Right Sidebar', 'usland' ),
            ),
            'default' => 'right-sidebar'
        ),
        array(
            'id'       => $prefix. '_padding_top',
            'type'     => 'text',
            'title'    => __( 'Content Padding Top', 'usland' ),
            'validate'  => 'numeric',
            'default' => '80',
        ),
        array(
            'id'       => $prefix. '_padding_bottom',
            'type'     => 'text',
            'title'    => __( 'Content Padding Bottom', 'usland' ),
            'validate'  => 'numeric',
            'default' => '80'
        ),
        array(
            'id'       => $prefix. '_banner',
            'type'     => 'switch',
            'title'    => __( 'Banner', 'usland' ),
            'on'       => __( 'Enabled', 'usland' ),
            'off'      => __( 'Disabled', 'usland' ),
            'default'  => true,
        ),
        array(
            'id'       => $prefix. '_breadcrumb',
            'type'     => 'switch',
            'title'    => __( 'Breadcrumb', 'usland' ),
            'on'       => __( 'Enabled', 'usland' ),
            'off'      => __( 'Disabled', 'usland' ),
            'default'  => true,
            'required' => array( $prefix. '_banner', 'equals', true )
        ),
        array(
            'id'       => $prefix. '_bgtype',
            'type'     => 'button_set',
            'title'    => __( 'Banner Background Type', 'usland' ),
            'options'  => array(
                'bgcolor'  => __( 'Background Color', 'usland' ),
				'bgimg'    => __( 'Background Image', 'usland' ),
            ),
            'default' => 'bgcolor',
            'required' => array( $prefix. '_banner', 'equals', true )
        ),
        array(
            'id'       => $prefix. '_bgimg',
            'type'     => 'media',
            'title'    => __( 'Banner Background Image', 'usland' ),
			'default'  => array(
							'url'=> USLAND_IMG_URL . 'banner.jpg'
						  ),
            'required' => array( $prefix. '_bgtype', 'equals', 'bgimg' )
        ), 
        array(
            'id'       => $prefix. '_bgcolor',
            'type'     => 'color',
            'title'    => __('Banner Background Color', 'usland'), 
            'validate' => 'color',
            'transparent' => false,
            'default' => '#606060',
            'required' => array( $prefix. '_bgtype', 'equals', 'bgcolor' )
        ),
		array(
            'id'       => $prefix. '_banner_padding_top_default',
            'type'     => 'text',
            'title'    => __( 'Banner Padding Top', 'usland' ),
            'validate'  => 'numeric',
            'default' => '80',
        ),
        array(
            'id'       => $prefix. '_banner_padding_bottom_default',
            'type'     => 'text',
            'title'    => __( 'Banner Padding Bottom', 'usland' ),
            'validate'  => 'numeric',
            'default' => '80'
        ),
    );
}


Redux::setSection( $opt_name, array(
    'title'            => __( 'Layout Defaults', 'usland' ),
    'id'               => 'layout_defaults',
    'icon'             => 'el el-th',
    ) );

// Page
$usland_page_fields = usland_redux_post_type_fields( 'page' );
$usland_page_fields[0]['default'] = 'full-width';
Redux::setSection( $opt_name, array(
    'title'            => __( 'Page', 'usland' ),
    'id'               => 'pages_section',
    'subsection' => true,
    'fields' => $usland_page_fields     
    ) );


//Post Archive
$usland_fields3 = array(
    array(
        'id'       => 'post_page_column',
        'type'     => 'button_set',
        'title'    => __( 'Column Per Page', 'usland' ),
        'options'  => array(
            '1-column'      => __( '1 Column', 'usland' ),
            '2-columns'     => __( '2 Columns', 'usland' ),
            '3-columns'     => __( '3 Columns', 'usland' ),
        ),
        'default' => '2-columns'
    )
);

$usland_post_archive_fields_col = usland_redux_post_type_fields( 'blog' );
$usland_post_archive_fields = array_merge( $usland_fields3, $usland_post_archive_fields_col );
Redux::setSection( $opt_name, array(
    'title'            => __( 'Blog / Property / Team / Archive', 'usland' ),
    'id'               => 'blog_section',
    'subsection' => true,
    'fields' => $usland_post_archive_fields
    ) );


// Single Post
$usland_single_post_fields = usland_redux_post_type_fields( 'single_post' );
Redux::setSection( $opt_name, array(
    'title'            => __( 'Post Single', 'usland' ),
    'id'               => 'single_post_section',
    'subsection' => true,
    'fields' => $usland_single_post_fields           
    ) );
    
// Property Single
$usland_fields1 = array(
    array(
        'id'       => 'property_slug',
        'type'     => 'text',
        'title'    => __( 'Slug', 'usland' ),
        'default'  => 'Property',
    ),
    array(
        'id'       => 'property_related',
        'type'     => 'text',
        'title'    => __( 'Related Property Title', 'usland' ),
        'default'  => 'Related Property',
    )
);

$usland_fields2 = usland_redux_post_type_fields( 'property' );
$usland_fields2[0]['default'] = 'full-width';
$usland_property_fields = array_merge( $usland_fields1, $usland_fields2 );
Redux::setSection( $opt_name, array(
    'title'            => __( 'Property Single', 'usland' ),
    'id'               => 'property_section',
    'subsection' => true,
    'fields' => $usland_property_fields
    ) );

// Team Single
$usland_fields5 = array(
    array(
        'id'       => 'team_slug',
        'type'     => 'text',
        'title'    => __( 'Slug', 'usland' ),
        'default'  => 'Team',
    ),
    array(
        'id'       => 'team_related',
        'type'     => 'text',
        'title'    => __( 'Submitted Property Title', 'usland' ),
        'default'  => 'Other Property',
    )
);

$usland_fields2 = usland_redux_post_type_fields( 'team' );
$usland_fields2[0]['default'] = 'full-width';
$usland_team_fields = array_merge( $usland_fields5, $usland_fields2 );
Redux::setSection( $opt_name, array(
    'title'            => __( 'Team Single', 'usland' ),
    'id'               => 'team_section',
    'subsection' => true,
    'fields' => $usland_team_fields
    ) );


// Search
$usland_fields4 = array(
    array(
        'id'       => 'search_page_column',
        'type'     => 'button_set',
        'title'    => __( 'Column Per Page', 'usland' ),
        'options'  => array(
            '1-column'      => __( '1 Column', 'usland' ),
            '2-columns'     => __( '2 Columns', 'usland' ),
            '3-columns'     => __( '3 Columns', 'usland' ),
        ),
        'default' => '2-columns'
    )
);

$usland_search_fields_col = usland_redux_post_type_fields( 'search' );
$usland_search_fields = array_merge( $usland_fields4, $usland_search_fields_col );
Redux::setSection( $opt_name, array(
    'title'            => __( 'Search Layout', 'usland' ),
    'id'               => 'search_section',
    'heading'          => '',
    'subsection' => true,
    'fields' => $usland_search_fields            
) 
);

// Error 404 Layout
$usland_search_fields = usland_redux_post_type_fields( 'error' );
$usland_search_fields[0]['default'] = 'full-width';
Redux::setSection( $opt_name, array(
    'title'   => __( 'Error 404 Layout', 'usland' ),
    'id'      => 'error_section',
    'heading' => '',
    'subsection' => true,
    'fields'  => $usland_search_fields           
) 
);
// Error
$usland_fields2 = array( 
    array(
        'id'       => 'error_title',
        'type'     => 'text',
        'title'    => __( 'Page Title', 'usland' ),
        'default'  => __( 'Error 404', 'usland' ),
    ), 
    array(
        'id'       => 'error_text1',
        'type'     => 'text',
        'title'    => __( 'Body Text 1', 'usland' ),
        'default'  => __( '404', 'usland' ),
    ),    
    array(
        'id'       => 'error_text2',
        'type'     => 'text',
        'title'    => __( 'Body Text 2', 'usland' ),
        'default'  => __( 'Page not Found', 'usland' ),
    ),
    array(
        'id'       => 'error_text3',
        'type'     => 'text',
        'title'    => __( 'Body Text 3', 'usland' ),
        'default'  => __( 'The page you are looking is not available or has been removed. Try going to Home Page by using the button below.', 'usland' ),
    ),   
    array(
        'id'       => 'error_buttontext',
        'type'     => 'text',
        'title'    => __( 'Button Text', 'usland' ),
        'default'  => __( 'Go to Home Page', 'usland' ),
    )
);
Redux::setSection( $opt_name, array(
    'title'   => __( 'Error Page Settings', 'usland' ),
    'id'      => 'error_srttings_section',
    'heading' => '',
    'icon'    => 'el el-error-alt',
    'fields'  => $usland_fields2           
) 
);
Redux::setSection( $opt_name, array(
    'title'   => __( 'Advanced', 'usland' ),
    'id'      => 'advanced_section',
    'heading' => '',
    'icon'    => 'el el-css',
    'fields'  => array(
        array(
            'id'       => 'custom_css',
            'type'     => 'ace_editor',
            'title'    => __( 'Custom CSS', 'usland' ),
            'subtitle' => __( 'Paste your CSS code here.', 'usland' ),
            'mode'     => 'css',
            'theme'    => 'chrome',
            'default'  => "body{\n   margin: 0 auto;\n}",
            'options'    => array('minLines' => 30)
        ),
    )
) 
);

// -> END Fields


// If Redux is running as a plugin, this will remove the demo notice and links
add_action( 'redux/loaded', 'usland_remove_demo' );
/**
 * Removes the demo link and the notice of integrated demo from the redux-framework plugin
 */
if ( ! function_exists( 'usland_remove_demo' ) ) {
    function usland_remove_demo() {
        // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
        if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
            remove_filter( 'plugin_row_meta', array(
                ReduxFrameworkPlugin::instance(),
                'plugin_metalinks'
                ), null, 2 );

            // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
            remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
        }
    }
}