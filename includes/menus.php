<?php
register_nav_menus(
    array(
        'secondary' => 'Sekundärmeny',
        'main_menu' => 'Huvudmeny',
    )
);

function main_menu_items() {
    return get_menu_items( 'Huvudmeny');
}
function secondary_menu_items() {
    return get_menu_items( 'Toppmeny' );
}
function get_menu_items( $menu_name ) {
    return wp_get_nav_menu_items( wp_get_nav_menu_object( $menu_name ), array(
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

function menu_item_classes( $menu_item ) {
    global $post;
    return ( 
        ($menu_item->object_id == $post->ID) || 
        ($menu_item->object_id == $post->post_parent) ||
        ($menu_item->object_id == end(get_post_ancestors( $post )))
        ) 
        ? 'main-menu__item main-menu__item--current' 
        : 'main-menu__item';
}

function sub_menu_item_classes( $page_id ) {
    global $post;
    return (
        ( $page_id == $post->ID ) ||
        ( $page_id == $post->post_parent ) ||
        ( $page_id == end(get_post_ancestors( $post )))
        )
        ? 'current'
        : '';
}
