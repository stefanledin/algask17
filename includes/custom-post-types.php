<?php
function create_post_types () {
	// Matcher
    register_post_type('Matcher',
        array(
            'labels' => array(
                'name' => __('Matcher'),
                'singular_name' => __('match')
            ),
            'public' => true,
            'has_archive' => false,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-calendar-alt',
            'supports' => array(
                'title'
            ),
            'taxonomies' => array('serie'),
        )
    );
    $labels_serie = array(
        'name' => _x( 'Serie', 'taxonomy general name' ),
        'singular_name' => _x( 'Serie', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Serie' ),
        'all_items' => __( 'All Serier' ),
        'parent_item' => __( 'Parent Serie' ),
        'parent_item_colon' => __( 'Parent Serie:' ),
        'edit_item' => __( 'Edit Serie' ), 
        'update_item' => __( 'Update Serie' ),
        'add_new_item' => __( 'Add New Serie' ),
        'new_item_name' => __( 'New Serie Name' ),
        'menu_name' => __( 'Serie' ),
    );  

    register_taxonomy('serie',array('matcher'), array(
        'hierarchical' => true,
        'labels' => $labels_serie,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'serie' ),
    ));

    $labels_sasong = array(
        'name' => _x( 'Säsong', 'taxonomy general name' ),
        'singular_name' => _x( 'Säsong', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Säsong' ),
        'all_items' => __( 'All Säsongr' ),
        'parent_item' => __( 'Parent Säsong' ),
        'parent_item_colon' => __( 'Parent Säsong:' ),
        'edit_item' => __( 'Edit Säsong' ), 
        'update_item' => __( 'Update Säsong' ),
        'add_new_item' => __( 'Add New Säsong' ),
        'new_item_name' => __( 'New Säsong Name' ),
        'menu_name' => __( 'Säsong' ),
    );  

    register_taxonomy('sasong',array('matcher'), array(
        'hierarchical' => true,
        'labels' => $labels_sasong,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'sasong' ),
    ));
    
    // Post type spelare
    register_post_type('Spelare',
        array(
            'labels' => array(
                'name' => __('Spelare'),
                'singular_name' => __('Spelare')
            ),
            'public' => true,
            'has_archive' => false,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-shield',
            'supports' => array(
                'title','thumbnail','custom-fields'
            )
        )
    );
    $labels_positioner = array(
        'name' => _x( 'Position', 'taxonomy general name' ),
        'singular_name' => _x( 'Position', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Position' ),
        'all_items' => __( 'All Positionr' ),
        'parent_item' => __( 'Parent Position' ),
        'parent_item_colon' => __( 'Parent Position:' ),
        'edit_item' => __( 'Edit Position' ), 
        'update_item' => __( 'Update Position' ),
        'add_new_item' => __( 'Add New Position' ),
        'new_item_name' => __( 'New Position Name' ),
        'menu_name' => __( 'Position' ),
    );  

    register_taxonomy('position',array('spelare'), array(
        'hierarchical' => true,
        'labels' => $labels_positioner,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'position' ),
    ));

    register_taxonomy( 'lag', array('spelare', 'matcher'), array(
        'labels' => array('name' => 'Lag', 'singular_name' => 'lag'),
        'hierarchical' => true,
    ) );

    // Post type sponsorer
    register_post_type('Sponsorer',
        array(
            'labels' => array(
                'name' => __('Sponsorer'),
                'singular_name' => __('Sponsor')
            ),
            'public' => true,
            'has_archive' => false,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-heart',
            'supports' => array(
                'title','thumbnail'
            )
        )
    );

    // Blocks
    register_post_type('blocks', array(
        'label' => 'Blocks',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 5,
        'rewrite' => array(
            'slug' => ''
        ),
        'query_var' => true,
        'exclude_from_search' => false,
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'author',
            'page-attributes'
        ),
        'labels' => array (
            'name' => 'Blocks',
            'singular_name' => 'Block',
            'menu_name' => 'Blocks',
            'add_new' => 'Add Block',
            'add_new_item' => 'Add New Block',
            'edit' => 'Edit',
            'edit_item' => 'Edit Block',
            'new_item' => 'New Block',
            'view' => 'View Block',
            'view_item' => 'View Block',
            'search_items' => 'Search Blocks',
            'not_found' => 'No Blocks Found',
            'not_found_in_trash' => 'No Blocks Found in Trash',
            'parent' => 'Parent Block',
            ),
        )
    );

    register_post_type( 'jokernummer', array(
        'label' => 'Jokernummer',
        'public' => true,
        'menu_icon' => 'dashicons-tickets-alt',
        'supports' => array('title')
    ) );
}
add_action( 'init', 'create_post_types' );