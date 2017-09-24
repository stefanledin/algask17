<div class="widget widget__joker widget--light-blue has-shadow">
    <a href="<?php echo get_permalink_by_path('algajokern');?>">
        <div class="widget__inner">
            <img class="widget__joker__logo" src="<?php bloginfo( 'template_directory' );?>/algajokern/images/algajokern-logo.png">
            <span class="widget__title">Jokernummer vecka <?php the_field('algajokern_week', 'option');?></span>
            <span class="h2 text-center"><?php the_field('algajokern_number', 'option');?></span>
        </div>
    </a>
</div>