<?php
/*
Ajoute un champ de saisie pour les titres soit différents du nom du url
*/

/**
 * Adds a meta box to the post editing screen
 */
function cssco_alternate_title() {
	add_meta_box( 'cssco_meta', __( 'Titre de page personnalisé', 'codesource' ), 'cssco_meta_callback', 'page', 'advanced', 'high' );
}
add_action( 'add_meta_boxes', 'cssco_alternate_title' );

/**
 * Outputs the content of the meta box
 */
function cssco_meta_callback( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'cssco_nonce' );
	$cssco_stored_meta = get_post_meta( $post->ID );
	?>

	<p>
		<label for="cssco-page-title" class="cssco-row-title"><?php _e( 'Titre', 'codesource' )?></label>
		<input type="text" name="cssco-page-title" id="csscopage-title" class="widefat" value="<?php if ( isset ( $cssco_stored_meta['cssco-page-title'] ) ) echo $cssco_stored_meta['cssco-page-title'][0]; ?>" />
	</p> 

	<?php
}

add_action('edit_form_after_title',  'move_metabox_after_title' );
 
function move_metabox_after_title () {
    global $post, $wp_meta_boxes;
 
    do_meta_boxes( get_current_screen(), 'advanced', $post );
    unset( $wp_meta_boxes[get_post_type( $post )]['advanced'] );
}


/**
 * Saves the custom meta input
 */
function cssco_meta_save( $post_id ) {
 
	// Checks save status
	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce = ( isset( $_POST[ 'cssco_nonce' ] ) && wp_verify_nonce( $_POST[ 'cssco_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
	// Exits script depending on save status
	if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
		return;
	}
 
	// Checks for input and sanitizes/saves if needed
	if( isset( $_POST[ 'cssco-page-title' ] ) ) {
		update_post_meta( $post_id, 'cssco-page-title', ( $_POST[ 'cssco-page-title' ] ) );
	}

}
add_action( 'save_post', 'cssco_meta_save' );


/**
 * Display alternate page title
 */
function cssco_get_the_title() {
	$get_meta = get_post_meta( get_the_ID(), 'cssco-page-title', true );
 
	$title = ($get_meta) ? $get_meta : get_the_title();
	return $title;
}