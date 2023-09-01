<?php

require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'astrum_register_required_plugins' );

function astrum_register_required_plugins() {

/**
 * Array of plugin arrays. Required keys are name and slug.
 * If the source is NOT from the .org repo, then source is also required.
 */
$plugins = array(

    array(
        'name'                  => 'AddToAny Share Buttons', // The plugin name
        'slug'                  => 'add-to-any', // The plugin slug (typically the folder name)
        'version'               => '1.8.5',
        'required'              => true, // If false, the plugin is only 'recommended' instead of required
    ),
    array(
        'name'                  => 'Advanced Custom Fields PRO', // The plugin name
        'slug'                  => 'advanced-custom-fields-pro', // The plugin slug (typically the folder name)
        'source'                => get_stylesheet_directory() . '/required-plugins/advanced-custom-fields-pro.5.8.0.zip', // The plugin source
        'required'              => true, // If false, the plugin is only 'recommended' instead of required
        'version'               => '5.8.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
    ),
    array(
        'name'                  => 'Anti-Spam by CleanTalk', // The plugin name
        'slug'                  => 'cleantalk-spam-protect', // The plugin slug (typically the folder name)
        'required'              => true, // If false, the plugin is only 'recommended' instead of required
        'version'               => '5.188', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
    ),
    array(
        'name'                  => 'Astra Pro', // The plugin name
        'slug'                  => 'astra-addon', // The plugin slug (typically the folder name)
        'source'                => get_stylesheet_directory() . '/required-plugins/astra-addon.zip', // The plugin source
        'required'              => true, // If false, the plugin is only 'recommended' instead of required
        'version'               => '3.9.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
    ),
    array(
        'name'                  => 'Autoptimize', // The plugin name
        'slug'                  => 'autoptimize', // The plugin slug (typically the folder name)
        'version'               => '3.1.3',
        'required'              => true, // If false, the plugin is only 'recommended' instead of required
    ),
    array(
        'name'                  => 'Custom Post Type UI', // The plugin name
        'slug'                  => 'custom-post-type-ui', // The plugin slug (typically the folder name)
        'version'               => '1.5.5',
        'required'              => true, // If false, the plugin is only 'recommended' instead of required
    ),
    array(
        'name'                  => 'Duplicate Page', // The plugin name
        'slug'                  => 'duplicate-page', // The plugin slug (typically the folder name)
        'version'               => '4.4.9',
        'required'              => true, // If false, the plugin is only 'recommended' instead of required
    ),
    array(
        'name'                  => 'Elementor', // The plugin name
        'slug'                  => 'elementor', // The plugin slug (typically the folder name)
        'version'               => '3.7.8',
        'required'              => true, // If false, the plugin is only 'recommended' instead of required
    ),
    array(
        'name'                  => 'Elementor Pro', // The plugin name
        'slug'                  => 'elementor-pro', // The plugin slug (typically the folder name)
        'source'                => get_stylesheet_directory() . '/required-plugins/elementor-pro-3.8.1.zip', // The plugin source
        'required'              => true, // If false, the plugin is only 'recommended' instead of required
        'version'               => '3.7.7', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
    ),
    array(
        'name'                  => 'Formidable Forms', // The plugin name
        'slug'                  => 'formidable', // The plugin slug (typically the folder name)
        'version'               => '5.5.2',
        'required'              => true, // If false, the plugin is only 'recommended' instead of required
    ),
    array(
        'name'                  => 'Formidable Forms Pro', // The plugin name
        'slug'                  => 'formidable-pro', // The plugin slug (typically the folder name)
        'source'                => get_stylesheet_directory() . '/required-plugins/formidable-pro.zip', // The plugin source
        'required'              => true, // If false, the plugin is only 'recommended' instead of required
        'version'               => '5.5.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
    ),
    array(
        'name'                  => 'IP Location Block', // The plugin name
        'slug'                  => 'ip-location-block', // The plugin slug (typically the folder name)
        'version'               => '1.1.3',
        'required'              => true, // If false, the plugin is only 'recommended' instead of required
    ),
    array(
        'name'                  => 'iThemes Security', // The plugin name
        'slug'                  => 'better-wp-security', // The plugin slug (typically the folder name)
        'version'               => '8.1.3',
        'required'              => true, // If false, the plugin is only 'recommended' instead of required
    ),
    array(
        'name'                  => 'Page Links To', // The plugin name
        'slug'                  => 'page-links-to', // The plugin slug (typically the folder name)
        'version'               => '3.3.6',
        'required'              => true, // If false, the plugin is only 'recommended' instead of required
    ),
    array(
        'name'                  => 'Page scroll to id', // The plugin name
        'slug'                  => 'page-scroll-to-id', // The plugin slug (typically the folder name)
        'version'               => '1.7.5',
        'required'              => true, // If false, the plugin is only 'recommended' instead of required
    ),
    array(
        'name'                  => 'Really Simple SSL', // The plugin name
        'slug'                  => 'really-simple-ssl', // The plugin slug (typically the folder name)
        'version'               => '5.3.5',
        'required'              => true, // If false, the plugin is only 'recommended' instead of required
    ),
    array(
        'name'                  => 'Simple 301 Redirects', // The plugin name
        'slug'                  => 'simple-301-redirects', // The plugin slug (typically the folder name)
        'version'               => '2.0.7',
        'required'              => true, // If false, the plugin is only 'recommended' instead of required
    ),
    array(
        'name'                  => 'EWWW Image Optimizer', // The plugin name
        'slug'                  => 'ewww-image-optimizer', // The plugin slug (typically the folder name)
        'version'               => '7.2.0',
        'required'              => true, // If false, the plugin is only 'recommended' instead of required
    ),
    array(
        'name'                  => 'Classic Editor', // The plugin name
        'slug'                  => 'classic-editor', // The plugin slug (typically the folder name)
        'version'               => '1.6.3',
        'required'              => true, // If false, the plugin is only 'recommended' instead of required
    ),
    array(
        'name'                  => 'LoginPress | wp-login Custom Login Page Customizer', // The plugin name
        'slug'                  => 'loginpress', // The plugin slug (typically the folder name)
        'version'               => '1.8.0',
        'required'              => true, // If false, the plugin is only 'recommended' instead of required
    ),
    array(
        'name'                  => 'Ultimate Addons for Elementor', // The plugin name
        'slug'                  => 'ultimate-elementor', // The plugin slug (typically the folder name)
        'source'                => get_stylesheet_directory() . '/required-plugins/ultimate-elementor-1.36.4.zip', // The plugin source
        'version'               => '1.36.4',
        'required'              => true, // If false, the plugin is only 'recommended' instead of required
    ),
    array(
        'name'                  => 'UpdraftPlus - Backup/Restore', // The plugin name
        'slug'                  => 'updraftplus', // The plugin slug (typically the folder name)
        'source'                => get_stylesheet_directory() . '/required-plugins/updraftplus.zip', // The plugin source
        'version'               => '2.16.62.0',
        'required'              => true, // If false, the plugin is only 'recommended' instead of required
    ),
    array(
        'name'                  => 'Wordfence Security', // The plugin name
        'slug'                  => 'wordfence', // The plugin slug (typically the folder name)
        'version'               => '7.7.1',
        'required'              => true, // If false, the plugin is only 'recommended' instead of required
    ),
    array(
        'name'                  => 'WP Code', // The plugin name
        'slug'                  => 'insert-headers-and-footers', // The plugin slug (typically the folder name)
        'version'               => '2.0.10',
        'required'              => true, // If false, the plugin is only 'recommended' instead of required
    ),
    array(
        'name'                  => 'WP Mail SMTP', // The plugin name
        'slug'                  => 'wp-mail-smtp', // The plugin slug (typically the folder name)
        'version'               => '3.6.1',
        'required'              => true, // If false, the plugin is only 'recommended' instead of required
    ),
    array(
        'name'                  => 'Yoast SEO', // The plugin name
        'slug'                  => 'wordpress-seo', // The plugin slug (typically the folder name)
        'version'               => '19.9',
        'required'              => true, // If false, the plugin is only 'recommended' instead of required
    ),
);

    // Change this to your theme text domain, used for internationalising strings

$config = array(
        'domain'            => basename(get_template_directory()),           // Text domain - likely want to be the same as your theme.
        'default_path'      => '',                           // Default absolute path to pre-packaged plugins
        'parent_menu_slug'  => 'themes.php',         // Default parent menu slug
        'parent_url_slug'   => 'themes.php',         // Default parent URL slug
        'menu'              => 'install-required-plugins',   // Menu slug
        'has_notices'       => true,                         // Show admin notices or not
        'is_automatic'      => true,            // Automatically activate plugins after installation or not
        'message'           => '',               // Message to output right before the plugins table
        'strings'           => array(
            'page_title'                                => __( 'Install Required Plugins', $theme_text_domain ),
            'menu_title'                                => __( 'Install Plugins', $theme_text_domain ),
            'installing'                                => __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
            'oops'                                      => __( 'Something went wrong with the plugin API.', $theme_text_domain ),
            'notice_can_install_required'               => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_install_recommended'            => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_install'                     => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
            'notice_can_activate_required'              => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_activate_recommended'           => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_activate'                    => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
            'notice_ask_to_update'                      => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_update'                      => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
            'install_link'                              => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                             => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
            'return'                                    => __( 'Return to Required Plugins Installer', $theme_text_domain ),
            'plugin_activated'                          => __( 'Plugin activated successfully.', $theme_text_domain ),
            'complete'                                  => __( 'All plugins installed and activated successfully. %s', $theme_text_domain ) // %1$s = dashboard link
            )
);

tgmpa( $plugins, $config );

}

?>