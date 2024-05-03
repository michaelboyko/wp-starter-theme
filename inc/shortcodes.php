<?php
/**
 * Shortcodes
 *
 * @package WP Gulp Child Theme
 */

// Contact Info Shortcode
function get_contact_info_shortcode( $atts ) {

    $output = '';

    if ($atts && $atts['type']) {
        if (get_field($atts['type'],'option')) {
            switch ($atts['type']) {
                case 'email':
                    $output = '<a href="mailto:' . get_field($atts['type'],'option') . '">' . get_field($atts['type'],'option') . '</a>';
                    break;
                case 'phone':
                    $output = '<a href="tel:+1' . get_tel_prot(get_field($atts['type'],'option'), false) . '">' . get_field($atts['type'],'option') . '</a>';
                    break;
                default:
                    $output = get_field($atts['type'],'option');
            } // switch
        } else {
            switch ($atts['type']) {
                case 'phone-icon':
                    $output = '<a href="tel:+1' . get_tel_prot(get_field('phone','option'), false) . '">' . do_shortcode('[svg id="phone"]') . '</a>';
                    break;
                case 'email-icon':
                    $output = '<a href="mailto:' . get_field('email','option') . '">' . do_shortcode('[svg id="email"]') . '</a>';
                    break;
                case 'map-icon':
                    $output = '<a href="/contact-us/">' . do_shortcode('[svg id="map-marker"]') . '</a>';
                    break;
                default:
                    $output = '';
            } // switch
        } // if
    } // if

    return $output;

}

function get_tel_prot($phone, $echo = true) {
	$phone = str_replace("-", "", $phone);
	$phone = str_replace("(", "", $phone);
	$phone = str_replace(")", "", $phone);
	$phone = str_replace(" ", "", $phone);
	$phone = str_replace(".", "", $phone);
	if ($echo == true) {
		echo $phone;
	} else {
		return $phone;
	} // if
} // get_tel_prot()

add_shortcode( 'contact_info', 'get_contact_info_shortcode' );

// Get SVG Shortcode
function get_svg_shortcode( $atts ) {

    if ($atts && $atts['id']) {
        switch ($atts['id']) {
            case 'map-marker':
                $output = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M192 96c-52.935 0-96 43.065-96 96s43.065 96 96 96 96-43.065 96-96-43.065-96-96-96zm0 160c-35.29 0-64-28.71-64-64s28.71-64 64-64 64 28.71 64 64-28.71 64-64 64zm0-256C85.961 0 0 85.961 0 192c0 77.413 26.97 99.031 172.268 309.67 9.534 13.772 29.929 13.774 39.465 0C357.03 291.031 384 269.413 384 192 384 85.961 298.039 0 192 0zm0 473.931C52.705 272.488 32 256.494 32 192c0-42.738 16.643-82.917 46.863-113.137S149.262 32 192 32s82.917 16.643 113.137 46.863S352 149.262 352 192c0 64.49-20.692 80.47-160 281.931z"></path></svg>';
                break;
            case 'email':
                $output = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M464 64H48C21.5 64 0 85.5 0 112v288c0 26.5 21.5 48 48 48h416c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zM48 96h416c8.8 0 16 7.2 16 16v41.4c-21.9 18.5-53.2 44-150.6 121.3-16.9 13.4-50.2 45.7-73.4 45.3-23.2.4-56.6-31.9-73.4-45.3C85.2 197.4 53.9 171.9 32 153.4V112c0-8.8 7.2-16 16-16zm416 320H48c-8.8 0-16-7.2-16-16V195c22.8 18.7 58.8 47.6 130.7 104.7 20.5 16.4 56.7 52.5 93.3 52.3 36.4.3 72.3-35.5 93.3-52.3 71.9-57.1 107.9-86 130.7-104.7v205c0 8.8-7.2 16-16 16z"></path></svg>';
                break;
            case 'phone':
                $output = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M192 416c0 17.7-14.3 32-32 32s-32-14.3-32-32 14.3-32 32-32 32 14.3 32 32zM320 48v416c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V48C0 21.5 21.5 0 48 0h224c26.5 0 48 21.5 48 48zm-32 0c0-8.8-7.2-16-16-16H48c-8.8 0-16 7.2-16 16v416c0 8.8 7.2 16 16 16h224c8.8 0 16-7.2 16-16V48z"></path></svg>';
                break;
            case 'right-chevron':
                $output = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"/></svg>';
                break;
            default:
                $output = '';
        } // switch
    } // if

    return $output;

}

add_shortcode( 'svg', 'get_svg_shortcode' );