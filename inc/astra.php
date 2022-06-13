<?php
/**
 * Astra Hooks
 *
 * @package WP Gulp Child Theme
 */

/**
 * Update the count of elements in HF Builder.
 *
 * @param array $elements array of elements having key as slug and value as count.
 * @return array $elements
 */
function astra_builder_elements_count( $elements ) {
    $elements['header-button']       = 5;
    $elements['footer-button']       = 5;
    $elements['header-html']         = 5;
    $elements['footer-html']         = 5;
    $elements['header-widget']       = 5;
    $elements['footer-widget']       = 5;
    $elements['header-social-icons'] = 5;
    $elements['footer-social-icons'] = 5;
    return $elements;
}
add_filter( 'astra_builder_elements_count', 'astra_builder_elements_count', 10 );

// Blog Title
add_action( 'astra_entry_top','astra_single_post_title' );
function astra_single_post_title () {
    if (in_category('blog') && is_single()) {
        echo '<div class="blog-title">';
        echo '<div class="subtitle elementor-widget"><p>Blog post</p></div>';
        echo '<h1>' . get_the_title() . '</h1>';
        echo '</div>';
    } // if
}

// Breakpoints
add_filter( 'astra_tablet_breakpoint', function() {
    return 1000;
});

add_filter( 'astra_mobile_breakpoint', function() {
    return 500;
});