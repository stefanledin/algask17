<?php
get_header();

$position = get_the_terms( $post, 'position' );
?>

<main class="main-column right has-shadow">
    <div class="inner">
        <h1><?php the_title(); ?></h1>
        <div class="player">
            <figure class="player__image left">
                <?php the_post_thumbnail(); ?>
            </figure>
            <table class="table player__facts left">
                <thead>
                    <tr>
                        <th>Fakta</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ( $position ) : ?>
                    <tr>
                        <td>Position:</td>
                        <td><?php echo $position[0]->name;?></td>
                    </tr>
                    <?php endif; ?>
                    <?php if ( $born = get_field('fodelsear') ) : ?>
                    <tr>
                        <td>Född:</td>
                        <td><?php echo $born;?></td>
                    </tr>
                    <?php endif; ?>
                    <?php if ( $club = get_field('moderklubb') ) : ?>
                    <tr>
                        <td>Moderklubb:</td>
                        <td><?php echo $club;?></td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <?php if ( have_rows('information') ) : ?>
            <table class="table player__personal-info">
                <thead>
                    <tr>
                        <th>Personligt</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ( have_rows('information') ) : the_row(); ?>
                        <tr>
                            <td><?php the_sub_field('fraga');?></td>
                            <td><?php the_sub_field('svar');?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>