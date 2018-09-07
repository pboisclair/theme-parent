<?php 
// OK v5.7 


function add_basic_buttons($buttons) {
  $buttons[] = 'pastetext';
  $buttons[] = 'pasteword';
  	
  return $buttons;
}
add_filter("teeny_mce_buttons", "add_basic_buttons", 99999);

function add_toolbar_wysiwyg($toolbars) {
	$editor_id = 'acf_settings';
	
	$toolbars['Minimal'] = array();
   	$toolbars['Minimal'][1] = array('bold', 'italic', 'bullist', 'numlist', 'pastetext', 'pasteword', 'undo', 'redo', 'link', 'unlink','html','source');
	
	$toolbars['With table'] = array();
   	$toolbars['With table'][1] = array('bold', 'italic', 'bullist', 'numlist', 'pastetext', 'pasteword', 'undo', 'redo', 'link', 'unlink','html','source','tablecontrols');
	
	return $toolbars;
}
add_filter("acf/fields/wysiwyg/toolbars",  "add_toolbar_wysiwyg");
?>