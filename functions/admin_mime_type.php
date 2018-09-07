<?php

function modify_post_mime_types( $post_mime_types ) {  
    // select the mime type, here: 'application/pdf'  
    // then we define an array with the label values  
    $post_mime_types['application/pdf'] = array( __( 'PDF' ), __( 'Manage PDF' ), _n_noop( 'PDF <span class="count">(%s)</span>', 'PDFs <span class="count">(%s)</span>' ) );  
    // then we return the $post_mime_types variable  
    return $post_mime_types;  
}  
// Add Filter Hook  
add_filter( 'post_mime_types', 'modify_post_mime_types' );  

// Added to extend allowed files types in Media upload
add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() ) {

// Add *.svg
$existing_mimes['svg'] = 'image/svg+xml';

return $existing_mimes;
}

?>