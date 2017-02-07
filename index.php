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
                        </ul>
                    </nav>
                </div>
            </div>
            
            <div class="page-content">
                <div id="canvas-content-overlay"></div>
                
                <header class="site-header has-shadow">
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
                            <div class="site-header__logo-text">
                                <a href="<?php echo home_url();?>">
                                    <picture>
                                        <source type="image/svg+xml" srcset="<?php echo asset('img/algask-klubbmarke-text.svg');?>">
                                        <img src="<?php echo asset('img/algask-klubbmarke-text.png');?>" alt="Älgå Sportklubb">
                                    </picture>
                                </a>
                            </div>
                        </div>
                        <div class="site-header__mobile-menu-button-wrapper">
                            <button class="site-header__mobile-menu-button flex vertical-center">
                                <svg height="16px" style="enable-background:new 0 0 16 16;" version="1.1" viewBox="0 0 32 32" width="16px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2  s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2  S29.104,22,28,22z"/></svg>
                                <span>Meny</span>
                            </button>
                        </div>
                    </div>
                </header>

                <section class="">
                    <div class="site-width">
                        <main class="main-column section-wrapper">
                            <div class="article-list has-shadow">
                                <?php if ( have_posts() ) : $i = 0; while ( have_posts() ) : the_post(); ?>
                                <article class="article-list__article">
                                    <div class="inner">
                                        <header class="article-list__article__header">
                                            <time><?php the_time( 'Y-m-d H:i' ); ?></time>
                                            <h2 class="article-list__article__title">
                                                <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                            </h2>
                                        </header>
                                        <?php if ( $i == 0 ) : ?>
                                            <?php the_post_thumbnail( ); ?>
                                            <?php the_content(); ?>
                                        <?php endif; ?>
                                    </div>
                                </article>
                                <hr class="article-list__separator">
                                <?php $i++; endwhile; endif; ?>
                                <div class="inner">
                                    <a href="#" class="button">Nyhetsarkiv</a>
                                </div>
                            </div>
                        </main>
                        <aside class="sidebar section-wrapper">
                            <div class="widget widget--light-blue has-shadow">
                                <div class="widget__inner">
                                    <h3 class="widget__title">Årsmöte</h3>
                                    <p>Onsdagen den 8 mars välkomnar vi alla medlemmar till klubbens årsmöte. Det hålls klockan 18.30 på Älgvallen. Välkomna!</p>
                                    <a href="#" class="widget__cta button">Läs mer</a>
                                </div>
                            </div>
                            <div class="widget widget--grey has-shadow">
                                <div class="widget__inner">
                                    <h3 class="widget__title">Jubileumsboken</h3>
                                    <img src="http://placehold.it/800x500">
                                    <a href="#" class="widget__cta button">Köp här</a>
                                </div>
                            </div>
                        </aside>
                    </div>
                </section>

                <footer class="section-wrapper">
                    <div class="site-width">
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