<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Dynamic Custom CSS From Theme
function custom_login_css_theme() {
	echo '<link rel="stylesheet" id="login-fonts-css"  href="' . get_field('login_font_import_url','option'). '" media="all" />';
	echo '<style>';
	echo 'body,html {';
	echo '--site-global-color-primary: ' . get_field('login_colour_primary','option') . ';';
	if( have_rows('login_buttons','option') ) {
		while( have_rows('login_buttons','option') ) { the_row();
			echo '--site-global-color-primary-button-background: ' . get_sub_field('login_colour_button_background','option') . ';';
			echo '--site-global-color-primary-button-text: ' . get_sub_field('login_colour_button_text','option') . ';';
		} // while
	} // if
	if( have_rows('login_buttons_hover','option') ) {
		while( have_rows('login_buttons_hover','option') ) { the_row();
			echo '--site-global-color-primary-button-background-hover: ' . get_sub_field('login_colour_button_background_hover','option') . ';';
			echo '--site-global-color-primary-button-text-hover: ' . get_sub_field('login_colour_button_text_hover','option') . ';';
		} // while
	} // if
	if( have_rows('login_links','option') ) {
		while( have_rows('login_links','option') ) { the_row();
			echo '--site-global-color-links: ' . get_sub_field('login_colour_links','option') . ';';
			echo '--site-global-color-links-hover: ' . get_sub_field('login_colour_links_hover','option') . ';';
		} // while
	} // if
	echo '}';
	echo 'body,html {';
	echo 'background: var(--site-global-color-primary) url("' . get_field('login_background_image','option')['url']  . '") no-repeat center top;';
	echo '}';
	echo '.login h1 a {';
	echo 'background-image: url("' . get_field('login_logo','option')['url']  . '");';
	echo '}';
	echo '</style>';
}

// Enqueue Custom CSS File
function custom_login_css() {
	wp_enqueue_style( 'custom_login_css', get_stylesheet_directory_uri().'/login/login-styles.css', false );
}

// Change Logo Link From wordpress.org To Site Home URL
function custom_login_url() {  return home_url(); }

// Change Alt Text For Logo To Site Name
function custom_login_title( $headertext ) {
  $headertext = esc_html__( get_option('blogname') );
  return $headertext;
}

// Replace Howdy Text
function replace_howdy( $wp_admin_bar ) {
	$my_account=$wp_admin_bar->get_node('my-account');
	$newtitle = str_replace( 'Howdy,', 'Logged in as', $my_account->title );
	$wp_admin_bar->add_node( array(
		'id' => 'my-account',
		'title' => $newtitle,
	) );
}

// Filters & Actions
add_action('login_enqueue_scripts', 'custom_login_css', 10 );
add_filter('login_headerurl', 'custom_login_url');
add_filter('login_headertext', 'custom_login_title');
add_action('login_head', 'custom_login_css_theme');
add_action('login_head', 'custom_login_css');
add_filter( 'admin_bar_menu', 'replace_howdy',25 );
