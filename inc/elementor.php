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

// Add Back Default Edit Link In Page/Post List Rows
add_filter( 'page_row_actions', 'cm2_add_back_default_edit_link', 10, 2 );
//add_filter( 'post_row_actions', 'cm2_add_back_default_edit_link', 10, 2 );
function cm2_add_back_default_edit_link( $actions, $post ) {

  $elementor_edit_url = admin_url( 'post.php?post=' . $post->ID . '&action=edit' );

  if ( get_post_meta( $post->ID, '_elementor_edit_mode', true ) == 'builder' ) {
    $actions['edit'] =
        sprintf( '<a href="%1$s">%2$s</a>',
            esc_url( $elementor_edit_url ),
            esc_html( __( 'Default WordPress Editor', 'elementor' ) )
        );
  } // if

  return $actions;

}

// Remove "Edit with Elementor" Link
add_filter( 'page_row_actions', 'cm2_remove_default_edit_with_elementor', 99, 2 );
add_filter( 'post_row_actions', 'cm2_remove_default_edit_with_elementor', 99, 2 );
function cm2_remove_default_edit_with_elementor( $actions, $post ) {

  if ( get_post_meta( $post->ID, '_elementor_edit_mode', true ) == 'builder' ) {
    unset( $actions['edit_with_elementor'] );
  } // if
  return $actions;

}