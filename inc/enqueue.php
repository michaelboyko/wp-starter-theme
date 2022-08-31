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

/**
 * Define Constants
 */
define( 'ASTRA_CHILD_THEME_VERSION', '1.0.5' );


if ( ! function_exists( 'site_scripts' ) ) :
  function site_scripts() {

    // Animations
    wp_enqueue_script( 'aos-js', get_stylesheet_directory_uri() . '/assets/dist/js/aos.js', array(), '2.3.4', true );
    wp_enqueue_style( 'aos-css', get_stylesheet_directory_uri() . '/assets/dist/css/aos.css', array(),'2.3.4', 'all');

    // Theme Scripts
    wp_enqueue_style( 'child-theme-css', get_stylesheet_directory_uri() . '/style.min.css', array('astra-theme-css'), ASTRA_CHILD_THEME_VERSION, 'all' );
    wp_enqueue_script('custom-scripts', get_stylesheet_directory_uri() . '/assets/dist/js/custom.min.js', array('jquery'), ASTRA_CHILD_THEME_VERSION, true);

    // Google Fonts
    //wp_enqueue_style( 'site-google-fonts', 'https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500&display=swap', false );

  }

  add_action( 'wp_enqueue_scripts', 'site_scripts', 15 );
  add_action( 'login_enqueue_scripts', 'site_scripts', 10 );
endif;

function google_fonts() {
  echo '<link rel="stylesheet" id="site-google-fonts-css"  href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500&display=swap" media="all" />';
}

add_action('login_head', 'google_fonts');
add_action( 'wp_head', 'google_fonts', 1 );