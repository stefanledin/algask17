<?php get_header(); ?>
    
    <?php get_template_part( 'partials/secion', 'breadcrumbs' ); ?>
    
    <nav class="sidebar sub-menu left section-wrapper has-shadow">
        <?php $parent_id = get_page_parent_id( $post ); ?>
        <a href="<?php echo get_permalink( $parent_id );?>" class="sub-menu__item sub-menu__item--header button button--block button--dark"><?php echo get_the_title( $parent_id );?></a>
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