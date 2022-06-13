<?php
/**
 * Shortcodes
 *
 * @package WP Gulp Child Theme
 */

// Newsletter Signup Shortcode
function get_newsletter_signup_shortcode( $atts ) {

    $output = '<div class="newsletter-signup shortcode">
        <form class="mc-embedded-subscribe-form validate" action="https://cm2media.us14.list-manage.com/subscribe/post?u=0c55eba50f4b8f5ca0ac6140f&amp;id=cd71bf79fd"" method="post" name="mc-embedded-subscribe-form" target="_blank">
        <fieldset>
        <div class="newsletter-fields"><label>Email Address*</label><input class="email" name="EMAIL" required="" type="email" value="" /> <button class="button elementor-size-xl" name="subscribe" type="submit"><span class="newsletter-icon-right"><span>Sign Up</span></span></button></div></fieldset>
        <div class="company" style="position: absolute; left: -5000px;" aria-hidden="true"><input tabindex="-1" name="b_0c55eba50f4b8f5ca0ac6140f_cd71bf79fd" type="text" value="" /></div>
        </form>
    </div>';
	return $output;

}

add_shortcode( 'newsletter_signup', 'get_newsletter_signup_shortcode' );

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
                    $output = '<a href="tel:+' . get_tel_prot(get_field($atts['type'],'option'), false) . '">' . get_field($atts['type'],'option') . '</a>';
                    break;
                default:
                    $output = get_field($atts['type'],'option');
            } // switch
        } else {
            switch ($atts['type']) {
                case 'phone-icon':
                    $output = '<a href="tel:+' . get_tel_prot(get_field('phone','option'), false) . '">' . do_shortcode('[svg id="phone"]') . '</a>';
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
                $output = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"/></svg>';
                break;
            default:
                $output = '';
        } // switch
    } // if

    return $output;

}

add_shortcode( 'svg', 'get_svg_shortcode' );

// Elementor Button Shortcode
function get_elementor_button_shortcode( $atts ) {

    $output = '';

    if ($atts && $atts['label'] && $atts['link']) {
        $output .= '<div class="elementor-element elementor-widget elementor-widget-button">';
        $output .= '<div class="elementor-widget-container">';
        $output .= '<div class="elementor-button-wrapper">';
        $output .= '<a href="' . $atts['link'] . '" class="elementor-button-link elementor-button elementor-size-xl" role="button">';
        $output .= '<span class="elementor-button-text">' . $atts['label'] . '</span>';
        $output .= '</a>';
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</div>';
    } // if

    return $output;

}

add_shortcode( 'button', 'get_elementor_button_shortcode' );

// Fancy Menu Shortcode
function get_fancy_menu_shortcode( $atts ) {

    $output = '<div class="fancy-menu">';
    $output .= '<div class="fancy-menu-header">';
    $output .= '<div class="fancy-menu-header-logo">';
    $output .= '<a href="' . get_home_url() . '"><img src="/wp-content/uploads/2022/03/logo-header.png" alt="' . esc_attr( get_bloginfo( 'title' ) ) . '" /></a>';
    $output .= '</div>';
    $output .= '<div class="fancy-menu-header-close">';
    $output .= '<button><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z"/></svg></button>';
    $output .= '</div>';
    $output .= '</div>';
    $output .= '<div class="fancy-menu-content">';
    $output .= '<div class="fancy-menu-content-container">';
    $output .= '<div class="navigation">';
    $output .= wp_nav_menu( array('menu' => 'Main Menu', 'menu_id' => 'menu-header-main-menu', 'echo' => false ));
    $output .= '</div>';
    $output .= '<div class="company-info">';
    $output .= '<div class="centered-container">';
    $output .= '<div class="fancy-menu-address">';
    $output .= '<span class="address-item"><span class="address-col">' . do_shortcode('[svg id="map-marker"]') . '</span><span class="address-col">' . do_shortcode('[contact_info type="address"]') . ', ' . do_shortcode('[contact_info type="city"]') . ', ' . do_shortcode('[contact_info type="province"]') . '</span></span>';
    $output .= '</div>';
    $output .= '<div class="fancy-menu-phone">';
    $output .= '<span class="address-item"><span class="address-col">' . do_shortcode('[svg id="phone"]'). '</span><span class="address-col">' . do_shortcode('[contact_info type="phone"]') . '</span></span>';
    $output .= '</div>';
    $output .= '<div class="fancy-menu-social">';
    $output .= '<a href="https://www.facebook.com/isartiluxury/" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z"></path></svg></a>';
    $output .= '<a href="https://www.instagram.com/isartiluxury/?hl=en" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg></a>';
    $output .= '<a href="https://www.pinterest.ca/" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M204 6.5C101.4 6.5 0 74.9 0 185.6 0 256 39.6 296 63.6 296c9.9 0 15.6-27.6 15.6-35.4 0-9.3-23.7-29.1-23.7-67.8 0-80.4 61.2-137.4 140.4-137.4 68.1 0 118.5 38.7 118.5 109.8 0 53.1-21.3 152.7-90.3 152.7-24.9 0-46.2-18-46.2-43.8 0-37.8 26.4-74.4 26.4-113.4 0-66.2-93.9-54.2-93.9 25.8 0 16.8 2.1 35.4 9.6 50.7-13.8 59.4-42 147.9-42 209.1 0 18.9 2.7 37.5 4.5 56.4 3.4 3.8 1.7 3.4 6.9 1.5 50.4-69 48.6-82.5 71.4-172.8 12.3 23.4 44.1 36 69.3 36 106.2 0 153.9-103.5 153.9-196.8C384 71.3 298.2 6.5 204 6.5z"></path></svg></a>';
    $output .= '</div>';
    $output .= do_shortcode('[button label="Book A Fitting" link="/contact-us/"]');
    $output .= '</div>';
    $output .= '</div>';
    $output .= '</div>';
    $output .= '</div>';
    $output .= '</div>';

    return $output;

}

add_shortcode( 'fancy_menu', 'get_fancy_menu_shortcode' );

// Hours Shortcode
function get_hours_shortcode( $atts ) {

    if( have_rows('hours','option') ) {

        $output = '<div class="hours">';
        
        while( have_rows('hours','option') ) { the_row();
            $output .= '<div class="days">';
            $output .= get_sub_field('days') . ':';
            $output .= '</div>';
            $output .= '<div class="times">';
            $output .= get_sub_field('start_time') . ' - ' . get_sub_field('end_time');
            $output .= '</div>';
        } // while

        $output .= '</div>';

    } // if

    return $output;

}

add_shortcode( 'hours', 'get_hours_shortcode' );

// Modal Close Button
function get_modal_close_button_shortcode( $atts ) {

    $output = '<div class="modal-close-btn"><div class="modal-close-btn-container"><button><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z"></path></svg></button></div></div>';

    return $output;

}

add_shortcode( 'close_modal', 'get_modal_close_button_shortcode' );

// Testimonials
function get_testimonials_shortcode( $atts ) {

    $output = '';

    return $output;

}

add_shortcode( 'testimonials', 'get_testimonials_shortcode' );

// Blogs Social Media Excerpts Override
function blog_social_excerpt( $excerpt ){
    if (in_category('blogs')) {
        return do_shortcode('[addtoany url="' . get_the_permalink() . '" title="' . get_the_title() . '"]');
    } else {
        return $excerpt;
    } // if
}

add_filter( 'the_excerpt', 'blog_social_excerpt', 10, 1 );

// Blog Gallery Shortcode
function get_blog_gallery_shortcode( $atts ) {

    if (is_single() && class_exists('ACF')) {
        $images = get_field('blog_gallery');
        $output = '';
        if ($images) {
            $output .= '<div class="blog-gallery">';
            foreach( $images as $image ) {
                $output .= '<div class="blog-gallery-item">';
                $output .= '<a href="' . esc_url($image['url']) . '">';
                $output .= '<img src="' . esc_url($image['sizes']['blog-thumbnail-size']) . '" alt="' . esc_attr($image['alt']) . '" />';
                $output .= '</a>';
                $output .= '</div>';
            } // foreach
            $output .= '</div>';
        } // if
        return $output;
    } else {
        return '';
    } // if

}

add_shortcode( 'blog_gallery', 'get_blog_gallery_shortcode' );