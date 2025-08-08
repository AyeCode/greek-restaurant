<?php
/**===================================== **
 * This is the main framework functions.
 * These are also theme specific functions.
 *====================================== **/
add_action('tgmpa_register', 'my_theme_register_required_plugins');
function my_theme_register_required_plugins()
{
    $plugins = array(


        array(
            'name' => 'Ketchup Restaurant Reservations',
            'slug' => 'ketchup-restaurant-reservations',
            'required' => false
        ),
        array(
            'name' => 'Contact Form 7',
            'slug' => 'contact-form-7',
            'required' => false,
        ),
        array(
            'name'      => 'Bootstrap 3 Shortcodes',
            'slug'      => 'bootstrap-3-shortcodes',
            'required'  => false,
        ),
        array(
            'name'      => 'Ketchup Shortcodes',
            'slug'      => 'ketchup-shortcodes-pack',
            'required'  => false,
        )

    );
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu' => 'tgmpa-install-plugins', // Menu slug.
        'has_notices' => true,                    // Show admin notices or not.
        'dismissable' => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg' => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message' => '',                      // Message to output right before the plugins table.
        'strings' => array(
            'page_title' => __('Install Required Plugins', 'greek-restaurant'),
            'menu_title' => __('Install Plugins', 'greek-restaurant'),
            'installing' => __('Installing Plugin: %s', 'greek-restaurant'), // %s = plugin name.
            'oops' => __('Something went wrong with the plugin API.', 'greek-restaurant'),
            'notice_can_install_required' => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'greek-restaurant'), // %1$s = plugin name(s).
            'notice_can_install_recommended' => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'greek-restaurant'), // %1$s = plugin name(s).
            'notice_cannot_install' => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'greek-restaurant'), // %1$s = plugin name(s).
            'notice_can_activate_required' => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'greek-restaurant'), // %1$s = plugin
            // name(s).
            'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'greek-restaurant'), // %1$s =
            // plugin name(s).
            'notice_cannot_activate' => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'greek-restaurant'), // %1$s = plugin name(s).
            'notice_ask_to_update' => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.'), // %1$s = plugin name(s).
            'notice_cannot_update' => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'greek-restaurant'), // %1$s = plugin name(s).
            'install_link' => _n_noop('Begin installing plugin', 'Begin
            installing plugins', 'greek-restaurant'),
            'activate_link' => _n_noop('Begin activating plugin', 'Begin
            activating plugins', 'greek-restaurant'),
            'return' => __('Return to Required Plugins Installer', 'greek-restaurant'),
            'plugin_activated' => __('Plugin activated successfully.', 'greek-restaurant'),
            'complete' => __('All plugins installed and activated successfully. %s', 'greek-restaurant'), // %s = dashboard link.
            'nag_type' => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa($plugins, $config);
}

/** CUSTOMIZER **/

function greek_restaurant_customizer($wp_customize)
{

    /** TOP BAR SECTION */
    $wp_customize->add_section(
        'top_bar_settings_section',
        array(
            'title' => __('Top Bar Settings', 'greek-restaurant'),
            'description' => __('General Settings for the top bar.', 'greek-restaurant'),
            'priority' => 9,
        )
    );


    $wp_customize->add_setting(
        'greek_restaurant_enable_top_bar',
        array(
            'default' => '0',
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_top_address',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_top_telephone',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    /** Top Bar Controls */

    $wp_customize->add_control(
        'greek_restaurant_enable_top_bar',
        array(
            'type' => 'radio',
            'label' => __('Enable/Disable the top bar area',
                'greek-restaurant'),
            'section' => 'top_bar_settings_section',
            'settings' => 'greek_restaurant_enable_top_bar',
            'choices' => array(
                '0' => __('Disabled', 'greek-restaurant'),
                '1' => __('Enabled', 'greek-restaurant')
            )
        ));

    $wp_customize->add_control(
        'greek_restaurant_top_address',
        array(
            'type' => 'text',
            'label' => __('Top address', 'greek-restaurant'),
            'section' => 'top_bar_settings_section',
            'settings' => 'greek_restaurant_top_address'
        )
    );

    $wp_customize->add_control(
        'greek_restaurant_top_telephone',
        array(
            'type' => 'text',
            'label' => __('Top telephone', 'greek-restaurant'),
            'section' => 'top_bar_settings_section',
            'settings' => 'greek_restaurant_top_telephone'
        )
    );

    /** GENERAL SECTION Options**/

    $wp_customize->add_section(
        'general_settings_section',
        array(
            'title' => __('General Settings', 'greek-restaurant'),
            'description' => __('General Settings for this theme.', 'greek-restaurant'),
            'priority' => 10,
        )
    );

    /** Register Settings **/

    $wp_customize->add_setting(
        'greek_favicon_upload',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );
    $wp_customize->add_setting(
        'greek_logo_upload',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_currency_sign',
        array(
            'default' => '$',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );


    $wp_customize->add_setting(
        'greek_restaurant_blog_posts_number',
        array(
            'default' => '10',
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_disable_og',
        array(
            'default' => '0',
            'sanitize_callback' => 'absint'
        )
    );

    /** Register Controls **/

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'greek_favicon_upload',
            array(
                'label' => __('Upload a favicon', 'greek-restaurant'),
                'section' => 'general_settings_section',
                'settings' => 'greek_favicon_upload',
            )
        )
    );


    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'greek_logo_upload',
            array(
                'label' => __('Upload a logo', 'greek-restaurant'),
                'section' => 'general_settings_section',
                'settings' => 'greek_logo_upload',
            )
        )
    );


    $wp_customize->add_control(
        'greek_restaurant_currency_sign',
        array(
            'type' => 'text',
            'label' => __('Currency sign - PRO only', 'greek-restaurant'),
            'section' => 'general_settings_section',
            'settings' => 'greek_restaurant_currency_sign'
        )
    );

    $wp_customize->add_control(
        'greek_restaurant_blog_posts_number',
        array(
            'type' => 'select',
            'label' => __('Blog page  - Posts per page - PRO only', 'greek-restaurant'),
            'section' => 'general_settings_section',
            'settings' => 'greek_restaurant_blog_posts_number',
            'choices' => array(
                '6' => __('6', 'greek-restaurant'),
                '10' => __('10', 'greek-restaurant'),
                '14' => __('14', 'greek-restaurant'),
                '16' => __('16', 'greek-restaurant'),
                '18' => __('18', 'greek-restaurant'),
                '20' => __('20', 'greek-restaurant'),
                '22' => __('22', 'greek-restaurant'),
                '26' => __('26', 'greek-restaurant'),
            )
        ),

        $wp_customize->add_control(
            'greek_restaurant_disable_og',
            array(
                'type' => 'select',
                'label' => __('Disable OpenGraph Tags - PRO Only', 'greek-restaurant'),
                'section' => 'general_settings_section',
                'settings' => 'greek_restaurant_disable_og',
                'choices' => array(
                    '0' => __('No', 'greek-restaurant'),
                    '1' => __('Yes', 'greek-restaurant'),
                )
            ))
    );

    /** HEADER IMAGES **/

    $wp_customize->add_section(
        'header_images_settings_section',
        array(
            'title' => __('Header Images', 'greek-restaurant'),
            'description' => __('The header images that are visible in specific pages like
            category, archive, tag, etc.',
                'greek-restaurant'),
            'priority' => 11,
        )
    );

    /** Settings **/
    $wp_customize->add_setting(
        'greek_restaurant_blog_header_image',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    /** Settings **/
    $wp_customize->add_setting(
        'greek_restaurant_category_header_image',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_tag_header_image',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_archive_header_image',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_search_header_image',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );


    /** Controls **/

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'greek_restaurant_blog_header_image',
            array(
                'label' => __('Blog Template Header Image ', 'greek-restaurant'),
                'section' => 'header_images_settings_section',
                'settings' => 'greek_restaurant_blog_header_image',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'greek_restaurant_category_header_image',
            array(
                'label' => __('Category Header Image ', 'greek-restaurant'),
                'section' => 'header_images_settings_section',
                'settings' => 'greek_restaurant_category_header_image',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'greek_restaurant_tag_header_image',
            array(
                'label' => __('Tag Header Image ', 'greek-restaurant'),
                'section' => 'header_images_settings_section',
                'settings' => 'greek_restaurant_tag_header_image',
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'greek_restaurant_archive_header_image',
            array(
                'label' => __('Archive Header Image ', 'greek-restaurant'),
                'section' => 'header_images_settings_section',
                'settings' => 'greek_restaurant_archive_header_image',
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'greek_restaurant_search_header_image',
            array(
                'label' => __('Search Header Image ', 'greek-restaurant'),
                'section' => 'header_images_settings_section',
                'settings' => 'greek_restaurant_search_header_image',
            )
        )
    );

    /** STYLING OPTIONS  **/

    $wp_customize->add_panel('greek_restaurant_typography_panel', array(
        'priority' => 12,
        'title' => __('Styling', 'greek-restaurant'),
        'description' => __('Description of what this panel does.', 'greek-restaurant'),
    ));

    /** STYLING SECTIONS **/

    $wp_customize->add_section(
        'social_icon_styles',
        array(
            'title' => __('Social Icon Styles.', 'greek-restaurant'),
            'description' => __('CSS styles of the social icons.',
                'greek-restaurant'),
            'priority' => 11,
            'panel' => 'greek_restaurant_typography_panel'
        )
    );

    $wp_customize->add_section(
        'navigation_styles',
        array(
            'title' => __('Navigation Styles.', 'greek-restaurant'),
            'description' => __('CSS styles of the navigation menus.Change link colors,
            hovers, sub-menu colors.',
                'greek-restaurant'),
            'priority' => 12,
            'panel' => 'greek_restaurant_typography_panel'
        )
    );

    $wp_customize->add_section(
        'general_styles',
        array(
            'title' => __('General Element Styles.', 'greek-restaurant'),
            'description' => __('CSS styles of the general elements like body colors,
            paragraph colors', 'greek-restaurant'),
            'priority' => 13,
            'panel' => 'greek_restaurant_typography_panel'
        )
    );

    $wp_customize->add_section(
        'comment_styles',
        array(
            'title' => __('Comment Styles.', 'greek-restaurant'),
            'description' => __('CSS styles of the comment section.',
                'greek-restaurant'),
            'priority' => 14,
            'panel' => 'greek_restaurant_typography_panel'
        )
    );

    $wp_customize->add_section(
        'sidebars_styles',
        array(
            'title' => __('Sidebar Styles.', 'greek-restaurant'),
            'description' => __('CSS styles of the main sidebar styles.',
                'greek-restaurant'),
            'priority' => 15,
            'panel' => 'greek_restaurant_typography_panel'
        )
    );

    $wp_customize->add_section(
        'specific_widget_styles',
        array(
            'title' => __('Specific Widget styles.', 'greek-restaurant'),
            'description' => __('CSS styles of specific widgets.',
                'greek-restaurant'),
            'priority' => 16,
            'panel' => 'greek_restaurant_typography_panel'
        )
    );

    $wp_customize->add_section(
        'footer-area',
        array(
            'title' => __('Footer Area.', 'greek-restaurant'),
            'description' => __('CSS style of the footer.',
                'greek-restaurant'),
            'priority' => 17,
            'panel' => 'greek_restaurant_typography_panel'
        )
    );

    $wp_customize->add_section(
        'footer_widget_styles',
        array(
            'title' => __('Footer widget styles.', 'greek-restaurant'),
            'description' => __('CSS styles of the footer styles.',
                'greek-restaurant'),
            'priority' => 18,
            'panel' => 'greek_restaurant_typography_panel'
        )
    );

    $wp_customize->add_section(
        'copyright_styles',
        array(
            'title' => __('Copyright styles.', 'greek-restaurant'),
            'description' => __('CSS styles of the copyright area.',
                'greek-restaurant'),
            'priority' => 19,
            'panel' => 'greek_restaurant_typography_panel'
        )
    );

    $wp_customize->add_section(
        'other_styles',
        array(
            'title' => __('Other Styles.', 'greek-restaurant'),
            'description' => __('CSS styles other elements.',
                'greek-restaurant'),
            'priority' => 20,
            'panel' => 'greek_restaurant_typography_panel'
        )
    );


    /** STYLING SETTINGS **/

    /** Social Icons */
    $wp_customize->add_setting(
        'greek_restaurant_social_icon_color',
        array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_social_icon_background_color',
        array(
            'default' => '#98d6db',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_social_icon_hover_color',
        array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_social_icon_background_hover_color',
        array(
            'default' => '#5E9BA0',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );


    /** Navigation Styles Control  **/

    $wp_customize->add_setting(
        'greek_restaurant_current_menu_color',
        array(
            'default' => '#5E9BA0',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_menu_link_color',
        array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_menu_link_hover_color',
        array(
            'default' => '#5E9BA0',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_submenu_background',
        array(
            'default' => '#7BCBD2',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_submenu_hover_background',
        array(
            'default' => '#7BCBD2',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_submenu_links_color',
        array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_submenu_links_hover_color',
        array(
            'default' => '#5E9BA0',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    /** Main Elements Styling **/

    $wp_customize->add_setting(
        'greek_restaurant_headings_color',
        array(
            'default' => '#7bcbd2',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_links_color',
        array(
            'default' => '#7bcbd2',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_setting(
        'greek_restaurant_links_hover_color',
        array(
            'default' => '#5E9BA0',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_main_color',
        array(
            'default' => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    /*** Comment STYLES **/

    $wp_customize->add_setting(
        'greek_restaurant_comment_headings_color',
        array(
            'default' => '#7bcbd2',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_comment_links_color',
        array(
            'default' => '#7bcbd2',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_comment_links_hover_color',
        array(
            'default' => '#5E9BA0',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_comment_button_color',
        array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_comment_button_text_color',
        array(
            'default' => '#7bcbd2',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_comment_button_hover_color',
        array(
            'default' => '#7bcbd2',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_comment_button_text_hover_color',
        array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    /** SIDEBARS Styles **/

    $wp_customize->add_setting(
        'greek_restaurant_widget_headings',
        array(
            'default' => '#7bcbd2',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_widget_links_color',
        array(
            'default' => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_widget_links_hover_color',
        array(
            'default' => '#5E9BA0',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_widget_body_color',
        array(
            'default' => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    /** Specific Widget Settings **/

    $wp_customize->add_setting(
        'greek_restaurant_tag_bg_color',
        array(
            'default' => '#7bcbd2',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_tag_text_color',
        array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_tag_bg_hover_color',
        array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_tag_text_hover_color',
        array(
            'default' => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_calendar_header_color',
        array(
            'default' => '#7bcbd2',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_calendar_header_text_color',
        array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_calendar_link_backrground_color',
        array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_calendar_link_hover_backrground_color',
        array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );


    /*** Footer Area  ***/

    $wp_customize->add_setting(
        'greek_restaurant_footer_background_color',
        array(
            'default' => '#7BCBD2',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    /** Footer Widgets **/

    $wp_customize->add_setting(
        'greek_restaurant_footerwidget_headings',
        array(
            'default' => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_footerwidget_links_color',
        array(
            'default' => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_footerwidget_links_hover_color',
        array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_footerwidget_body_color',
        array(
            'default' => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_footer_tag_bg_color',
        array(
            'default' => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_footer_tag_text_color',
        array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_footer_tag_bg_hover_color',
        array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_footer_tag_text_hover_color',
        array(
            'default' => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );


    /** Copyright settings **/

    $wp_customize->add_setting(
        'greek_restaurant_copyright_background_color',
        array(
            'default' => '#e0e0e0',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_copyright_links_color',
        array(
            'default' => '#7bcbd2',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_copyright_links_hover_color',
        array(
            'default' => '#ba6a0b',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_copyright_text_color',
        array(
            'default' => '#939598',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );


    /*** Other Style settings **/

    $wp_customize->add_setting(
        'greek_restaurant_slide_title_color',
        array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );


    $wp_customize->add_setting(
        'greek_restaurant_pager_background_color',
        array(
            'default' => '#F1890C',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );


    /*************************
     * STYLING CONTROLS
     *************************/

    /** Social Icons Widget **/

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_social_icon_color
            ',
            array(
                'label' => __('Color of the social icon.', 'greek-restaurant'),
                'section' => 'social_icon_styles',
                'settings' => 'greek_restaurant_social_icon_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_social_icon_background_color',
            array(
                'label' => __('Background color of the icon.', 'greek-restaurant'),
                'section' => 'social_icon_styles',
                'settings' => 'greek_restaurant_social_icon_background_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_social_icon_hover_color',
            array(
                'label' => __('Icon color - hover state.', 'greek-restaurant'),
                'section' => 'social_icon_styles',
                'settings' => 'greek_restaurant_social_icon_hover_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_social_icon_background_hover_color',
            array(
                'label' => __('Background color - hover state.', 'greek-restaurant'),
                'section' => 'social_icon_styles',
                'settings' => 'greek_restaurant_social_icon_background_hover_color',
            )
        )
    );

    /** Main Navigation Controls  **/

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_current_menu_color',
            array(
                'label' => __('Current Menu item color.', 'greek-restaurant'),
                'section' => 'navigation_styles',
                'settings' => 'greek_restaurant_current_menu_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_menu_link_color',
            array(
                'label' => __('Menu link color.', 'greek-restaurant'),
                'section' => 'navigation_styles',
                'settings' => 'greek_restaurant_menu_link_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_menu_link_hover_color',
            array(
                'label' => __('Menu link color - hover state.', 'greek-restaurant'),
                'section' => 'navigation_styles',
                'settings' => 'greek_restaurant_menu_link_hover_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_submenu_background',
            array(
                'label' => __('Submenu background color.', 'greek-restaurant'),
                'section' => 'navigation_styles',
                'settings' => 'greek_restaurant_submenu_background',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_submenu_hover_background',
            array(
                'label' => __('Submenu background color - hover state.',
                    'greek-restaurant'),
                'section' => 'navigation_styles',
                'settings' => 'greek_restaurant_submenu_hover_background',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_submenu_links_color',
            array(
                'label' => __('Submenu link color.',
                    'greek-restaurant'),
                'section' => 'navigation_styles',
                'settings' => 'greek_restaurant_submenu_links_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_submenu_links_hover_color',
            array(
                'label' => __('Submenu link color - hover color',
                    'greek-restaurant'),
                'section' => 'navigation_styles',
                'settings' => 'greek_restaurant_submenu_links_hover_color',
            )
        )
    );

    /** Main elements **/

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_headings_color',
            array(
                'label' => __('H1-H6 heading color',
                    'greek-restaurant'),
                'section' => 'general_styles',
                'settings' => 'greek_restaurant_headings_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_links_color',
            array(
                'label' => __('Applies to page links',
                    'greek-restaurant'),
                'section' => 'general_styles',
                'settings' => 'greek_restaurant_links_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_links_hover_color',
            array(
                'label' => __('Applies to page links - hover state',
                    'greek-restaurant'),
                'section' => 'general_styles',
                'settings' => 'greek_restaurant_links_hover_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_main_color',
            array(
                'label' => __('Applies to main body text',
                    'greek-restaurant'),
                'section' => 'general_styles',
                'settings' => 'greek_restaurant_main_color',
            )
        )
    );


    /** Comment Controls */

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_comment_headings_color',
            array(
                'label' => __('Headings in comment section',
                    'greek-restaurant'),
                'section' => 'comment_styles',
                'settings' => 'greek_restaurant_comment_headings_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_comment_links_color',
            array(
                'label' => __('Links in comment section',
                    'greek-restaurant'),
                'section' => 'comment_styles',
                'settings' => 'greek_restaurant_comment_links_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_comment_links_hover_color',
            array(
                'label' => __('Links in comment section - Hover state',
                    'greek-restaurant'),
                'section' => 'comment_styles',
                'settings' => 'greek_restaurant_comment_links_hover_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_comment_button_color',
            array(
                'label' => __('Submit comment button background',
                    'greek-restaurant'),
                'section' => 'comment_styles',
                'settings' => 'greek_restaurant_comment_button_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_comment_button_text_color',
            array(
                'label' => __('Submit comment button text color.',
                    'greek-restaurant'),
                'section' => 'comment_styles',
                'settings' => 'greek_restaurant_comment_button_text_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_comment_button_hover_color',
            array(
                'label' => __('Submit comment button background color - hover state.',
                    'greek-restaurant'),
                'section' => 'comment_styles',
                'settings' => 'greek_restaurant_comment_button_hover_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_comment_button_text_hover_color',
            array(
                'label' => __('Submit comment button text color - hover state.',
                    'greek-restaurant'),
                'section' => 'comment_styles',
                'settings' => 'greek_restaurant_comment_button_text_hover_color',
            )
        )
    );


    /** Sidebar Styles **/

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_widget_headings',
            array(
                'label' => __('Widget headings color.',
                    'greek-restaurant'),
                'section' => 'sidebars_styles',
                'settings' => 'greek_restaurant_widget_headings',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_widget_links_color',
            array(
                'label' => __('Widget link color.',
                    'greek-restaurant'),
                'section' => 'sidebars_styles',
                'settings' => 'greek_restaurant_widget_links_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_widget_links_hover_color',
            array(
                'label' => __('Widget link color - hover state',
                    'greek-restaurant'),
                'section' => 'sidebars_styles',
                'settings' => 'greek_restaurant_widget_links_hover_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_widget_body_color',
            array(
                'label' => __('Widget text body color',
                    'greek-restaurant'),
                'section' => 'sidebars_styles',
                'settings' => 'greek_restaurant_widget_body_color',
            )
        )
    );

    /*** Specific Widgets ***/

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_tag_bg_color',
            array(
                'label' => __('Tagcloud tag background color.',
                    'greek-restaurant'),
                'section' => 'specific_widget_styles',
                'settings' => 'greek_restaurant_tag_bg_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_tag_text_color',
            array(
                'label' => __('Tagcloud text color.',
                    'greek-restaurant'),
                'section' => 'specific_widget_styles',
                'settings' => 'greek_restaurant_tag_text_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_tag_bg_hover_color',
            array(
                'label' => __('Tagcloud background color - hover',
                    'greek-restaurant'),
                'section' => 'specific_widget_styles',
                'settings' => 'greek_restaurant_tag_bg_hover_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_tag_text_hover_color',
            array(
                'label' => __('Tagcloud text color - hover.',
                    'greek-restaurant'),
                'section' => 'specific_widget_styles',
                'settings' => 'greek_restaurant_tag_text_hover_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_calendar_header_color',
            array(
                'label' => __('Calendar widget header background color.',
                    'greek-restaurant'),
                'section' => 'specific_widget_styles',
                'settings' => 'greek_restaurant_calendar_header_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_calendar_header_text_color',
            array(
                'label' => __('Calendar widget header text color.',
                    'greek-restaurant'),
                'section' => 'specific_widget_styles',
                'settings' => 'greek_restaurant_calendar_header_text_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_calendar_link_backrground_color',
            array(
                'label' => __('Calendar widget link background color.',
                    'greek-restaurant'),
                'section' => 'specific_widget_styles',
                'settings' => 'greek_restaurant_calendar_link_backrground_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_calendar_link_hover_backrground_color',
            array(
                'label' => __('Calendar widget link hover background color.',
                    'greek-restaurant'),
                'section' => 'specific_widget_styles',
                'settings' => 'greek_restaurant_calendar_link_hover_backrground_color',
            )
        )
    );

    /** Footer Area **/

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_footer_background_color',
            array(
                'label' => __('Footer Background color.',
                    'greek-restaurant'),
                'section' => 'footer-area',
                'settings' => 'greek_restaurant_footer_background_color',
            )
        )
    );

    /** Footer Widgets  **/

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_footerwidget_headings',
            array(
                'label' => __('Footer widget heading color.',
                    'greek-restaurant'),
                'section' => 'footer_widget_styles',
                'settings' => 'greek_restaurant_footerwidget_headings',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_footerwidget_links_color',
            array(
                'label' => __('Footer widget links color.',
                    'greek-restaurant'),
                'section' => 'footer_widget_styles',
                'settings' => 'greek_restaurant_footerwidget_links_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_footerwidget_links_hover_color',
            array(
                'label' => __('Footer widget links color - hover state.',
                    'greek-restaurant'),
                'section' => 'footer_widget_styles',
                'settings' => 'greek_restaurant_footerwidget_links_hover_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_footerwidget_body_color',
            array(
                'label' => __('Footer widget body text color.',
                    'greek-restaurant'),
                'section' => 'footer_widget_styles',
                'settings' => 'greek_restaurant_footerwidget_body_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_footer_tag_bg_color',
            array(
                'label' => __('Footer widget tagcloud background color.',
                    'greek-restaurant'),
                'section' => 'footer_widget_styles',
                'settings' => 'greek_restaurant_footer_tag_bg_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_footer_tag_text_color',
            array(
                'label' => __('Footer widget tagcloud text color.',
                    'greek-restaurant'),
                'section' => 'footer_widget_styles',
                'settings' => 'greek_restaurant_footer_tag_text_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_footer_tag_bg_hover_color_control',
            array(
                'label' => __('Footer widget tagcloud background color. hover state',
                    'greek-restaurant'),
                'section' => 'footer_widget_styles',
                'settings' => 'greek_restaurant_footer_tag_bg_hover_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_footer_tag_text_hover_color',
            array(
                'label' => __('Footer widget tagcloud text color - hover state',
                    'greek-restaurant'),
                'section' => 'footer_widget_styles',
                'settings' => 'greek_restaurant_footer_tag_text_hover_color',
            )
        )
    );


    /** Copyright area **/

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_copyright_background_color',
            array(
                'label' => __('Copyright area background color.',
                    'greek-restaurant'),
                'section' => 'copyright_styles',
                'settings' => 'greek_restaurant_copyright_background_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_copyright_links_color',
            array(
                'label' => __('Copyright area links color.',
                    'greek-restaurant'),
                'section' => 'copyright_styles',
                'settings' => 'greek_restaurant_copyright_links_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_copyright_links_hover_color',
            array(
                'label' => __('Copyright area links color - hover state.',
                    'greek-restaurant'),
                'section' => 'copyright_styles',
                'settings' => 'greek_restaurant_copyright_links_hover_color',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_copyright_text_color',
            array(
                'label' => __('Copyright area text color - hover state.',
                    'greek-restaurant'),
                'section' => 'copyright_styles',
                'settings' => 'greek_restaurant_copyright_text_color',
            )
        )
    );

    /** Other style controls */

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_slide_title_color',
            array(
                'label' => __('Slide title color.',
                    'greek-restaurant'),
                'section' => 'other_styles',
                'settings' => 'greek_restaurant_slide_title_color',
            )
        )
    );


    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'greek_restaurant_pager_background_color',
            array(
                'label' => __('Slider pager background color.',
                    'greek-restaurant'),
                'section' => 'other_styles',
                'settings' => 'greek_restaurant_pager_background_color',
            )
        )
    );

    /*** Social Networks ***/

    $wp_customize->add_section(
        'greek_restaurant_social_section',
        array(
            'title' => __('Social Networks', 'greek-restaurant'),
            'description' => __('Add your social networks.',
                'greek-restaurant'),
            'priority' => 13,
        )
    );

    /** Social Settings **/

    $wp_customize->add_setting(
        'greek_restaurant_facebook_url',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_twitter_url',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_google_plus_url',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_pinterest_url',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_linkedin_url',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_rss_url',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_stumbleupon_url',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_instagram_url',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_youtube_url',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_vimeo_url',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );


    /** Social Controls **/
    $wp_customize->add_control(
        'greek_restaurant_facebook_url',
        array(
            'label' => __('Facebook URL', 'greek-restaurant'),
            'section' => 'greek_restaurant_social_section',
            'settings' => 'greek_restaurant_facebook_url',
            'type' => 'text'
        )
    );

    $wp_customize->add_control(
        'greek_restaurant_twitter_url',
        array(
            'label' => __('Twitter URL', 'greek-restaurant'),
            'section' => 'greek_restaurant_social_section',
            'settings' => 'greek_restaurant_twitter_url',
            'type' => 'text'
        )
    );

    $wp_customize->add_control(
        'greek_restaurant_google_plus_url',
        array(
            'label' => __('Google plus URL', 'greek-restaurant'),
            'section' => 'greek_restaurant_social_section',
            'settings' => 'greek_restaurant_google_plus_url',
            'type' => 'text'
        )
    );

    $wp_customize->add_control(
        'greek_restaurant_pinterest_url',
        array(
            'label' => __('Pinterest URL', 'greek-restaurant'),
            'section' => 'greek_restaurant_social_section',
            'settings' => 'greek_restaurant_pinterest_url',
            'type' => 'text'
        )
    );

    $wp_customize->add_control(
        'greek_restaurant_linkedin_url',
        array(
            'label' => __('Linkedin URL', 'greek-restaurant'),
            'section' => 'greek_restaurant_social_section',
            'settings' => 'greek_restaurant_linkedin_url',
            'type' => 'text'
        )
    );

    $wp_customize->add_control(
        'greek_restaurant_rss_url',
        array(
            'label' => __('RSS URL', 'greek-restaurant'),
            'section' => 'greek_restaurant_social_section',
            'settings' => 'greek_restaurant_rss_url',
            'type' => 'text'
        )
    );

    $wp_customize->add_control(
        'greek_restaurant_stumbleupon_url',
        array(
            'label' => __('Stumbleupon URL', 'greek-restaurant'),
            'section' => 'greek_restaurant_social_section',
            'settings' => 'greek_restaurant_stumbleupon_url',
            'type' => 'text'
        )
    );

    $wp_customize->add_control(
        'greek_restaurant_instagram_url_control',
        array(
            'label' => __('Instagram URL', 'greek-restaurant'),
            'section' => 'greek_restaurant_social_section',
            'settings' => 'greek_restaurant_instagram_url',
            'type' => 'text'
        )
    );

    $wp_customize->add_control(
        'greek_restaurant_youtube_url',
        array(
            'label' => __('Youtube URL', 'greek-restaurant'),
            'section' => 'greek_restaurant_social_section',
            'settings' => 'greek_restaurant_youtube_url',
            'type' => 'text'
        )
    );

    $wp_customize->add_control(
        'greek_restaurant_vimeo_url',
        array(
            'label' => __('Vimeo URL', 'greek-restaurant'),
            'section' => 'greek_restaurant_social_section',
            'settings' => 'greek_restaurant_vimeo_url',
            'type' => 'text'
        )
    );


    /*** Slider Section **/

    $wp_customize->add_section(
        'greek_restaurant_slider_section',
        array(
            'title' => __('Slider Settings', 'greek-restaurant'),
            'description' => __('Slider Settings.',
                'greek-restaurant'),
            'priority' => 14,
        )
    );


    /** Slider Settings **/
    $wp_customize->add_setting(
        'greek_restaurant_slider_disable',
        array(
            'default' => '1',
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_slides_number',
        array(
            'default' => '5',
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_slider_show_pager',
        array(
            'default' => '0',
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_slider_show_arrows',
        array(
            'default' => '1',
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_slider_transition',
        array(
            'default' => 'fade',
            'sanitize_callback' => 'wp_kses_post'
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_slide_speed',
        array(
            'default' => '800',
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_slide_pause',
        array(
            'default' => '3000',
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_slider_autoplay',
        array(
            'default' => '1',
            'sanitize_callback' => 'absint'
        )
    );


    $wp_customize->add_control(
        'greek_restaurant_slider_disable',
        array(
            'type' => 'radio',
            'label' => __('Disable Slider', 'greek-restaurant'),
            'section' => 'greek_restaurant_slider_section',
            'settings' => 'greek_restaurant_slider_disable',
            'choices' => array(
                '1' => __('Yes', 'greek-restaurant'),
                '0' => __('No', 'greek-restaurant')
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'greek_restaurant_slides_number',
            array(
                'label' => __('Slides Number', 'greek-restaurant'),
                'section' => 'greek_restaurant_slider_section',
                'settings' => 'greek_restaurant_slides_number',
                'type' => 'text'
            )
        )
    );

    $wp_customize->add_control(
        'greek_restaurant_slider_show_pager',
        array(
            'type' => 'radio',
            'label' => __('Show pager?', 'greek-restaurant'),
            'section' => 'greek_restaurant_slider_section',
            'settings' => 'greek_restaurant_slider_show_pager',
            'choices' => array(
                '0' => __('No', 'greek-restaurant'),
                '1' => __('Yes', 'greek-restaurant')
            )
        )
    );

    $wp_customize->add_control(
        'greek_restaurant_slider_show_arrows',
        array(
            'type' => 'radio',
            'label' => __('Show arrow navigation ?', 'greek-restaurant'),
            'section' => 'greek_restaurant_slider_section',
            'settings' => 'greek_restaurant_slider_show_arrows',
            'choices' => array(
                '0' => __('No', 'greek-restaurant'),
                '1' => __('Yes', 'greek-restaurant')
            )
        )
    );

    $wp_customize->add_control(
        'greek_restaurant_slider_transition',
        array(
            'type' => 'select',
            'label' => __('Transition Type ?', 'greek-restaurant'),
            'section' => 'greek_restaurant_slider_section',
            'settings' => 'greek_restaurant_slider_transition',
            'choices' => array(
                'fade' => __('Fade', 'greek-restaurant'),
                'horizontal' => __('Horizontal', 'greek-restaurant'),
                'vertical' => __('Vertical', 'greek-restaurant'),
            )
        )
    );

    $wp_customize->add_control(
        'greek_restaurant_slide_speed',
        array(
            'type' => 'text',
            'label' => __('Slide speed ?', 'greek-restaurant'),
            'section' => 'greek_restaurant_slider_section',
            'settings' => 'greek_restaurant_slide_speed'
        )
    );


    $wp_customize->add_control(
        'greek_restaurant_slide_pause',
        array(
            'type' => 'text',
            'label' => __('Pause between slides ?', 'greek-restaurant'),
            'section' => 'greek_restaurant_slider_section',
            'settings' => 'greek_restaurant_slide_pause'
        )
    );

    $wp_customize->add_control(
        'greek_restaurant_slider_autoplay',
        array(
            'type' => 'radio',
            'label' => __('Autoplay?', 'greek-restaurant'),
            'section' => 'greek_restaurant_slider_section',
            'settings' => 'greek_restaurant_slider_autoplay',
            'choices' => array(
                '0' => __('No', 'greek-restaurant'),
                '1' => __('Yes', 'greek-restaurant')
            )
        )
    );


    /*** Page Templates Section **/

    $wp_customize->add_section(
        'greek_restaurant_page_templates_section',
        array(
            'title' => __('Contact Page', 'greek-restaurant'),
            'description' => __('Settings for page templates in this theme.',
                'greek-restaurant'),
            'priority' => 15,
        )
    );


    /*** Page template settings **/

    $wp_customize->add_setting(
        'greek_restaurant_contact_google_map',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_contact_form_title',
        array(
            'default' => 'Send Enquiry',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_contact_form_shortcode',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );


    $wp_customize->add_setting(
        'greek_restaurant_contact_details_title',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_contact_details_address',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_contact_details_phone',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_contact_details_email',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_email'
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_monday_time',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_tuesday_time',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_wednesday_time',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_thursday_time',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_friday_time',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_saturday_time',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_sunday_time',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );


    /** Contact Page Controls */

    $wp_customize->add_control(
        'greek_restaurant_contact_google_map',
        array(
            'type' => 'textarea',
            'label' => __('Google Map . Please write only the source (src) of the iframe',
                'greek-restaurant'),
            'section' => 'greek_restaurant_page_templates_section',
            'settings' => 'greek_restaurant_contact_google_map'
        )
    );

    $wp_customize->add_control(
        'greek_restaurant_contact_form_title',
        array(
            'type' => 'text',
            'label' => __('Contact Form title.',
                'greek-restaurant'),
            'section' => 'greek_restaurant_page_templates_section',
            'settings' => 'greek_restaurant_contact_form_title'
        )
    );

    $wp_customize->add_control(
        'greek_restaurant_contact_form_shortcode',
        array(
            'type' => 'text',
            'label' => __('Contact Form shortcode.Paste the shortcode from the  "Contact form
             7"
            plugin.',
                'greek-restaurant'),
            'section' => 'greek_restaurant_page_templates_section',
            'settings' => 'greek_restaurant_contact_form_shortcode'
        )
    );

    $wp_customize->add_control(
        'greek_restaurant_contact_details_title',
        array(
            'type' => 'text',
            'label' => __('Contact details title.',
                'greek-restaurant'),
            'section' => 'greek_restaurant_page_templates_section',
            'settings' => 'greek_restaurant_contact_details_title'
        )
    );

    $wp_customize->add_control(
        'greek_restaurant_contact_details_address',
        array(
            'type' => 'text',
            'label' => __('Write your address',
                'greek-restaurant'),
            'section' => 'greek_restaurant_page_templates_section',
            'settings' => 'greek_restaurant_contact_details_address'
        )
    );

    $wp_customize->add_control(
        'greek_restaurant_contact_details_phone',
        array(
            'type' => 'text',
            'label' => __('Write your phone',
                'greek-restaurant'),
            'section' => 'greek_restaurant_page_templates_section',
            'settings' => 'greek_restaurant_contact_details_phone'
        )
    );

    $wp_customize->add_control(
        'greek_restaurant_contact_details_email',
        array(
            'type' => 'text',
            'label' => __('Write your email',
                'greek-restaurant'),
            'section' => 'greek_restaurant_page_templates_section',
            'settings' => 'greek_restaurant_contact_details_email'
        )
    );

    $wp_customize->add_control(
        'greek_restaurant_monday_time',
        array(
            'type' => 'text',
            'label' => __('Monday Working hours',
                'greek-restaurant'),
            'section' => 'greek_restaurant_page_templates_section',
            'settings' => 'greek_restaurant_monday_time'
        )
    );

    $wp_customize->add_control(
        'greek_restaurant_tuesday_time',
        array(
            'type' => 'text',
            'label' => __('Tuesday Working hours',
                'greek-restaurant'),
            'section' => 'greek_restaurant_page_templates_section',
            'settings' => 'greek_restaurant_tuesday_time'
        )
    );

    $wp_customize->add_control(
        'greek_restaurant_wednesday_time',
        array(
            'type' => 'text',
            'label' => __('Wednesday Working hours',
                'greek-restaurant'),
            'section' => 'greek_restaurant_page_templates_section',
            'settings' => 'greek_restaurant_wednesday_time'
        )
    );

    $wp_customize->add_control(
        'greek_restaurant_thursday_time',
        array(
            'type' => 'text',
            'label' => __('Thursday Working hours',
                'greek-restaurant'),
            'section' => 'greek_restaurant_page_templates_section',
            'settings' => 'greek_restaurant_thursday_time'
        )
    );

    $wp_customize->add_control(
        'greek_restaurant_friday_time',
        array(
            'type' => 'text',
            'label' => __('Friday Working hours',
                'greek-restaurant'),
            'section' => 'greek_restaurant_page_templates_section',
            'settings' => 'greek_restaurant_friday_time'
        )
    );

    $wp_customize->add_control(
        'greek_restaurant_saturday_time',
        array(
            'type' => 'text',
            'label' => __('Saturday Working hours',
                'greek-restaurant'),
            'section' => 'greek_restaurant_page_templates_section',
            'settings' => 'greek_restaurant_saturday_time'
        )
    );

    $wp_customize->add_control(
        'greek_restaurant_sunday_time',
        array(
            'type' => 'text',
            'label' => __('Sunday Working hours',
                'greek-restaurant'),
            'section' => 'greek_restaurant_page_templates_section',
            'settings' => 'greek_restaurant_sunday_time'
        )
    );


    /*** Copyright Section **/

    $wp_customize->add_section(
        'greek_restaurant_copyright_section',
        array(
            'title' => __('Copyright Text', 'greek-restaurant'),
            'description' => __('Add your copyright. You can use HTML.',
                'greek-restaurant'),
            'priority' => 16,
        )
    );

    $wp_customize->add_setting(
        'greek_restaurant_copyright_text',
        array(
            'default' => '',
            'sanitize_callback'=>'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'greek_restaurant_copyright_text',
        array(
            'type' => 'textarea',
            'label' => __('Copyright Area text',
                'greek-restaurant'),
            'section' => 'greek_restaurant_copyright_section',
            'settings' => 'greek_restaurant_copyright_text'
        )
    );


}

add_action('customize_register', 'greek_restaurant_customizer');


if (version_compare($GLOBALS['wp_version'], '4.1', '<')) :
    function greek_restaurant_wp_title($title,
                              $sep)
    {
        if (is_feed()) {
            return $title;
        }
        global $page, $paged;

        $title .= get_bloginfo('name', 'display');

        $site_description = get_bloginfo('description', 'display');
        if ($site_description && (is_home() || is_front_page())) {
            $title .= " $sep $site_description";
        }
        if (($paged >= 2 || $page >= 2) && !is_404()) {
            $title .= " $sep " . sprintf(__('Page %s', 'greek-restaurant'), max($paged, $page));
        }
        return $title;
    }

    add_filter('wp_title', 'greek_restaurant_wp_title', 10, 2);

endif;
/*== Add 'nextpage' quicktag in WordPress Editor ==**/
if (!function_exists('greek_restaurant_editor')):
    function greek_restaurant_editor($mce_buttons)
    {
        $pos = array_search('wp_more', $mce_buttons, true);
        if ($pos !== false) {
            $tmp_buttons = array_slice($mce_buttons, 0, $pos + 1);
            $tmp_buttons[] = 'wp_page';
            $mce_buttons = array_merge($tmp_buttons, array_slice($mce_buttons, $pos + 1));
        }
        return $mce_buttons;
    }
endif;
add_filter('mce_buttons', 'greek_restaurant_editor');

function greek_restaurant_upsell_notice()
{
    // Enqueue the script
    wp_enqueue_script(
        'prefix-customizer-upsell',
        get_template_directory_uri() . '/js/upsell.js',
        array(), '1.0.0',
        true
    );

    wp_enqueue_script(
        'prefix-customizer-pro',
        get_template_directory_uri() . '/js/upsell_pro.js',
        array(), '1.0.0',
        true

    );

    // Localize the script
    wp_localize_script(
        'prefix-customizer-upsell',
        'prefixL10n',
        array(
            'prefixURL' => esc_url('http://ketchupthemes.com/greek-restaurant-theme'),
            'prefixLabel' => __('Upgrade To Premium', 'greek-restaurant')
        )
    );

    wp_localize_script(
        'prefix-customizer-pro',
        'prefixL11n',
        array(
            'prefixURL' => esc_url('http://ketchupthemes.com/greek-restaurant-theme'),
            'prefixLabel' => __('PRO', 'greek-restaurant')
        )
    );

}

add_action('customize_controls_enqueue_scripts', 'greek_restaurant_upsell_notice');





/**=== Get logo or text for the logo container ===**/

function greek_restaurant_get_logo2()
{
    $logo = get_theme_mod('greek_logo_upload', '');

    if (!empty($logo)):

        $logo_item = '<a href="' . esc_url(home_url('/')) . '"> <img class="animated
        bounce"
        id="kt-logo-image"
        src="' .
            $logo . '"
        alt="'
            . get_bloginfo('name') . '" role="banner"
             />
            </a>';
    else:
        $logo_item = '<h1 class="h3"><a href="' . esc_url(home_url()) . '">' . get_bloginfo('name') . '</a></h1>';
        $logo_item .= '<h4 class="h5">' . get_bloginfo('description') . '</h4>';

    endif;

    return $logo_item;

}


/**=== Get the header image if is any ===**/

if (!function_exists('greek_restaurant_get_header_image')):
    function greek_restaurant_get_header_image()
    {
        $html = '';
        if (get_header_image() != ''):
            $html .= '<img class="img-responsive" src="' . get_header_image() . '" height="' . get_custom_header()->height . '" width="' . get_custom_header()->width . '" alt=""/>';
        else:
            return false;
        endif;
        return $html;
    }
endif;

/** == Check active sidebar  ==*/
if (!function_exists('greek_restaurant_check_active_sidebar')):
    function greek_restaurant_check_active_sidebar($active_sidebar_id)
    {

        $is_active = is_active_sidebar($active_sidebar_id);
        if ($is_active):
            return 'col-md-8';
        else:
            return 'col-md-12';
        endif;
    }
endif;

/**== Numeric pagination ==**/
if (!function_exists('greek_restaurant_custom_pagination')):
    function greek_restaurant_custom_pagination($numpages = '',
                                                $pagerange = '',
                                                $paged = '')
    {

        if (empty($pagerange)) {
            $pagerange = 2;
        }
        global $paged;
        if (empty($paged)) {
            $paged = 1;
        }
        if ($numpages == '') {
            global $wp_query;
            $numpages = $wp_query->max_num_pages;
            if (!$numpages) {
                $numpages = 1;
            }
        }

        if (is_front_page()):
            $paged = 'page';
        else:
            $paged = 'paged';
        endif;

        $pagination_args = array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => 'page/%#%',
            'total' => $numpages,
            'current' => max(1, get_query_var($paged)),
            'show_all' => False,
            'end_size' => 1,
            'mid_size' => $pagerange,
            'prev_next' => True,
            'prev_text' => __('&laquo;', 'greek-restaurant'),
            'next_text' => __('&raquo;', 'greek-restaurant'),
            'type' => 'plain',
            'add_args' => false,
            'add_fragment' => ''
        );

        $paginate_links = paginate_links($pagination_args);

        if ($paginate_links) {
            echo "<nav class='custom-pagination'>";
            //echo "<span class='page-numbers page-num'>".__('Page ','greek-restaurant') . $paged .
            " of
" . $numpages . "</span> ";
            echo $paginate_links;
            echo "</nav>";
        }

    }
endif;

/*** Walker to add descriptions ***/
class Greek_Menu_With_Description extends Walker_Nav_Menu
{
    function start_el(&$output,
                      $item,
                      $depth = 0,
                      $args = array(),
                      $id = 0)
    {
        global $wp_query;
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $class_names = $value = '';

        $classes = empty($item->classes) ? array() : (array)$item->classes;

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $output .= $indent . '<li id="menu-item-' . $item->ID . '"' . $value . $class_names . '>';

        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id);
    }
}

/**== Form shortcode ==**/
if (!function_exists('greek_restaurant_get_form_shortcode')):
    function greek_restaurant_get_form_shortcode()
    {
        $form_shortcode = get_theme_mod('greek_restaurant_contact_form_shortcode', '');

        if (!empty($form_shortcode)):

            return $form_shortcode;

        else:

            return false;

        endif;
    }
endif;

/**=== Footer Functions ===**/

if (!function_exists('greek_restaurant_has_active_footer')):
    function greek_restaurant_has_active_footer()
    {
        $active_footer_sidebars = 0;
        $active_sidebars = array();

        for ($i = 1; $i < 5; $i++) {
            if (is_active_sidebar('greek_restaurant_footer_' . $i . '_sidebar')):
                $active_footer_sidebars++;
            endif;
        }

        if ($active_footer_sidebars == 0):
            return false;

        elseif ($active_footer_sidebars == 1):

            $active_sidebars['class'] = 'col-md-12';
            $active_sidebars['sidebars_count'] = 1;
            return $active_sidebars;

        elseif ($active_footer_sidebars == 2):

            $active_sidebars['class'] = 'col-md-6';
            $active_sidebars['sidebars_count'] = 2;
            return $active_sidebars;

        endif;

    }
endif;