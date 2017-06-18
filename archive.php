<?php
/*
Template name: Arkiv
 */
get_header();
?>

<?php get_template_part( 'partials/section', 'breadcrumbs' ); ?>

    <main class="left main-column has-shadow">
        <div class="article-list">
            <header class="article-list__header">
                <div class="inner">
                    <h1><?php do_action( 'print_archive_title' ); ?></h1>
                </div>
            </header>
            <hr class="article-list__separator">
            <?php
            $posts = new WP_Query( apply_filters( 'edit_archive_page_query', 
                array(
                    'posts_per_page' => 10,
                    'nopaging' => false,
                    'paged' => get_query_var( 'paged' )
                ) 
            ) );
            ?>
            <?php if ( $posts->have_posts() ) : foreach ( $posts->get_posts() as $post ) : setup_postdata( $post ); ?>
                <article class="article-list__article">
                    <div class="inner">
                        <header class="article-list__article__header">
                            <time><?php the_time('Y-m-d H:i');?></time>
                            <h1 class="article-list__article__title h2">
                                <a href="<?php the_permalink();?>"><?php the_title();?></a>
                            </h1>
                        </header>
                    </div>
                </article>
                <hr class="article-list__separator">
            <?php wp_reset_postdata(); endforeach; endif; ?>
            <nav class="pagination">
                <div class="inner">
                    <?php echo paginate_links( array( 'total' => $posts->max_num_pages ) ); ?>
                </div>
            </nav>
        </div>
    </main>

    <aside class="sidebar right">

        <div class="widget widget--white has-shadow">
            <div class="widget__inner">
                <h3 class="widget__title">Sök</h3>
                <form class="search-form" action="<?php the_permalink();?>" method="GET">
                    <input type="text" name="search" class="search-form__field" placeholder="Sök" <?php if ( isset($_GET['search']) ) : ?> value="<?php echo $_GET['search'];?>" <?php endif;?>>
                    <input type="submit" class="search-form__submit button" value="Sök">
                </form>
            </div>
        </div>
    
        <div class="widget widget--white has-shadow">
            <div class="widget__inner">
                <h3 class="widget__title">Kategorier</h3>
                <ul><?php wp_list_categories( array('title_li' => '', 'exclude' => '1,7,25,26,27,28,29' ) ); ?></ul>
            </div>
        </div>

        <div class="widget widget--white has-shadow">
            <div class="widget__inner">
                <h3 class="widget__title">Arkiv</h3>
                <ul><?php wp_get_archives(); ?></ul>
            </div>
        </div>
    
    </aside>

<?php get_footer(); ?>