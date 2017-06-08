<div class="widget widget--light-blue has-shadow">
    <div class="widget__inner">
        <span class="widget__title"><?php the_sub_field('title');?></span>
        <?php
        if ( $widget_image = get_sub_field('image') ) {
            echo rwp_img( $widget_image, array(
                'attributes' => array(
                    'class' => 'widget__image',
                    'sizes' => '(min-width: 500px) 375px, (min-width: 390px) 480px, 375px'
                ),
                'retina' => true
            ) );
        }
        echo wpautop( get_sub_field('content') );
        if ( get_sub_field('link_as') == 'button' ) {
            echo '<a href="'.get_sub_field( get_sub_field('link_type') ).'" class="widget__cta button">'.get_sub_field('button_label').'</a>';
        }
        ?>
    </div>
</div>