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

class ordbild_menu {

    function __construct() {

    }

}

function get_sub_menu( $parent_id ) {
    $child_pages = child_pages( $parent_id );
    if ( ! $child_pages ) return false;
    $html = '<ul>';
    foreach ( $child_pages as $index => $child_page ) {
        $html .= '<li class="sub-menu__item '.sub_menu_item_classes($child_page->ID).'">';
            $html .= '<a class="button button--white button--block" href="'.get_permalink( $child_page->ID ).'">'.$child_page->post_title.'</a>';
            if ( $child_page_children = child_pages( $child_page->ID ) ) {
                $html .= get_sub_menu( $child_page->ID );
            }
        $html .= '</li>';
    }
    $html .= '</ul>';
    return $html;
}

function menu_item_classes( $menu_item_object_id ) {
    return ( is_current_menu_item( $menu_item_object_id ) ) ? 'button' : 'button button--dark';
}

function sub_menu_item_classes( $page_id ) {
    return ( is_current_menu_item( $page_id ) ) ? 'current' : '';
}

function is_current_menu_item( $id ) {
    global $post;
    return (
        ( $id == $post->ID ) ||
        ( $id == $post->post_parent ) ||
        ( $id == end(get_post_ancestors( $post )))
    );
}