<?php 
/*
Template name: Startsida
 */
get_header(); ?>

<main class="main-column left section-wrapper">
    <div class="article-list has-shadow">
        <?php
        $latest_news = get_posts( array(
            'posts_per_page' => 5
        ) );
        foreach ( $latest_news as $i => $post ) : setup_postdata( $post );
        ?>
            <article class="article-list__article <?php echo ( $i == 0 ) ? 'article-list__article--latest' : '';?>  ">
                <div class="inner">
                    <header class="article-list__article__header">
                        <time><?php the_time( 'Y-m-d H:i' ); ?></time>
                        <h1 class="article-list__article__title h2">
                            <a href="<?php the_permalink();?>"><?php the_title();?></a>
                        </h1>
                    </header>
                    <?php if ( $i == 0 ) : ?>
                        <?php the_post_thumbnail( ); ?>
                        <?php the_content(); ?>
                    <?php endif; ?>
                </div>
            </article>
            <hr class="article-list__separator">
        <?php wp_reset_postdata(); endforeach; ?>
        <div class="inner">
            <a href="#" class="button">Nyhetsarkiv</a>
        </div>
    </div>
</main>
<aside class="sidebar right section-wrapper">
    <div class="widget widget--light-blue has-shadow">
        <div class="widget__inner">
            <h3 class="widget__title">Årsmöte</h3>
            <p>Onsdagen den 8 mars välkomnar vi alla medlemmar till klubbens årsmöte. Det hålls klockan 18.30 på Älgvallen. Välkomna!</p>
            <a href="#" class="widget__cta button">Läs mer</a>
        </div>
    </div>
    <div class="widget widget--is-image has-shadow">
        <img class="widget__image" src="http://placehold.it/1440x900">
    </div>
    <div class="widget widget--grey has-shadow">
        <div class="widget__inner">
            <h3 class="widget__title">Jubileumsboken</h3>
            <img class="widget__image" src="http://placehold.it/1440x900">
            <a href="#" class="widget__cta button">Köp här</a>
        </div>
    </div>
</aside>

<?php get_footer(); ?>