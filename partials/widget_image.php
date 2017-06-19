<div class="widget widget--is-image has-shadow">
    <?php
    echo rwp_img( get_sub_field('image'), array(
        'attributes' => array(
            'class' => 'widget__image',
            'sizes' => '(min-width: 500px) 375px, (min-width: 390px) 480px, 375px'
        ),
        'retina' => true
    ) );
    ?>
</div>