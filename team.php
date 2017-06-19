<?php
/*
Template name: Lagsida
 */
get_header();
?>

<?php get_sidebar(); ?>

<main class="main-column right has-shadow">
    <div class="inner">
        <h1><?php the_title();?></h1>
        <?php if ( have_rows('player_list') ) : while ( have_rows('player_list') ) : the_row(); ?>
        <h2><?php the_sub_field('position');?></h2>
        <ul class="player-list">
            <?php if ( have_rows('players') ) : while( have_rows('players') ) : the_row(); ?>
                <?php
                foreach ( get_sub_field('player') as $player ) :
                ?>
                <li class="player-list__item">
                    <a href="<?php echo get_permalink( $player->ID );?>">
                        <figure>
                            <?php
                            if ( has_post_thumbnail( $player->ID ) ) {
                                echo get_the_post_thumbnail( $player->ID, 'thumbnail' );
                            } else {
                                echo '<img src="'.asset('img/player_anonymous.jpg').'">';
                            }
                            ?>
                            <figcaption><?php echo $player->post_title;?></figcaption>
                        </figure>
                    </a>
                </li>
                <?php endforeach; ?>
            <?php endwhile; endif; ?>
        </ul>
        <?php endwhile; endif; ?>
    </div>
</main>

<?php get_footer(); ?>