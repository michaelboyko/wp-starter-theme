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
      <!-- Start Google Analytics Script -->
      <!-- Global Site Tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-XXXXX"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments)};
        gtag('js', new Date());

        gtag('config', 'G-XXXXX'); // Added Google Analytics 4 ID
      </script>
      <!-- End Google Analytics Script -->

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