<?php get_header();?>
    <?php the_post(); ?>
    <main class="wide-column section-wrapper has-shadow">
        <article class="article">
            <header class="article__header">
                <?php if ( has_post_thumbnail() ) : ?>
                    <figure class="article__featured-image-wrapper">
                        <?php
                        echo rwp_img( get_post_thumbnail_id(), array(
                            'attributes' => array(
                                'class' => 'article__featured-image'
                            )
                        ) );
                        ?>
                    </figure>
                <?php endif; ?>
                <div class="article__inner">
                    <h1 class="article__title"><?php the_title(); ?></h1>
                </div>
            </header>
            <div class="article__body">
                <div class="article__inner">
                    <?php
                    $content = get_extended( $post->post_content );
                    if ( $content['main'] ) :
                    ?>
                    <div class="article__preamble">
                        <?php echo apply_filters( 'the_content', $content['main'] ); ?>    
                    </div>
                    <?php
                    endif;
                    echo apply_filters( 'the_content', $content['extended'] );
                    ?>
                    <footer class="article__footer">
                        <dl class="article__metadata">
                            <dt>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M18.363 8.464l1.433 1.431-12.67 12.669-7.125 1.436 1.439-7.127 12.665-12.668 1.431 1.431-12.255 12.224-.726 3.584 3.584-.723 12.224-12.257zm-.056-8.464l-2.815 2.817 5.691 5.692 2.817-2.821-5.693-5.688zm-12.318 18.718l11.313-11.316-.705-.707-11.313 11.314.705.709z"/></svg>
                                Skrivet av:
                            </dt>
                            <dd><?php the_author();?></dd>
                            <dt>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M17 3v-2c0-.552.447-1 1-1s1 .448 1 1v2c0 .552-.447 1-1 1s-1-.448-1-1zm-12 1c.553 0 1-.448 1-1v-2c0-.552-.447-1-1-1-.553 0-1 .448-1 1v2c0 .552.447 1 1 1zm13 13v-3h-1v4h3v-1h-2zm-5 .5c0 2.481 2.019 4.5 4.5 4.5s4.5-2.019 4.5-4.5-2.019-4.5-4.5-4.5-4.5 2.019-4.5 4.5zm11 0c0 3.59-2.91 6.5-6.5 6.5s-6.5-2.91-6.5-6.5 2.91-6.5 6.5-6.5 6.5 2.91 6.5 6.5zm-14.237 3.5h-7.763v-13h19v1.763c.727.33 1.399.757 2 1.268v-9.031h-3v1c0 1.316-1.278 2.339-2.658 1.894-.831-.268-1.342-1.111-1.342-1.984v-.91h-9v1c0 1.316-1.278 2.339-2.658 1.894-.831-.268-1.342-1.111-1.342-1.984v-.91h-3v21h11.031c-.511-.601-.938-1.273-1.268-2z"/></svg>
                                Publicerad:
                            </dt>
                            <dd><?php the_time('Y-m-d H:i');?></dd>
                        </dl>
                    </footer>
                </div>
            </div>
        </article>
    </main>

<?php get_footer();?>