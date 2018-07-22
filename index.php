<?php 
/*
Template name: Startsida
 */
get_header(); ?>

<main class="main-column left">
    <div class="article-list has-shadow">
        <?php
        $latest_news = get_posts( array(
            'posts_per_page' => 5,
            'rwp_settings' => array(
                'sizes' => array('thumbnail', 'size480', 'medium', 'size667', 'size768'),
                'attributes' => array(
                    'sizes' => '(min-width: 1070px) 768px, (min-width: 920px) 667px, (min-width: 783px) 568px, (min-width: 767px) 480px, (min-width: 735px) 768px, (min-width: 630px) 667px, (min-width: 540px) 568px, (min-width: 430px) 480px, 375px'
                )
            )
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
                        <?php the_content('Läs mer »'); ?>
                    <?php endif; ?>
                </div>
            </article>
            <hr class="article-list__separator">
        <?php wp_reset_postdata(); endforeach; ?>
        <div class="inner">
            <a href="<?php echo get_permalink_by_path('nyhetsarkiv');?>" class="button">Nyhetsarkiv</a>
        </div>
    </div>
</main>
<aside class="sidebar right">
    
    <?php 
    if ( have_rows('widgets') ) : while ( have_rows('widgets') ) : the_row();

        if ( get_sub_field('link_as') == 'widget' ) {
            echo '<a href="'.get_sub_field( get_sub_field('link_type') ).'">';
        }
        
        include 'partials/widget_' . get_sub_field('type') . '.php';
        
        if ( get_sub_field('link_as') == 'widget' ) {
            echo '</a>';
        }

    endwhile; endif; 
    ?>

    <div class="widget widget--white has-shadow">
        <div class="widget__inner">
            <a href="http://clk.tradedoubler.com/click?p=23365&a=2176386&g=20751670&EPI=7891&url=https://svenskaspel.se/svea/forening?id=7891"target="_blank"><img src="https://impse.tradedoubler.com/imp?type(img)g(20751670)a(2176386)" border=0></a>
        </div>
    </div>

</aside>

<?php get_footer(); ?>