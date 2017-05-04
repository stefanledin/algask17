<?php
/*
Template name: Lagsida
 */
get_header();
?>

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
                            <img src="http://placehold.it/185x277" alt="">
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