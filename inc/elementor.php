<?php
/**
 * Elementor Overrides
 *
 * @package WP Gulp Child Theme
 */

// Remove Google Fonts
add_filter( 'elementor/frontend/print_google_fonts', '__return_false' );

// Remove Font Awesome
add_action( 'elementor/frontend/after_register_styles',function() {
	foreach( [ 'solid', 'regular', 'brands' ] as $style ) {
		wp_deregister_style( 'elementor-icons-fa-' . $style );
	}
}, 20 );


// Remove Eicons on frontend only
add_action( 'elementor/frontend/after_enqueue_styles', 'js_dequeue_eicons' );

function js_dequeue_eicons() {

  // Don't remove it in the backend
  if ( is_admin() || current_user_can( 'manage_options' ) ) {
    return;
  }
  wp_dequeue_style( 'elementor-icons' );
}

// Make Elementor Default Editor
add_filter('get_edit_post_link', 'cm2_make_elementor_default_edit_link', 10, 3 );
function cm2_make_elementor_default_edit_link($link, $post_id, $context) {

  if ( is_admin() ) { 

    $screen = get_current_screen();
    if( !is_object($screen) )
        return;

    $post_types_for_elementor = array(
        'page',
        //'post',
        'e-landing-page',
        'elementor_library',
    );

    if ( in_array( $screen->post_type, $post_types_for_elementor ) && $context == 'display' && get_post_meta( $post_id, '_elementor_edit_mode', true ) == 'builder' ) {
        $elementor_editor_link = admin_url( 'post.php?post=' . $post_id . '&action=elementor' );
        return $elementor_editor_link;
    } else {
        return $link;
    } // if

  } // if

}

// Add back the default edit link in page and post list rows
add_filter( 'page_row_actions', 'cm2_add_back_default_edit_link', 10, 2 );
//add_filter( 'post_row_actions', 'cm2_add_back_default_edit_link', 10, 2 );
function cm2_add_back_default_edit_link( $actions, $post ) {

  $elementor_edit_url = admin_url( 'post.php?post=' . $post->ID . '&action=edit' );

  $actions['edit'] =
      sprintf( '<a href="%1$s">%2$s</a>',
          esc_url( $elementor_edit_url ),
          esc_html( __( 'Default WordPress Editor', 'elementor' ) )
      );

  return $actions;

}

// Remove "Edit with Elementor" link
add_filter( 'page_row_actions', 'cm2_remove_default_edit_with_elementor', 99, 2 );
add_filter( 'post_row_actions', 'cm2_remove_default_edit_with_elementor', 99, 2 );
function cm2_remove_default_edit_with_elementor( $actions, $post ) {

  unset( $actions['edit_with_elementor'] );
  return $actions;

}