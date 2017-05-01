<?php
/*
Template name: Lagsida
 */
get_header();
?>

<main class="main-column right has-shadow">
    <div class="inner">
        <h1><?php the_title();?></h1>
        <h2>Målvakter</h2>
        <ul class="player-list">
            <?php $i = 0; while ( $i < 7 ) : ?>
            <li class="player-list__item">
                <figure>
                    <img src="http://placehold.it/185x185" alt="">
                    <figcaption>Namn Namnsson</figcaption>
                </figure>
            </li>
            <?php $i++; endwhile; ?>
        </ul>
    </div>
</main>

<?php get_footer(); ?>