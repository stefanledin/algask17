<?php

/**
 * Skriver ut sidtiteln på nyhetsarkiv-sidan
 */
add_action( 'print_archive_title', function() {
    if ( isset($_GET['search']) ) {
        echo 'Sökresultat för: ' . $_GET['search'];
    } else {
        the_archive_title();
    }
    if ( $paged = get_query_var( 'paged' ) ) {
        echo ' - sida ' . $paged;
    }
} );

/**
 * Remove emojis
 */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );


/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function ob_start_setup() {
  /*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'ob_start_setup' );