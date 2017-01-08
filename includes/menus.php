<?php
register_nav_menus(
    array(
        'secondary' => 'Sekundärmeny',
        'main_menu' => 'Huvudmeny',
    )
);

function main_menu_items() {
    return get_menu_items( 'Huvudmeny ');
}
function get_menu_items( $menu_name ) {
    return wp_get_nav_menu_items( wp_get_nav_menu_object( $menu_name ), array(
        'post_parent' => 0,
        'posts_per_page' => -1
    ) );
}

function child_pages( $ID ) {
    return get_posts( array(
        'post_parent' => $ID,
        'post_type' => 'page',
        'posts_per_page' => -1
    ) );
}