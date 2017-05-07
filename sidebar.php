<nav class="sidebar sub-menu left has-shadow">
    <?php $parent_id = get_page_parent_id( $post ); ?>
    <a href="<?php echo get_permalink( $parent_id );?>" class="sub-menu__item sub-menu__item--header button button--block button--dark"><?php echo get_the_title( $parent_id );?></a>
    <?php
    echo get_sub_menu( $parent_id );
    ?>
</nav>