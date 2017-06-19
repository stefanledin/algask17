<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class();?>>

        <div class="page-wrapper">
            <div class="mobile-menu">
                <div class="inner">
                    <button class="button--white mobile-menu__close-button">Stäng</button>
                    <nav class="mobile-menu__items-list">
                        <ul>
                        <?php foreach ( main_menu_items() as $menu_item ) : ?>
                            <li>
                                <a href="<?php echo $menu_item->url;?>"><?php echo $menu_item->title; ?></a>
                                <?php if ( child_pages( $menu_item->object_id ) ) : ?>
                                    <ul class="mobile-menu__items-list__sub-menu">
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
                        <?php foreach ( secondary_menu_items() as $secondary_menu_item ) : ?>
                            <li>
                                <a href="<?php echo $secondary_menu_item->url;?>"><?php echo $secondary_menu_item->title; ?></a>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                    </nav>
                </div>
            </div>
            
            <div class="page-content">
                <div id="canvas-content-overlay"></div>
                
                <header class="site-header has-shadow">
                    <div class="site-width">
                        <nav class="secondary-menu">
                            <ul>
                                <?php foreach ( secondary_menu_items() as $menu_item ) : ?>
                                    <li class="secondary-menu__item">
                                        <a href="<?php echo $menu_item->url;?>"><?php echo $menu_item->title;?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </nav>
                    </div>
                    <div class="site-width flex vertical-center">
                        <div class="site-header__logo-wrapper vertical-center">
                            <div class="site-header__logo-symbol">
                                <a href="<?php echo home_url();?>">
                                    <picture>
                                        <source type="image/svg+xml" srcset="<?php echo asset('img/algask-klubbmarke.svg');?>">
                                        <img src="<?php echo asset('img/algask-klubbmarke.png');?>" alt="Älgå Sportklubb">
                                    </picture>
                                </a>
                            </div>
                            <a href="<?php echo home_url();?>" class="site-header__logo-text-short">Älgå <span class="text-dark-blue">SK</span></a>
                            <a href="<?php echo home_url();?>" class="site-header__logo-text-long">Älgå <span class="text-dark-blue">Sportklubb</span></a>
                        </div>
                        <button class="site-header__mobile-menu-button flex vertical-center">
                            <svg height="16px" style="enable-background:new 0 0 16 16;" version="1.1" viewBox="0 0 32 32" width="16px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2  s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2  S29.104,22,28,22z"/></svg>
                            <span>Meny</span>
                        </button>
                    </div>
                    <div class="site-width">
                        <nav class="main-menu">
                            <ul>
                                <li class="main-menu__page-links">
                                    <ul>
                                        <?php foreach ( main_menu_items() as $menu_item ) :  ?>
                                            <li class="main-menu__item">
                                                <a class="<?php echo menu_item_classes( $menu_item->object_id );?> button--large" href="<?php echo $menu_item->url;?>"><?php echo $menu_item->title;?></a>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                                <li class="main-menu__social-links">
                                    <ul>
                                        <li class="main-menu__item"><a target="_blank" class="button button--dark button--large button--is-icon" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M22.675 0H1.325C.593 0 0 .593 0 1.325v21.35C0 23.408.593 24 1.325 24H12.82v-9.294H9.692v-3.622h3.128v-2.67c0-3.1 1.893-4.79 4.66-4.79 1.324 0 2.462.1 2.794.144v3.24h-1.918c-1.504 0-1.795.716-1.795 1.764v2.313h3.588l-.467 3.622h-3.12V24h6.117c.73 0 1.323-.593 1.323-1.325V1.325C24 .593 23.407 0 22.675 0z"/></svg></a>
                                        <li class="main-menu__item"><a target="_blank" class="button button--dark button--large button--is-icon" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M21.23 0H2.77C1.24 0 0 1.24 0 2.77v18.46C0 22.76 1.24 24 2.77 24H21.23C22.762 24 24 22.76 24 21.23V2.77C24 1.24 22.76 0 21.23 0zM12 7.385c2.55 0 4.616 2.065 4.616 4.615 0 2.55-2.067 4.616-4.616 4.616S7.385 14.548 7.385 12c0-2.55 2.066-4.615 4.615-4.615zm9 12.693c0 .51-.413.922-.924.922H3.924c-.51 0-.924-.413-.924-.922V10h1.897c-.088.315-.153.64-.2.97-.05.338-.08.68-.08 1.03 0 4.08 3.305 7.385 7.383 7.385S19.384 16.08 19.384 12c0-.35-.03-.692-.08-1.028-.048-.33-.113-.656-.2-.97H21v10.076zm0-13.98c0 .51-.413.923-.924.923h-2.174c-.51 0-.923-.413-.923-.922V3.923c0-.51.41-.923.922-.923h2.174c.51 0 .924.413.924.923v2.175z" fill-rule="evenodd" clip-rule="evenodd"/></svg></a>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </header>
                <?php
                if ( ! is_front_page() ) {
                    get_template_part( 'partials/section', 'breadcrumbs' );
                }
                ?>
                <section class="section-wrapper">
                    <div class="site-width">
