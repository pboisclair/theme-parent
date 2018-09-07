<?php

if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }

/* Hide login error messages*/
add_filter('login_errors',create_function('$a', "return null;"));

/* Enève le numéro de version dans le HEAD (meta et RSS) */
function my_remove_version_info() {
     return '';
}
add_filter('the_generator', 'my_remove_version_info');

// remove wp version param from any enqueued scripts
function vc_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );

/*Disable Non-admins from Seeing the WP Version Update Notification*/
function hide_update_notice() {
	if ( !current_user_can( 'edit_users' ) ) :
	remove_action( 'admin_notices', 'update_nag', 3 );
	endif;
}
add_action( 'admin_notices', 'hide_update_notice', 1 );

/*How to Hide the WordPress Upgrade Message in the Dashboard*/
add_action('admin_menu','wphidenag');
function wphidenag() {
remove_action( 'admin_notices', 'update_nag', 3 );
}

// Remove Wondows Live Writer
remove_action( 'wp_head', 'wlwmanifest_link');
add_filter('xmlrpc_enabled', '__return_false');
remove_action('wp_head', 'rsd_link');

?>