<?php

/**
 * Enqueue Google Analytics script
 *
 * @package WP Gulp Child Theme
 */

function add_google_analytics() {

  // Disabled for Admin users
  if ( !current_user_can( 'manage_options' ) ) {
    ?>

      <?php
        // Thank You Tracking
        if (get_field('thank-you-tracking')) {
      ?>
        
      <?php
        } // if
      ?>
    <?php
  }
}
add_action('wp_head', 'add_google_analytics');