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
                    if ( $content['extended'] ) :
                    ?>
                        <div class="article__preamble">
                            <?php echo apply_filters( 'the_content', $content['main'] ); ?>    
                        </div>
                        <?php echo apply_filters( 'the_content', $content['extended'] );?>
                    <?php else : ?>
                        <?php echo apply_filters( 'the_content', $content['main'] );?>
                    <?php endif; ?>
                    
                    <?php 
                    $gameQuery = new WP_Query( array(
                        'connected_type' => 'games_to_posts',
                        'connected_items' => get_queried_object()
                    ) );
                    if ( $gameQuery->have_posts() ) {
                        p2p_type( 'players_to_games' )->each_connected( $gameQuery );
                        while ( $gameQuery->have_posts() ) {
                            $gameQuery->the_post();
                            $scorers = get_field('goals', $post->ID);
                            $cards = get_field('cards', $post->ID);
                            $stars = get_field('tre_stjarnor', $post->ID);
                            $team = '';
                            foreach( $post->connected as $post) {
                                setup_postdata( $post );
                                $is_active = get_post_meta( $post->ID, 'aktiv', true );
                                if ( $is_active ) :
                                    $team .= '<a href="'.get_permalink().'">';
                                endif;
                                    $team .= get_the_title();
                                if ( $is_active ) :
                                    $team .= '</a>';
                                endif;
                                $team .= '<br>';
                                wp_reset_postdata();
                            }
                        }
                        wp_reset_postdata();
                    }
                    ?>
                    <aside class="article__infobox-area">
                        <?php if ( isset( $team ) ) : ?>
                            <div class="widget widget--grey">
                                <div class="widget__inner">
                                    <?php echo $team; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ( isset( $scorers ) ) : ?>
                            <div class="widget widget--grey">
                                <div class="widget__inner">
                                    <?php
                                    foreach ($scorers as $scorer) {
                                        $player = get_post($scorer['player'][0]);
                                        $is_active = get_post_meta( $player->ID, 'aktiv', true );
                                        $output = ($scorer['goal']) ? $scorer['goal'] . ' ' : '';
                                            if ( $is_active ) :
                                                $output .= '<a href="'.get_permalink($player->ID).'">' . $player->post_title . '</a>';
                                            else :
                                                $output .= $player->post_title;
                                            endif;
                                        $output .= ($scorer['matchminut']) ? ' (' . $scorer['matchminut'] . ')' : '';
                                        echo $output . '<br>';
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ( isset($cards[0]) ) : ?>
                            <div class="widget widget--grey">
                                <div class="widget__inner">
                                    <span class="widget__title h3">Kort</span>
                                    <?php
                                    foreach ( $cards as $card ) {
                                        $player = get_post($card['player'][0]);
                                        $is_active = get_post_meta( $player->ID, 'aktiv', true );
                                        if ( $is_active ) :
                                            echo (($card['color'] == 'yellow') ? 'Gult: ' : 'Rött: ') . ' <a href="'.get_permalink($player->ID).'">' . $player->post_title . '</a><br>';
                                        else :
                                            echo (($card['color'] == 'yellow') ? 'Gult: ' : 'Rött: ') . $player->post_title . '<br>';
                                        endif;
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </aside>

                    <footer class="article__footer">
                        <ul class="article__metadata">
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M18.363 8.464l1.433 1.431-12.67 12.669-7.125 1.436 1.439-7.127 12.665-12.668 1.431 1.431-12.255 12.224-.726 3.584 3.584-.723 12.224-12.257zm-.056-8.464l-2.815 2.817 5.691 5.692 2.817-2.821-5.693-5.688zm-12.318 18.718l11.313-11.316-.705-.707-11.313 11.314.705.709z"/></svg>
                                <?php the_author();?>
                            </li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M17 3v-2c0-.552.447-1 1-1s1 .448 1 1v2c0 .552-.447 1-1 1s-1-.448-1-1zm-12 1c.553 0 1-.448 1-1v-2c0-.552-.447-1-1-1-.553 0-1 .448-1 1v2c0 .552.447 1 1 1zm13 13v-3h-1v4h3v-1h-2zm-5 .5c0 2.481 2.019 4.5 4.5 4.5s4.5-2.019 4.5-4.5-2.019-4.5-4.5-4.5-4.5 2.019-4.5 4.5zm11 0c0 3.59-2.91 6.5-6.5 6.5s-6.5-2.91-6.5-6.5 2.91-6.5 6.5-6.5 6.5 2.91 6.5 6.5zm-14.237 3.5h-7.763v-13h19v1.763c.727.33 1.399.757 2 1.268v-9.031h-3v1c0 1.316-1.278 2.339-2.658 1.894-.831-.268-1.342-1.111-1.342-1.984v-.91h-9v1c0 1.316-1.278 2.339-2.658 1.894-.831-.268-1.342-1.111-1.342-1.984v-.91h-3v21h11.031c-.511-.601-.938-1.273-1.268-2z"/></svg>
                                <?php the_time('Y-m-d k\l. H:i');?>
                            </li>
                        </ul>
                    </footer>
                </div>
            </div>
        </article>
    </main>

<?php get_footer();?>