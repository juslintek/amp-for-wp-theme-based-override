<?php

function custom_is_plugin_active( $plugin ) {
	return in_array( $plugin, (array) get_option( 'active_plugins', array() ) );
}

if ( custom_is_plugin_active( 'accelerated-mobile-pages/accelerated-moblie-pages.php' ) ) {
	require_once trailingslashit( get_stylesheet_directory() ) . 'amp/loader.php';
}