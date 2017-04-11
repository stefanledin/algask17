<?php
/*
Template name: Arkiv
 */
get_header();
?>

<?php get_template_part( 'partials/section', 'breadcrumbs' ); ?>

    <main class="section-wrapper left main-column has-shadow">
        <div class="inner">
            <h1><?php the_title();?></h1>
        </div>
    </main>

    <aside class="sidebar right section-wrapper">
        <div class="widget widget--white has-shadow">
            <div class="widget__inner">
                <h3 class="widget__title">Arkiv</h3>
                <?php wp_get_archives(); ?>
            </div>
        </div>
        <div class="widget widget--white has-shadow">
            <div class="widget__inner">
                <h3 class="widget__title">Kategorier</h3>
                <?php wp_list_categories( array('title_li' => '') ); ?>
            </div>
        </div>
    </aside>

<?php get_footer(); ?>