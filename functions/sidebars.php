<?php

/*
FICHIER À CORTRIGER
*/

// This file is part of the Code Source Studio Theme for WordPress
// http://www.codesourcestudio.com
//
// Copyright (c) 2013 Code Source Studio. All rights reserved.
// http://www.codesourcestudio.com
//
// Released under the GPL license
// http://www.opensource.org/licenses/gpl-license.php
//
// **********************************************************************
// This program is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
// **********************************************************************s

if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }

if (function_exists('register_sidebar')) {
	register_sidebar(
		array(
			'name' => 'Primary Sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '<div class="clear"></div></div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		)
	);
	register_sidebar(
		array(
			'name' => 'Secondary Sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '<div class="clear"></div></div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		)
	);
}

if ( function_exists('register_sidebar') )
    register_sidebar();

?>