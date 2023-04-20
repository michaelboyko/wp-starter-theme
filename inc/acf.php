<?php
/**
 * ACF
 *
 * @package WP Gulp Child Theme
 */

// Theme Options

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Contact Info',
		'menu_title'	=> 'Contact Info',
		'menu_slug' 	=> 'contact-info-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Login Page Settings',
		'menu_title'	=> 'Login Page Settings',
		'menu_slug' 	=> 'login-page-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

}