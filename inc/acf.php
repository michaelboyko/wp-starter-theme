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
		'page_title' 	=> 'Global Colours & Fonts',
		'menu_title'	=> 'Global Colours & Fonts',
		'menu_slug' 	=> 'global-styles-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

/*
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Settings',
		'menu_title'	=> 'Settings',
		'parent_slug'	=> 'theme-general-settings', // Must be parent page slug
	));
*/

	// Global Colours & Fonts

	add_action('wp_head', 'global_site_styles', 100);
	add_action('login_head', 'global_site_styles', 100);

	function global_site_styles() {

		echo '<style>';
		echo 'body,html {';

		// Global Colours
		echo '--site-global-color-primary: ' . get_field('global_colour_primary','option') . ';';
		echo '--site-global-color-secondary: ' . get_field('global_colour_secondary','option') . ';';
		echo '--site-global-color-text: ' . get_field('global_colour_text','option') . ';';
		echo '--site-global-color-accent: ' . get_field('global_colour_accent','option') . ';';
		echo '--site-global-color-scrollbars: ' . get_field('global_colour_scrollbars','option') . ';';
		echo '--site-global-color-text-highlight: ' . get_field('global_colour_text_highlight','option') . ';';
		echo '--site-global-color-page-background: ' . get_field('global_colour_page_background','option') . ';';
		echo '--site-global-color-links: ' . get_field('global_colour_links','option') . ';';
		echo '--site-global-color-links-hover: ' . get_field('global_colour_links_hover','option') . ';';
		echo '--site-global-color-primary-button-background: ' . get_field('global_colour_primary_button_background','option') . ';';
		echo '--site-global-color-primary-button-background-hover: ' . get_field('global_colour_primary_button_background_hover','option') . ';';
		echo '--site-global-color-primary-button-text: ' . get_field('global_colour_primary_button_text','option') . ';';
		echo '--site-global-color-primary-button-text-hover: ' . get_field('global_colour_primary_button_text_hover','option') . ';';
		echo '--site-global-color-form-field-background: ' . get_field('global_colour_form_field_background','option') . ';';
		echo '--site-global-color-form-field-text: ' . get_field('global_colour_form_field_text','option') . ';';
		echo '--site-global-color-form-field-border: ' . get_field('global_colour_form_field_border','option') . ';';
		if ( have_rows('global_colour','option') ) {
			while( have_rows('global_colour','option') ) { the_row();
				echo '--site-global-color-' . slugify(get_sub_field('global_colour_name','option')) . ': ' . get_sub_field('global_colour_value','option') . ';';
			} // while
		} // if

		// Global Fonts
		echo '--site-global-font-primary: "' . get_field('global_font_primary','option') . '";';
		echo '--site-global-font-secondary: "' . get_field('global_font_secondary','option') . '";';
		echo '--site-global-font-headings: "' . get_field('global_font_headings','option') . '";';
		echo '--site-global-font-buttons: "' . get_field('global_font_buttons','option') . '";';

		// Global Layout Widths
		echo '--site-global-layout-width-main: ' . get_field('layout_max_width_main','option') . 'px;';
		echo '--site-global-layout-width-header: ' . get_field('layout_max_width_header','option') . 'px;';
		echo '--site-global-layout-width-footer: ' . get_field('layout_max_width_footer','option') . 'px;';

		echo '} </style>';

	}

	function slugify($text, string $divider = '-')
	{
	  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
	  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
	  $text = preg_replace('~[^-\w]+~', '', $text);
	  $text = trim($text, $divider);
	  $text = preg_replace('~-+~', $divider, $text);
	  $text = strtolower($text);
	
	  if (empty($text)) {
		return 'n-a';
	  } // if
	
	  return $text;
	}	

}