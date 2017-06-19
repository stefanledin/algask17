<?php
/**
 * Matchprogram
 */
function matchprogram_func( $atts ) {
    extract($atts);
    $args = array(
        'post_type' => 'matcher',
        'meta_key' => 'datum',
        'orderby' => 'meta_value',
        'order' => 'ASC',
        'posts_per_page' => -1,
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'serie',
                'field' => 'slug',
                'terms' => $serie
            ),
            array(
                'taxonomy' => 'sasong',
                'field' => 'slug',
                'terms' => $sasong
            )
        ),
    );
    $loop = new WP_Query($args);
    $output = '';
    $output .= '<table class="matchprogram-'.$serie.' matchprogram responsive">';
        $output .= '<thead>';
            $output .= '<tr>';
                $output .= '<th>Datum</th>';
                $output .= '<th>Tid</th>';
                $output .= '<th>Plats</th>';
                $output .= '<th>Hemmalag</th>';
                $output .= '<th>Bortalag</th>';
                $output .= '<th>Resultat</th>';
            $output .= '</tr>';
        $output .= '</thead>';
        $output .= '<tbody>';
        while ($loop->have_posts() ) : $loop->the_post();
            $datum = get_field('datum');
            $tid = get_field('tid');
            $spelplats = get_field('spelplats');
            $hemmalag = get_field('hemmalag');
            $bortalag = get_field('bortalag');
            $resultat = get_field('resultat');
            
            $output .= '<tr class="matchprogram-match '.$serie.'">';
                $output .= '<td class="matchprogram-datum">'.$datum.'</td>';
                $output .= '<td class="matchprogram-tid">'.$tid.'</td>';
                $output .= '<td class="matchprogram-spelplats">'.$spelplats.'</td>';
                $output .= '<td class="matchprogram-hemmalag">'.$hemmalag.'</td>';
                $output .= '<td class="matchprogram-bortalag">'.$bortalag.'</td>';
                $output .= '<td class="matchprogram-resultat">'.$resultat.'</td>';
            $output .= '</tr>'; 
        endwhile;
        $output .= '</tbody>';
    $output .= '</table>';
    return $output;
    wp_reset_query();
}
add_shortcode('matchprogram', 'matchprogram_func');