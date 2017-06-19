<?php
/**
 * Modifierar queryn på nyhetsarkivsidan
 * beroende på om det är sökresultat/kategori/datum som visas.
 */
add_filter( 'edit_archive_page_query', function( $archive_query ) {
    global $wp_query;
    if ( isset($_GET['search']) ) {
        $archive_query['s'] = $_GET['search'];
    }
    if ( is_date() ) {
        $archive_query['date_query'] = array(
            'year' => get_query_var('year'),
            'month' => get_query_var('monthnum')
        );
    }
    if ( is_category() ) {
        $archive_query['category_name'] = get_query_var('category_name');
    }
    return $archive_query;
} );

/**
 * Lägg till extra classer på body
 */
function add_body_classes( $classes ) {
    return $classes;
}
add_filter( 'body_class', 'add_body_classes' );

/**
 * Filter för att ta bort Critical CSS på undersidor
 */
function defer_home() {
    if ( is_home() || is_front_page() ) {
        return true;
    }
    return false;
}
add_filter( 'autoptimize_filter_css_defer', 'defer_home', 10, 0 );