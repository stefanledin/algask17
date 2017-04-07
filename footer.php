                    </div>
                </section>
                 <footer class="site-footer section-wrapper">
                     <div class="site-width">
                        <nav class="footer-menu">
                            <ul class="footer-menu__main-menu">
                                <?php foreach ( main_menu_items() as $menu_item ) : ?>
                                    <li>
                                        <a href="<?php echo $menu_item->url;?>">
                                            <?php echo $menu_item->title;?>
                                        </a>
                                        <?php if ( child_pages( $menu_item->object_id ) ) : ?>
                                            <ul class="footer-menu__main-menu__sub-menu">
                                            <?php foreach ( child_pages( $menu_item->object_id ) as $child_page ) : ?>
                                                <li>
                                                    <a href="<?php echo get_permalink( $child_page->ID );?>">
                                                        <?php echo $child_page->post_title; ?>
                                                    </a>
                                                </li>                                            
                                            <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; ?>
                                
                                <li>
                                    <ul class="footer-menu__main-menu__sub-menu">
                                    <?php foreach ( secondary_menu_items() as $secondary_menu_item ) : ?>
                                        <li>
                                            <a href="<?php echo $secondary_menu_item->url;?>"><?php echo $secondary_menu_item->title; ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                        <picture>
                            <source type="image/svg+xml" srcset="<?php echo asset('img/algask-klubbmarke.svg');?>">
                            <img class="center-block" src="<?php echo asset('img/algask-klubbmarke.png');?>" alt="Älgå Sportklubb">
                        </picture>
                     </div>
                </footer>

            </div>
        </div>
        
        
        <?php wp_footer(); ?>
    </body>
</html>