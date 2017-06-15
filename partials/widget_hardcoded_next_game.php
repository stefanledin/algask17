<?php
/*
Shortcode nextgame
 */
$series = get_sub_field('series');
$season = get_sub_field('season');
    
$game = get_posts( array(
    'post_type' => 'matcher',
    'posts_per_page' => 1,
    'meta_key' => 'datum',
    'orderby' => 'meta_value',
    'meta_type' => 'DATE',
    'order' => 'ASC',
    'meta_query' => array(
        array(
            'key' => 'datum',
            'value' => date('Ymd'),
            'compare' => '>='
        )
    ),
    'tax_query' => array(
        'relation' => 'AND',
        array(
            'taxonomy' => 'serie',
            'field' => 'slug',
            'terms' => $series->slug
        ),
        array(
            'taxonomy' => 'sasong',
            'field' => 'slug',
            'terms' => $season->slug
        )
    ),
) );
if ( $game ) :
?>
<div class="widget widget--grey game-widget has-shadow">
    <div class="widget__inner">
        <span class="widget__title">Nästa match</span>
        <span class="game-widget__league-name"><?php echo $series->name;?></span>
        <div class="game-widget__home-team">
            <?php $home_shield = get_field('klubbmarke_hemmalag', $game[0]->ID); ?>
            <img src="<?php echo $home_shield['url'];?>" class="game-widget__team-logo">
            <span class="game-widget__team-name"><?php echo get_field('hemmalag', $game[0]->ID);?></span>
        </div>
        <div class="game-widget__away-team">
            <?php $away_shield = get_field('klubbmarke_bortalag', $game[0]->ID); ?>
            <img src="<?php echo $away_shield['url'];?>" class="game-widget__team-logo">
            <span class="game-widget__team-name"><?php echo get_field('bortalag', $game[0]->ID);?></span>
        </div>
        <div class="game-widget__game-information">
            <span class="game-widget__game-datetime"><?php echo date_i18n('j F', strtotime(get_field('datum', $game[0]->ID))) . ' ' . get_field('tid', $game[0]->ID);?></span>
            <span class="game-widget__game-location"><?php echo get_field('spelplats', $game[0]->ID);?></span>
        </div>
    </div>
</div>
<?php endif; ?>