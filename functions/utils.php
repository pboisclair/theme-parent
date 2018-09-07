<?php
/* Retourne le ID d'un post/fichier à partir du URL */
function drfw_postID_by_url($url) {
	global $wpdb;
	$id = url_to_postid($url);
	if($id==0) {
		$fileupload_url = get_option('fileupload_url',null).'/';
		if (strpos($url,$fileupload_url)!== false) {
			$url = str_replace($fileupload_url,'',$url);
			$id = $wpdb->get_var($wpdb->prepare("SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $url));
		}
	}
	return $id;
}

/* Enlève l'attribut Title dans les images*/
function remove_image_attributes( $attr ) {
	unset($attr['title']);
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'remove_image_attributes' );
			
/* Shortcode pour générer un Sitemap */
function be_sitemap($atts) {
	extract( shortcode_atts( array(
		'exclude_parent' => '',
	), $atts ) );
	
	// Convert string list in array
	$exclude_parent = explode(',',$exclude_parent);
	
	$sitemap_li = wp_list_pages(
	  array(
	    'title_li' => '',
		'echo' => 0,
		'exclude'=>excludeChildPages($exclude_parent),
	  )
	);
	
	$sitemap = '<ul class="sitemap-list">'.$sitemap_li.'</ul>';
	return $sitemap;
}
add_shortcode('sitemap', 'be_sitemap');



function get_topmost_parent_id($post_id){
  $parent_id = get_post($post_id)->post_parent;
  if($parent_id == 0){
    return $post_id;
  }else{
    return get_topmost_parent_id($parent_id);
  }
}

function get_parent_id($post_id){
  $parent_id = get_post($post_id)->post_parent;
  if($parent_id == 0){
    return $post_id;
  }else{
    return get_parent_id($parent_id);
  }
}

function get_parent_title($post_id){
  $parent_id = get_post($post_id)->post_parent;
  if($parent_id == 0){
    return get_the_title($post_id);
  }else{
    return get_the_title($parent_id);
  }
}

function get_topmost_parent_title($post_id){
  $parent_id = get_post($post_id)->post_parent;
  if($parent_id == 0){
    return get_the_title($post_id);
  }else{
    return get_topmost_parent_title($parent_id);
  }
}

?>