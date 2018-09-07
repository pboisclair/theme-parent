<?php

// This file is part of the Code Source Studio Theme for WordPress
// http://www.codesourcestudio.com
//
// Copyright (c) 2018 Code Source Studio. All rights reserved.
// http://www.codesourcestudio.com
//
// Released under the GPL license
// http://www.opensource.org/licenses/gpl-license.php
//
// **********************************************************************
// This program is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
// **********************************************************************

if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }

//load_theme_textdomain('codesource');


define('CSSF_PATH', trailingslashit(TEMPLATEPATH));

//Active le JS pour ACF->YOAST
function load_yoast_acf_link() {
	wp_enqueue_script( 'acf_yoastseo', get_template_directory_uri() . '/js/acf_yoastseo.js', 'jquery' );
}

add_action( 'admin_init', 'load_yoast_acf_link' );

// Fonction de base
include_once(CSSF_PATH.'functions/init.php');

// Hook pour ACF (extension)
include_once(CSSF_PATH.'functions/acf_hook.php');

// Menu navigation généric
include_once(CSSF_PATH.'functions/admin_nav_menu.php');

// Ajoute des types de fichier dans le module média pour filtrer
include_once(CSSF_PATH.'functions/admin_mime_type.php');

// Fonctions utilitaires
include_once(CSSF_PATH.'functions/utils.php');
include_once(CSSF_PATH.'functions/utils-menu.php');

// WPML Config
if (class_exists('SitePress')) {	
	include_once(CSSF_PATH.'functions/wpml.php');
}

// Securité
include_once(CSSF_PATH.'functions/securite.php');

// Titre de page alternatif
include_once(CSSF_PATH.'functions/alternate-page-title.php');


?>