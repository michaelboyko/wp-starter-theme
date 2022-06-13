<?php 

/**
 * Enqueue Header scripts
 *
 * @package WP Gulp Child Theme
 */

// NoIndex & NoFollow Dev Sites
function no_index_dev_sites() {
    if (strpos(esc_url( home_url( '/' ) ),'cloudwaysapps.com') !== false || strpos(esc_url( home_url( '/' ) ),'dev.cm2media.ca') !== false) {
        echo '<meta name="robots" content="noindex, nofollow" />';
    } // if
}
add_action( 'wp_head', 'no_index_dev_sites' );

?>