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

// Breakpoints
add_filter( 'astra_tablet_breakpoint', function() {
    return 1000;
});

add_filter( 'astra_mobile_breakpoint', function() {
    return 500;
});