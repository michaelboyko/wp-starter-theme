<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue scripts
 *
 * @package WP Gulp Child Theme
 * @since 1.0.0
 */

if ( ! function_exists( 'site_scripts' ) ) {

  function site_scripts() {

    // Dynamically Get Theme Version Number From Stylesheet
    $theme = wp_get_theme();
    $version = $theme->get('Version');

    // Animations
    wp_enqueue_script( 'aos', get_stylesheet_directory_uri() . '/assets/dist/js/aos.js', array(), '2.3.4', true );
    wp_enqueue_style( 'aos', get_stylesheet_directory_uri() . '/assets/dist/css/aos.css', array(),'2.3.4', 'all');

    // Theme Scripts
    wp_enqueue_style( 'child-theme', get_stylesheet_directory_uri() . '/style.min.css', array('astra-theme-css'), $version, 'all' );
    wp_enqueue_script('custom-scripts', get_stylesheet_directory_uri() . '/assets/dist/js/custom.min.js', array('jquery'), $version, true);

  }

  add_action( 'wp_enqueue_scripts', 'site_scripts', 15 );
  add_action( 'login_enqueue_scripts', 'site_scripts', 10 );

} // if