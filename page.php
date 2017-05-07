<?php get_header(); ?>
    
    <?php get_template_part( 'partials/secion', 'breadcrumbs' ); ?>
    
    <?php get_sidebar(); ?>

    <main class="main-column right has-shadow">
        <div class="inner">
            <h1><?php the_title();?></h1>
            <?php the_post(); the_content(); ?>
        </div>
    </main>
<?php get_footer(); ?>