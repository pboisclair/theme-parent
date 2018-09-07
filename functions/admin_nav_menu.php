<?php

if ( ! function_exists( 'cssf_setup' ) ) {
	function cssf_setup() {
		register_nav_menus(array(
			'main' => __( 'Navigation principal [main]', 'codesource' ),
			'secondary' => __( 'Navigation secondaire [secondary]', 'codesource' ),
			'side' => __('Navigation de section [side]','codesource'),
			'footer' => __( 'Navigation pied page [footer]', 'codesource' ),
			'widget' => __( 'Navigation colonne droite/gauche [widget]', 'codesource' )
		));
	}
}
add_action( 'init', 'cssf_setup' );

?>