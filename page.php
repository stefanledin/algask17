<?php get_header(); ?>
    
    <section class="breadcrumbs">
        <ul>
            <?php
            if ( function_exists('bcn_display_list') ) {
                bcn_display_list();
            }
            ?>
        </ul>
    </section>
    
    <nav class="sidebar sub-menu left section-wrapper has-shadow">
        <ul>
            <?php $parent_id = get_page_parent_id( $post ); ?>
            <li class="sub-menu__item sub-menu__item--header">
                <a href="<?php echo get_permalink( $parent_id );?>" class="button button--dark"><?php echo get_the_title( $parent_id );?></a>
            </li>
            <?php if ( $child_pages = child_pages( $parent_id ) ) : ?>
                <?php foreach ( $child_pages as $sub_menu_item ) : ?>
                    <li class="sub-menu__item">
                        <a class="button button--white" href="<?php echo get_permalink( $sub_menu_item->ID );?>">
                            <?php echo $sub_menu_item->post_title;?>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
        <?php
        echo get_sub_menu( $parent_id );
        ?>
    </nav>

    <main class="main-column right section-wrapper has-shadow">
        <div class="inner">
            <h1><?php the_title();?></h1>
            <?php the_post(); the_content(); ?>
        </div>
    </main>
<?php get_footer(); ?>