<?php
/**
 * Child Theme functions and definitions
 *
 * @package WP Gulp Child
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// ACF
require_once( 'inc/acf.php');

// Astra Hooks
require_once( 'inc/astra.php');

// Add Google Analytics
require_once( 'inc/google-analytics.php');

// Auto NoIndex Dev Sites
require_once( 'inc/auto-noindex-dev-sites.php');

// Enqueue scripts and styles
require_once( 'inc/enqueue.php');

// Elementor changes
require_once( 'inc/elementor.php');

// Custom image sizes
require_once( 'inc/custom-image-sizes.php');

// Shortcodes
require_once( 'inc/shortcodes.php');

// Custom login page
require_once( 'inc/login.php');

// Required Plugins
require_once( 'inc/tgmpa.php' );