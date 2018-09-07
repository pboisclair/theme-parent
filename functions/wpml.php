<?php 

define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
define('ICL_DONT_LOAD_NAVIGATION_CSS', true);
define('ICL_DONT_LOAD_LANGUAGES_JS', true);

remove_action( 'wp_head', array($sitepress, 'meta_generator_tag' ) );

// Get the title of a page / WPML 
function icl_get_the_title($post_id) {
	return get_the_title(icl_object_id($post_id, 'page', false));
}
?>