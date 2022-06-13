<?php

/**
 * Enqueue Google Analytics script
 *
 * @package WP Gulp Child Theme
 */

function add_google_analytics() {

  // disabled for Admin users
  if ( !current_user_can( 'manage_options' ) ) {
    ?>
      <!-- Start Google Analytics Script -->
      <!-- Global Site Tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-XXXXX-Y"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments)};
        gtag('js', new Date());

        gtag('config', 'UA-XXXXX-Y'); // UA property
        // gtag('config', 'G-XXXXX'); // Added Google Analytics 4 ID
      </script>
      <!-- End Google Analytics Script -->
      <?php
        if (get_field('thank-you-tracking')) {
      ?>
        <!-- Global site tag (gtag.js) - Google Ads: 10880076786 --> <script async src="https://www.googletagmanager.com/gtag/js?id=AW-10880076786"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-10880076786'); </script><!-- Event snippet for Submit lead form conversion page --> <script> gtag('event', 'conversion', {'send_to': 'AW-10880076786/7hRECOvU97ADEPKXg8Qo'}); </script>
      <?php
        } // if
      ?>
    <?php
  }
}
add_action('wp_head', 'add_google_analytics');